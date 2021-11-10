<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Sdk\BlockCypher;
use Inertia\Inertia;
use App\Models\Crypto;
use App\Models\Buyer;
use App\Models\Seller;
use App\Models\Trade;
use App\Models\Deposit;
use App\Models\OpenIssue;
use Inertia\Response;

class MarketController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render("Market/Index");
    }
    /**
     * Render buy page
     */
    public function buy(): Response
    {
        return Inertia::render("Market/Buy");
    }
    /**
     * Render sell page
     */
    public function sell(): Response
    {
        return Inertia::render("Market/Sell");
    }

    public function buyOrder(): Response
    {
        return Inertia::render("Market/BuyOrder");
    }

    public function loadMoreBuyOrders(): array
    {
        $user = Auth::user();
        $orders = Buyer::where('user_id', $user->id)->latest()->paginate(10);
        $page = view("pagination.buyOrders", compact('orders'));
        $links = $orders->links();
        return [
            "page"=>"$page",
            "link"=>"$links",
        ];
    }

    public function sellOrder(): Response
    {
        return Inertia::render("Market/SellOrder");
    }

    public function loadMoreSellOrders(): array
    {
        $user = Auth::user();
        $orders = Seller::where('user_id', $user->id)->latest()->paginate(10);
        $page = view("pagination.sellOrders", compact('orders'));
        $links = $orders->links();
        return [
            "page"=>"$page",
            "link"=>"$links",
        ];
    }

    public function createBuyOrder(Request $request): array
    {
        $user = Auth::user();
        $currency = $request->input('currency');
        $coin = $request->input('crypto');
        $amt = $request->input('amount');
        $address = $request->input('address');
        $price = $request->input('price');
        $min = $request->input('min');

        if(!currencyExists($currency))
            return ["error"=>"Please select a valid currency"];

        $crypto = Crypto::where('symbol', $coin)->first();
        if(!$crypto)
            return ["error"=>"Please select a valid crypto"];

        //$min = $crypto->min;

        if($amt < $min)
            return ['error'=>"minimum is $min $coin"];

        Buyer::create([
            'user_id'=>$user->id,
            'coin'=>$coin,
            'currency'=>$currency,
            'amount'=>$amt,
            'balance'=>$amt,
            'address'=>$address,
            'price'=>$price,
            'min'=>$min
        ]);

        return ['success'=>"Order created"];
    }

    public function updateBuyOrder(Request $request): array
    {
        $user = Auth::user();
        $id = $request->input('id');
        $price = $request->input('price');
        $min = $request->input('min');

        $this->validate($request, [
            "price"=>"numeric",
            "min"=>"numeric"
        ]);

        $buyer = Buyer::where([
            ['id', $id],
            ['user_id', $user->id]
        ])->first();

        $buyer->min = $min;
        $buyer->price = $price;
        $buyer->save();
        return ['success'=>"Order Updated"];
    }

    public function deleteBuyOrder($id): RedirectResponse
    {
        $user = Auth::user();

        $buyer = Buyer::where([
            ['id', $id],
            ['user_id', $user->id]
        ])->first();

        if($buyer && !$buyer->hasRequest())
            $buyer->delete();

        return back();
    }

    public function createSellOrder(Request $request)
    {
        $user = Auth::user();
        $currency = $request->input('currency');
        $coin = $request->input('crypto');
        $amt = $request->input('amount');
        $price = $request->input('price');
        $min = $request->input('min');

        if(!currencyExists($currency))
            return ["error"=>"Please select a valid currency"];

        $crypto = Crypto::where('symbol', $coin)->first();
        if(!$crypto)
            return ["error"=>"Please select a valid crypto"];

        $newAddress = BlockCypher::generateAddress($coin);

        if( !isset($newAddress['address']) )
            return ["error"=>"Could not get an address at this time"];
        
        $seller = Seller::create([
            'user_id'=>$user->id,
            'amount'=>$amt,
            'price'=>$price,
            'balance'=>$amt,
            'min'=>$min,
            'coin'=>$coin,
            'currency'=>$currency
        ]);

        #creating an escrow address
        $deposit = Deposit::create([
            'seller_id'=>$seller->id,
            'address'=>Crypt::encryptString($newAddress['address']),
            'public'=>Crypt::encryptString($newAddress['public']),
            'private'=>Crypt::encryptString($newAddress['private']),
            'wif'=>Crypt::encryptString($newAddress['wif']),
            'amt'=>$amt,
            'coin'=>$coin
        ]);

        $address = $newAddress['address'];
        
        $view = view('show_address', compact('address', 'coin', 'amt'));
        return ['success'=>"$view"];
    }

    public function  updateSellOrder(Request $request): array
    {
        $user = Auth::user();
        $id = $request->input('id');
        $price = $request->input('price');
        $min = $request->input('min');

        $this->validate($request, [
            "price"=>"numeric",
            "min"=>"numeric"
        ]);

        $seller = Seller::where([
            ['id', $id],
            ['user_id', $user->id]
        ])->first();

        $seller->min = $min;
        $seller->price = $price;
        $seller->save();
        return ['success'=>"Order Updated"];
    }

    public function  deleteSellOrder($id): RedirectResponse
    {
        $user = Auth::user();

        $seller = Seller::where([
            ['id', $id],
            ['user_id', $user->id]
        ])->first();

        if($seller && !$seller->hasRequest())
            $seller->delete();

        return back();
    }


    public function filterBuyers(Request $request) : array
    {
        $amount = (float)$request->input('amount');
        $coin = $request->input('coin');
        $currency = $request->input('currency');

        $online = $request->input('online');
        $rated = $request->input('rated');

        if($amount && $coin && $currency){
            $buyers = Buyer::where([
                ['balance', '>=', $amount],
                ['coin', $coin],
                ['currency', $currency],
            ]);
        }else{
            if($amount && $coin){
                $buyers = Buyer::where([
                    ['balance', '>=', $amount],
                    ['coin', $coin],
                ]);
            }elseif($amount && $currency){
                $buyers = Buyer::where([
                    ['balance', '>=', $amount],
                    ['currency', $currency],
                ]);
            }elseif($coin && $currency){
                $buyers = Buyer::where([
                    ['coin', $coin],
                    ['currency', $currency],
                ]);
            }else{
                if($amount)
                    $buyers = Buyer::where('balance', '>=', $amount);
                elseif($coin)
                    $buyers = Buyer::where('coin', $coin);
                elseif($currency)
                    $buyers = Buyer::where('currency', $currency);
                else
                    $buyers = Buyer::where('balance', '>', 0);
            }
        }

        $buyers = $buyers->paginate(10);

        $page = view("pagination.buyers", compact('buyers'));
        $links = $buyers->links();

        return [
            "link"=>"$links",
            "page"=>"$page"
        ];
    }

    public function filterSellers(Request $request) : array
    {
        $amount = (float)$request->input('amount');
        $coin = $request->input('coin');
        $currency = $request->input('currency');

        $online = $request->input('online');
        $rated = $request->input('rated');

        if($amount && $coin && $currency){
            $sellers = Seller::where([
                ['balance', '>=', $amount],
                ['coin', $coin],
                ['currency', $currency],
            ]);
        }else{
            if($amount && $coin){
                $sellers = Seller::where([
                    ['balance', '>=', $amount],
                    ['coin', $coin],
                ]);
            }elseif($amount && $currency){
                $sellers = Seller::where([
                    ['balance', '>=', $amount],
                    ['currency', $currency],
                ]);
            }elseif($coin && $currency){
                $sellers = Seller::where([
                    ['coin', $coin],
                    ['currency', $currency],
                ]);
            }else{
                if($amount)
                    $sellers = Seller::where('balance', '>=', $amount);
                elseif($coin)
                    $sellers = Seller::where('coin', $coin);
                elseif($currency)
                    $sellers= Seller::where('currency', $currency);
                else
                    $sellers = Seller::where('balance', '>', 0);
            }
        }

        $sellers = $sellers->paginate(10);

        $page = view("pagination.sellers", compact('sellers'));
        $links = $sellers->links();

        return [
            "link"=>"$links",
            "page"=>"$page"
        ];
    }

    public function openBuyTrade($id): Response
    {
        $user = Auth::user();
        $seller = Seller::where([
            ['id', $id],
            ['balance', '>', 0],
//          ['user_id', '<>', $user->id]
        ])->first();
        $type = "buy";
        return $this->extractedTrade($seller, $type);
    }

    public function openSellTrade($id)
    {
        $user = Auth::user();

        if(!$user->bankDetails)
            return ['error'=>"Update your bank details"];

        $buyer = Buyer::where([
            ['id', $id],
            ['balance', '>', 0],
//          ['user_id', '<>', $user->id]
        ])->first();
        $type = "sell";
        return $this->extractedTrade($buyer, $type);
    }

    public function initiateTrade(Request $request)
    {
        $user = Auth::user();
        $type = $request->input('type');
        $trader_id = $request->input('id');
        $coin_amt = $request->input('coin');
        $address = $request->input('address');
        $message = $request->input('message');


        switch ($type){
            case 'buy':
                $seller = Seller::where([
                    ['id', $trader_id],
                    //['user_id', '<>', $user->id]
                ])->first();

                if(!$seller) return ["error"=>"Seller not found"];
                if($coin_amt < $seller->min)
                    return ["error"=>"Seller's minimum is $seller->min $seller->coin"];

                if($seller->balance < $coin_amt)
                    return ["error"=>"Seller's quantity has reduced to $seller->balance $seller->coin"];

                $buyer = Buyer::create([
                    'user_id'=>$user->id,
                    'amount'=>$coin_amt,
                    'balance'=>0,
                    'min'=>0,
                    'price'=>$seller->price,
                    'coin'=>$seller->coin,
                    'currency'=>$seller->currency,
                    'address'=>$address
                ]);

                #create trade
                $trade = Trade::create([
                    'buyer'=>$buyer->id,
                    'seller'=>$seller->id,
                    'coin'=>$seller->coin,
                    'amount'=>$coin_amt,
                    'buyer_address'=>$address,
                    'bank_name'=>$seller->user->bankDetails->bank_name,
                    'bank_account_name'=>$seller->user->bankDetails->account_name,
                    'bank_account_number'=>$seller->user->bankDetails->account_number,
                    'price'=>$seller->price,
                ]);
                $seller->balance -= $coin_amt;
                $seller->save();
                #send message
                return ['success'=>$trade->id];
            case 'sell':
                $buyer = Buyer::where([
                    ['id', $trader_id],
                    //['user_id', '<>', $user->id]
                ])->first();

                if(!$buyer) return ["error"=>"Buyer not found"];
                if($coin_amt < $buyer->min)
                    return ["error"=>"Buyer's minimum is $buyer->min $buyer->coin"];

                if($buyer->balance < $coin_amt)
                    return ["error"=>"Buyer's quantity has reduced to $buyer->balance $buyer->coin"];

                $seller = Seller::create([
                    'user_id'=>$user->id,
                    'amount'=>$coin_amt,
                    'balance'=>0,
                    'min'=>0,
                    'price'=>$buyer->price,
                    'coin'=>$buyer->coin,
                    'currency'=>$buyer->currency
                ]);

                #create trade
                $trade = Trade::create([
                    'buyer'=>$buyer->id,
                    'seller'=>$seller->id,
                    'coin'=>$buyer->coin,
                    'amount'=>$coin_amt,
                    'buyer_address'=>$address,
                    'bank_name'=>$seller->user->bankDetails->bank_name,
                    'bank_account_name'=>$seller->user->bankDetails->account_name,
                    'bank_account_number'=>$seller->user->bankDetails->account_number,
                    'price'=>$buyer->price,
                ]);
                $buyer->balance -= $coin_amt;
                $buyer->save();
                #send message
                return ['success'=>$trade->id];

            default:
                die();
        }
    }

    public  function payment($id)
    {
        $user = Auth::user();
        $trade = Trade::findOrFail($id);

        $buyer = Buyer::findOrFail($trade->buyer);
        $seller = Seller::findOrFail($trade->seller);

        if($trade){
            if($buyer->user_id != $user->id || $seller->user_id != $user->id)
                return  back();
            
            $trade['cur_symbol'] = config('currencies')[$buyer->currency]['symbol'];
            $fiat = convertToFiat($trade->coin, $trade->amount, $trade->price);
            $trade['fiat'] = number_format($fiat, 2, '.', ',');

            if($user->id == $buyer->user_id){
                $seller['name'] = $seller->user->name;
                $seller['phone'] = $seller->user->phone;
            }else{
                $buyer['name'] = $buyer->user->name;
                $buyer['phone'] = $buyer->user->phone;
            }

            return Inertia::render('Payment', compact('trade', 'buyer', 'seller', 'user'));
        }
        return back();
    }

    public function confirmCashSent(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'id'=>['required'],
            'buyer'=>['required']
        ]);

        $id = $request->input('id');
        $buyer_id = $request->input('buyer');
        $buyer = Buyer::findOrFail($buyer_id);

        if($buyer->user_id != $user->id)
            return ['error'=>"Not found"];

        $trade = Trade::where([
            ['id', $id],
            ['buyer', $buyer->id],
            ['status', 0]
        ])->first();

        if(!$trade) return ['error'=>"Not found"];

        $trade->status = 1;
        $trade->save();
        return ["success"=>"done"];
    }

    public function confirmCashReceived(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'id'=>['required'],
            'seller'=>['required']
        ]);

        $id = $request->input('id');
        $seller_id = $request->input('seller');
        $seller = Seller::findOrFail($seller_id);

        if($seller->user_id != $user->id)
            return ['error'=>"Not found"];

        $trade = Trade::where([
            ['id', $id],
            ['seller', $seller->id],
            ['status', 1]
        ])->first();

        if(!$trade) return ['error'=>"Not found"];

        $trade->status = 2;
        $trade->save();
        return ["success"=>"done"];
    }

    public function cancelTrade(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'id'=>['required'],
            'buyer'=>['required']
        ]);

        $id = $request->input('id');
        $buyer_id = $request->input('buyer');
        $buyer = Buyer::findOrFail($buyer_id);

        if($buyer->user_id != $user->id)
            return ['error'=>"Not found"];

        $trade = Trade::where([
            ['id', $id],
            ['buyer', $buyer->id],
            ['status', 0]
        ])->first();

        if(!$trade) return ['error'=>"Not found"];

        $buyer->balance += $trade->amount;
        $buyer->save();

        $seller = Seller::find($trade->seller);
        if($seller){
            $seller->balance += $trade->amount;
            $seller->save();
        }
        $trade->delete();
        return ["success"=>"done"];
    }

    public function openDispute(Request $request)
    {
        $user = Auth::user();
        $id = $request->input('id');
        $msg = $request->input('msg');
        $issuer = "";

        if(strlen($msg) > 1000) return ["error"=>"Text too long"];
        
        $trade = Trade::find($id);
        if(!$trade) return ['error'=>"Not found"];
        $buyer = Buyer::find($trade->buyer);
        $seller = Seller::find($trade->seller);

        if($buyer->user_id == $user->id){
            $issuer = "buyer";
        }else if($seller->user_id == $user->id){
            $issuer = "seller";
        }else{
            return ["error"=>'Invalid'];
        }

        OpenIssue::create([
            'trade_id'=>$trade->id,
            'issuer'=>$issuer,
            'msg'=>$msg
        ]);
        return ["success"=>"Dispute Submitted"];
    }

    public function getCurrencyList()
    {
        $cryptos = Crypto::all();
        $view = view('currency');
        $view2 = view('cryptos', compact('cryptos'));

        return [
            "currency"=>"$view",
            "cryptos"=>"$view2"
        ];
    }

    /**
     * @param $trader
     * @param $type
     * @return Response
     */
    public function extractedTrade($trader, $type): Response
    {
        $cur = config('currencies')[$trader->currency]['symbol'];
        $price = Crypto::where('symbol', $trader->coin)->first()->price;
        $min = $trader->min * $price * $trader->price;
        $max = $trader->balance * $price * $trader->price;
        $name = $trader->user->name;
        $coin = $trader->coin;
        $rate = $price * $trader->price;
        $terms = $trader->user->terms;
        $trader_price = $trader->price;
        $id = $trader->id;
        return Inertia::render('Trade',
            compact(
                'type',
                'cur',
                'price',
                'min',
                'max',
                'name',
                'coin',
                'rate',
                'terms',
                'trader_price',
                'id'
            )
        );
    }


    public function showSellers($id)
    {
        $user = Auth::user();
        $buyer = Buyer::find($id);

        if($buyer->user_id != $user->id)
            return back();

        $trades = Trade::where('buyer', $buyer->id)->get();
        $count = 1;

        foreach($trades as $trade){
            $trade['name'] = $trade->theSeller->user->name;
            $trade['time'] = "<div>".$trade->created_at->diffForHumans()."</div>".$trade->created_at->isoFormat('lll');
            $trade['count'] = $count++;
        }   

        $type = 'sellers';
        return Inertia::render('Market/Request', compact('trades', 'type'));
    }

    public function showBuyers($id)
    {
        $user = Auth::user();
        $seller = Seller::find($id);

        if($seller->user_id != $user->id)
            return back();

        $trades = Trade::where('seller', $id)->get();
        $count = 1;

        foreach($trades as $trade){
            $trade['name'] = $trade->theBuyer->user->name;
            $trade['time'] = "<div>".$trade->created_at->diffForHumans()."</div>".$trade->created_at->isoFormat('lll');
            $trade['count'] = $count++;
        }

        $type = 'buyers';
        return Inertia::render('Market/Request', compact('trades', 'type'));
    }


}
