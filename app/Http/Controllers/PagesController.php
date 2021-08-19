<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function connectWallet()
    {
        return view('pages.connect-wallet');
    }

    public function marketPlace()
    {
        return view('dashboard.market-place');
    }

    public function profile()
    {
        return view('dashboard.profile');
    }

    public function openTrade()
    {
        return view('dashboard.trade');
    }

    public function paymentPage()
    {
        return view('dashboard.payment');
    }
}
