<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use App\Product;
use App\Category;
use App\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index()
    {
        $moderator = User::all();
        $categories = Category::all();
        $products = Product::all();
        $general_settings = DB::table('general_settings')->where('id', 1)->get();
        foreach ($general_settings as $key => $general_setting) {
            $store_id = $general_setting->id;
            $store_name = $general_setting->store_name;
            $start_day = $general_setting->start_day;
            $logo = $general_setting->image;
        }
        return view('dashboard.index', compact('moderator', 'categories', 'products', 'sumprofit', 'logo'));
    }
    public function pos()
    {
        $moderator = User::all();
        $categories = Category::all();
        $products = Product::all();
        return view('dashboard.pos.index', compact('moderator', 'categories', 'products'));
    }
}