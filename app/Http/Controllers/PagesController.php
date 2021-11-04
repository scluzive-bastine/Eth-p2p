<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PagesController extends Controller
{ 
    public function index()
    { 
        return view('welcome');
    }

    public function connectWallet()
    {
        return Inertia::render('Login');
    }

    public function marketPlace()
    {
        return Inertia::render('Market');
    }

    public function profile()
    {
        return Inertia::render('Profile');
    }
    
    public function openTrade()
    {
        return Inertia::render('Trade');
    }

    public function paymentPage()
    {
        return Inertia::render('Payment');
    }
}
