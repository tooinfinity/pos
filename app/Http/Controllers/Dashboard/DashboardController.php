<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;
class DashboardController extends Controller
{
    public function index()
    {
        $moderator = User::all();
        return view('dashboard.index', compact('moderator'));
    }
}
