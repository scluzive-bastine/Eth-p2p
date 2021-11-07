<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Crypto;
use App\Models\Buyer;
use App\Models\Seller;
use App\Models\Trade;
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

    public function createSellOrder(Request $request): array
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

        Seller::create([
            'user_id'=>$user->id,
            'amount'=>$amt,
            'price'=>$price,
            'balance'=>$amt,
            'min'=>$min,
            'coin'=>$coin,
            'currency'=>$currency
        ]);

        #supposed to return an escrow address
        return ['success'=>"Order created"];
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


    public function confirmBuy(Request $request)
    {

    }

    public function confirmSell(Request $request)
    {

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

    public function openSellTrade($id): Response
    {
        $user = Auth::user();
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

                Buyer::create([
                    'user_id'=>$user->id,
                    'amount'=>$coin_amt,
                    'balance'=>0,
                    'min'=>0,
                    'price'=>$seller->price,
                    'coin'=>$seller->coin,
                    'currency'=>$seller->currency,
                    'address'=>$address
                ]);

                break;
            case 'sell':
                Seller::create([

                ]);
                break;
            default:
                die();
        }
    }

    public  function payment($id)
    {

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


}
