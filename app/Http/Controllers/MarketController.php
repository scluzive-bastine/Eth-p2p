<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Crypto;
use App\Models\Buyer;
use App\Models\Seller;
use App\Models\Trade;

class MarketController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render("Market/Index");
    }
    /**
     * Render buy page
     * @return \Illuminate\Http\Response
     */
    public function buy()
    {
        return Inertia::render("Market/Buy");
    }
    /**
     * Render sell page
     * @return \Illuminate\Http\Response
     */
    public function sell()
    {
        return Inertia::render("Market/Sell");
    }

    public function buyOrder()
    {
        return Inertia::render("Market/BuyOrder");
    }

    public function sellOrder()
    {
        return Inertia::render("Market/SellOrder");
    }

    public function createBuyOrder(Request $request)
    {
        $user = Auth::user();
        $currency = $request->input('currency');
        $coin = $request->input('coin');

        if(!currencyExists($currency))
            return ["error"=>"Please select a valid currency"];

        if(!cryptoExists($coin))
            return ["error"=>"Please select a valid crypto"];
        
        $buyer = Buyer::where([ 
            ['user_id', $user->id], 
            ['coin', $coin],
            ['currency', $currency]
        ])->first();

        if(!$buyer){
            $buyer = Buyer::create([
                'user_id'=>$user->id,
                'coin'=>$coin
            ]);
        }

    }

    public function createSellOrder()
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

    
}
