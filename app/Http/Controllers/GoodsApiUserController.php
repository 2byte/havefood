<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\GoodsOption;

class GoodsApiUserController extends Controller
{
  //
  public function get(Request $request) 
  {
    $id = $request->id;
    
    $goods = Goods::with('options')->findOrFail($id);
    
    $goods->makeOptionTreeAttribute();
    
    return responseApi()->success();
  }
}