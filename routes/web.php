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

Route::get('/trade', [PagesController::class, 'openTrade'])->name('trade');

Route::get('/payment', [PagesController::class, 'paymentPage'])->name('payment');



Route::get('/test', function(){
    return view("test");
});