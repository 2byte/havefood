<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\Goods;

class AdminApiGoodsOptionController extends AdminBaseController
{
    //
    
    public function getGoodsOptions(Request $request)
    {
      $goods = Goods::findOrFail($request->goods_id);
      
      $options = $goods->options;
      $treeOptions = $goods->getOptionsWithGroups();
      
      return responseApi(compact('options', 'treeOptions'))->success();
    }
}
