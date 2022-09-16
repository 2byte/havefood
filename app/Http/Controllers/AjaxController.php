<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use Illuminate\Support\Facades\Blade;

class AjaxController extends Controller
{
  //
  public function index(Request $request) 
  {
    
    return view('index', $tplData);
  }
  
  public function getGoodsHtmlBodyModal(Request $request)
  {
    $id = $request->id;
    
    $goods = Goods::with('previews', 'options.files')->findOrFail($id);
    
    $goods->makeOptionTreeAttribute();
    
    $returnData = [
      'goods' => $goods->getAttributes(),
      'options' => $goods->options,
      'modal_body' => Blade::render('goods.modal_view_goods', compact('goods'))
    ];
    
    return responseApi($returnData)->success();
  }
  
}