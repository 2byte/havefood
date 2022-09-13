<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;

class HomeController extends Controller
{
  //
  public function index(Request $request) {
    
    $goods = Goods::getList($request->input('category_id')); 
    
    $tplData = [
      'goods' => $goods
    ];
    
    return view('index', $tplData);
  }
}