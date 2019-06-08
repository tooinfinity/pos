<?php

namespace App\Http\Controllers\Dashboard;

use App\Spending;
use App\CategorySpending;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spendings = Spending::all();
        $categoryspendings = CategorySpending::all();
        $totalspendings = collect($spendings)->sum('spending_price');
        return view('dashboard.spending.index', compact('categoryspendings', 'spendings', 'totalspendings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'category_spending_id' => 'required',
            'spending_description' => 'required',
            'spending_price' => 'required',

        ]);
        Spending::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Spending  $spending
     * @return \Illuminate\Http\Response
     */
    public function show(Spending $spending)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Spending  $spending
     * @return \Illuminate\Http\Response
     */
    public function edit(Spending $spending)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Spending  $spending
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spending $spending)
    {
        $request->validate([
            'category_spending_id' => 'required',
            'spending_description' => 'required',
            'spending_price' => 'required',

        ]);
        $spending->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Spending  $spending
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spending $spending)
    {
        $spending->delete();
        return redirect()->back();
    }
}