<?php

namespace App\Http\Controllers\Dashboard;

use App\Sale;
use App\Product;
use App\Purchase;
use App\Spending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MoneyBoxController extends Controller
{
    public function index(Request $request)
    {
        //$salemoney = Sale::where('total_amount')->whereDay('created_at', '=', date('d'));
        $salemoneys = Sale::all();
        $purchasemoneys = Purchase::all();
        $spendmoneys = Spending::all();


        $totalsalemoneys = collect($salemoneys)->sum('total_amount');
        $totalpurchasemoneys = collect($purchasemoneys)->sum('total_amount');
        $totalspendmoneys = collect($spendmoneys)->sum('spending_price');
        $totalboxmoneys = $totalsalemoneys - $totalpurchasemoneys - $totalspendmoneys;

        return view('dashboard.box.index', compact('salemoneys', 'purchasemoneys', 'spendmoneys', 'productmoneys', 'totalsalemoneys', 'totalpurchasemoneys', 'totalspendmoneys', 'totalboxmoneys'));
    }
}