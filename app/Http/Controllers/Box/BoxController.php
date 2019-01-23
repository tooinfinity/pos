<?php

namespace App\Http\Controllers\Box;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoxController extends Controller
{
    public function index()
    {
        return view('box.index');
    }
}
