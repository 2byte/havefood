<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;

class AjaxController extends Controller
{
  //
  public function index(Request $request) {
    
    return view('index', $tplData);
  }
  
  
}