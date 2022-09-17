<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\GoodsCategory;

class HomeController extends Controller
{
  //
  public function index(Request $request) {
    
    $goods = Goods::getList($request->input('category_id')); 
    
    $categories = getGoodsCategories();
    
    $goods->appends($request->only('category_id'));
    
    $tplData = [
      'goods'      => $goods,
      'categories' => $categories
    ];
    
    return view('index', $tplData);
  }
  
  /**
   * Test page modal for Goods view
   **/
  public function goodsView(Request $request) {
    
    $goods = Goods::with('previews', 'options.files')->find($request->id);
    
    $goods->makeOptionTreeAttribute();
    
    return view('goods.modal_view_goods', compact('goods'));
  }
}