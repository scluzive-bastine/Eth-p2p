<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/connect/wallet', [PagesController::class, 'connectWallet'])->name('connect.wallet');
Route::get('/market', [PagesController::class, 'marketPlace'])->name('market.place');
Route::get('/profile', [PagesController::class, 'profile'])->name('user.profile');
Route::get('/open/trade', [PagesController::class, 'openTrade'])->name('trade.open');
Route::get('/payment', [PagesController::class, 'paymentPage'])->name('payment');
