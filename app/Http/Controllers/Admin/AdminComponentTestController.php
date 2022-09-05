<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminComponentTestController extends AdminBaseController
{

  public function goodsForm(Request $request) {
    return Inertia::render('TestPages/GoodsFormTest', [
      'goods-id' => (int)$request->goods_id
    ]);
  }
  
  public function goodsOptionRelationships(Request $request)
  {
    return Inertia::render('TestPages/GoodsOptionRelationshipsTpage', [
      'goodsId' => (int)$request->goods_id
    ]);
  }
  
  public function goodsOptionList(Request $request)
  {
    return Inertia::render('TestPages/GoodsOptionListTpage', [
      'goodsId' => (int)$request->goods_id
    ]);
  }
}