<?php

namespace App\Http\Controllers;

use App\Client;
use App\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clients = Client::all();
        $transactions = Transaction::all();
        $stats = [
            'clients' => $clients->count(),
            'transactions' => $transactions->count()
        ];
        return view('home', compact('stats'));
    }
}
