<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }
}
