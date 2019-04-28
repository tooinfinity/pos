<?php

namespace App\Http\Controllers\Dashboard;

use App\Product;
use App\Category;
use App\Provider;
use App\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $providers = Provider::all();
        $categories = Category::all();
        $products = Product::all();
        $purchases = Purchase::all();
        return view('dashboard.purchase.index', compact('purchases', 'providers', 'categories', 'products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = Provider::all();
        $categories = Category::all();
        $products = Product::all();
        $purchases = Purchase::all();
        //$lastsaleId = sale::all()->last()->number_sale;

        //$sale_number = 'SN' . date('Ymd') . '0001';
        if (Purchase::all()->last() == null) {
            $purchase_number = 'PN' . date('Ymd') . '0001';
        } else {
            $lastsaleId = sale::all()->last()->number_purchase;
            $lastIncreament = substr($lastsaleId, -4);
            $purchase_number = 'PN' . date('Ymd') . str_pad($lastIncreament + 1, 4, 0, STR_PAD_LEFT);
        }

        return view('dashboard.purchase.create', compact('purchase_number', 'providers', 'categories', 'products'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}