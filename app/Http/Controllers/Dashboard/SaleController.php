<?php

namespace App\Http\Controllers\Dashboard;

use App\Sale;
use App\Client;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        $categories = Category::all();
        $products = Product::all();
        $sales = Sale::all();
        return view('dashboard.sale.index', compact('sales', 'clients', 'categories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $categories = Category::all();
        $products = Product::all();
        $sales = Sale::all();
        //$lastsaleId = sale::all()->last()->number_sale;

        //$sale_number = 'SN' . date('Ymd') . '0001';
        if (sale::all()->last() == null) {
            $sale_number = 'SN' . date('Ymd') . '0001';
        } else {
            $lastsaleId = sale::all()->last()->number_sale;
            $lastIncreament = substr($lastsaleId, -4);
            $sale_number = 'SN' . date('Ymd') . str_pad($lastIncreament + 1, 4, 0, STR_PAD_LEFT);
        }

        return view('dashboard.sale.create', compact('sale_number', 'clients', 'categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'number_sale' => 'required',
            'total' => 'required',
            'discount' => 'required',
            'total_amount' => 'required',
            'status' => 'required',
            'client_id' => 'required',
        ]);
        $data = $request->all();

        $sale = Sale::create([
            'number_sale' => $data['number_sale'],
            'total' => $data['total'],
            'discount' => $data['discount'],
            'total_amount' => $data['total_amount'],
            'status' => $data['status'],
            'client_id' => $data['client_id'],
        ]);


        $sale->products()->sync($sync_data);


        //$datap = request('product_id');

        //$sale = $request->all();
        /*foreach (Input::get('product_id') as $PId) {
            $sale->products()->attach($request->$PId);
        }*/
        //$sale->products()->attach($request->product_id, $request->quantity);
        return dd($sale);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {

        //
    }
}