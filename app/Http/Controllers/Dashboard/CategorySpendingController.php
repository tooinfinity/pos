<?php

namespace App\Http\Controllers\Dashboard;

use App\CategorySpending;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategorySpendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_spending = CategorySpending::all();
        return view('dashboard.spending.category.index', compact('category_spending'));
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
            'category_spending_name' => 'required|unique:category_spendings,category_spending_name',

        ]);
        CategorySpending::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategorySpending  $categorySpending
     * @return \Illuminate\Http\Response
     */
    public function show(CategorySpending $categorySpending)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategorySpending  $categorySpending
     * @return \Illuminate\Http\Response
     */
    public function edit(CategorySpending $categorySpending)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategorySpending  $categorySpending
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategorySpending $categorySpending)
    {
        $request->validate([
            'category_spending_name' => 'required|unique:category_spendings,category_spending_name' . $categorySpending->id,

        ]);
        $categorySpending->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategorySpending  $categorySpending
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategorySpending $categorySpending)
    {
        $categorySpending->delete();
    }
}
