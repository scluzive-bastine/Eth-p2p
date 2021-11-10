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

#Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/jqyMuUT0JJ7T', [ProfileController::class, 'getProfile'])->name('profile.getProfile');
Route::post('/xhFNZo8kWLn2', [ProfileController::class, 'updateTerms'])->name('profile.update_terms');
Route::post('/GVqMvS7i6vZl', [ProfileController::class, 'updateBlurb'])->name('profile.update_blurb');
Route::post('/JnsD1d7iL3Fu', [ProfileController::class, 'updatePhone'])->name('profile.update_phone');
Route::post('/ZnjNiwZoJUcV', [ProfileController::class, 'updateName'])->name('profile.update_name');
Route::post('/anLYLlswr2yP', [ProfileController::class, 'updateEmail'])->name('profile.update_email');
Route::post('/UjnZDYOh1e76', [ProfileController::class, 'updateBankDetails'])->name('profile.update_bankDetails');




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

#initiate trade
Route::post('/MVziqhb20YFj', [MarketController::class, 'initiateTrade'])->name('market.initiateTrade');


#requests
Route::get('/market/buy-request/{id}', [MarketController::class, 'showBuyers'])->name('market.buy_request');
Route::get('/market/sell-request/{id}', [MarketController::class, 'showSellers'])->name('market.sell_request');


Route::get('/trade/buy/{id}', [MarketController::class, 'openBuyTrade'])->name('market.openBuyTrade');

Route::get('/trade/sell/{id}', [MarketController::class, 'openSellTrade'])->name('market.openSellTrade');

#payments
Route::get('/payment/{id}', [MarketController::class, 'payment'])->name('market.payment');

Route::post('/CiJZ2ZHdwVNU', [MarketController::class, 'confirmCashSent'])->name('market.confirm_cash_sent');
Route::post('/KTus7PTlWJFQ', [MarketController::class, 'confirmCashReceived'])->name('market.confirm_cash_received');
Route::post('/RrbEhuf08Aaa', [MarketController::class, 'cancelTrade'])->name('market.cancelTrade');
Route::post('/rWCP847N385k', [MarketController::class, 'openDispute'])->name('market.openDispute');

Route::get('/test', function(){
    return view("test");
});
