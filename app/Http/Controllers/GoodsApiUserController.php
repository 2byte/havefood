<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;

class GoodsApiUserController extends Controller
{
  //
  public function get(Request $request) 
  {
    
    return responseApi()->success();
  }
}