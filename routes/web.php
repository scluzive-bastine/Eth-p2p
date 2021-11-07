<?php
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MarketController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index'])->name('index')->middleware('guest');
Route::get('/connect-wallet', [PagesController::class, 'connectWallet'])->name('connect.wallet')->middleware('guest');


Route::post('/3nbvszQo5tHv', [SignInController::class, 'getNounce'])->name('gen_nounce');
Route::post('/mbONp52i8cbs', [SignInController::class, 'signUserIn'])->name('sign_in');
Route::post('/iDUVJerVVIf2', [SignInController::class, 'signUserOut'])->name('sign_out');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/jqyMuUT0JJ7T', [ProfileController::class, 'getProfile'])->name('profile.getProfile');
Route::post('/xhFNZo8kWLn2', [ProfileController::class, 'updateTerms'])->name('profile.update_terms');
Route::post('/GVqMvS7i6vZl', [ProfileController::class, 'updateBlurb'])->name('profile.update_blurb');


Route::get('/market', [MarketController::class, 'index'])->name('market.index');
Route::get('/market/buy', [MarketController::class, 'buy'])->name('market.buy');
Route::get('/market/sell', [MarketController::class, 'sell'])->name('market.sell');
Route::get('/market/buy-orders', [MarketController::class, 'buyOrder'])->name('market.buy_order');
Route::get('/market/sell-orders', [MarketController::class, 'sellOrder'])->name('market.sell_order');
Route::get('/yZWtEdK340LB', [MarketController::class, 'getCurrencyList'])->name('market.currencyList');
Route::post('/RCDR2HxEhnrT', [MarketController::class, 'createBuyOrder'])->name('market.createBuyOrder');
Route::post('/A8RXXGZDZlnC', [MarketController::class, 'updateBuyOrder'])->name('market.updateBuyOrder');

Route::post('/Nm1VXp7Ag3gB', [MarketController::class, 'createSellOrder'])->name('market.createSellOrder');
Route::post('/hAyuQyEj7bib', [MarketController::class, 'updateSellOrder'])->name('market.updateSellOrder');
Route::delete('/j8Fg9MZlv0d8/{id}', [MarketController::class, 'deleteSellOrder'])->name('market.deleteSellOrder');
Route::delete('/WpJSLDfizhfC/{id}', [MarketController::class, 'deleteBuyOrder'])->name('market.deleteBuyOrder');

Route::get('/GUBgwNqrTHej', [MarketController::class, 'loadMoreBuyOrders'])->name('market.loadMoreBuyOrders');
Route::get('/A3KrD2G8nyZY', [MarketController::class, 'loadMoreSellOrders'])->name('market.loadMoreSellOrders');

#filter
Route::post('/filter/buy', [MarketController::class, 'filterBuyers'])->name('market.filterBuyers');
Route::post('/filter/sell', [MarketController::class, 'filterSellers'])->name('market.filterSellers');




Route::post('/CiJZ2ZHdwVNU', [MarketController::class, 'confirmBuy'])->name('market.confirm_buy');
Route::post('/KTus7PTlWJFQ', [MarketController::class,  'confirmSell'])->name('market.confirm_sell');

#initiate trade
Route::post('/MVziqhb20YFj', [MarketController::class, 'initiateTrade'])->name('market.initiateTrade');



Route::get('/trade/buy/{id}', [MarketController::class, 'openBuyTrade'])->name('market.openBuyTrade');

Route::get('/trade/sell/{id}', [MarketController::class, 'openSellTrade'])->name('market.openSellTrade');


Route::get('/payment/{id}', [MarketController::class, 'payment'])->name('market.payment');



Route::get('/test', function(){
    return view("test");
});
