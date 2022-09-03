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
}