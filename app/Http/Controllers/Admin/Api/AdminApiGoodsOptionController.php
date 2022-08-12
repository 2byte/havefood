<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\Goods;
use App\Shop\V1\Goods\GoodsOptionValidationRules;
use App\Shop\V1\Goods\GoodsOptionManager;

class AdminApiGoodsOptionController extends AdminBaseController
{
    //
    
    public function getGoodsOptions(Request $request)
    {
      $goods = Goods::findOrFail($request->goods_id);
      
      $options = $goods->options;
      $treeOptions = $goods->getOptionsWithGroups();
      
      return responseApi(compact('goods', 'options', 'treeOptions'))->success();
    }
    
    public function store(Request $request)
    {
      
      if ($request->mode == 'update') {
        if ($request->group) {
          GoodsOptionManager::updateOptionGroup($request);
        } else {
          GoodsOptionManager::updateOption($request);
        }
        
        return responseApi()->success();
      }
      
      // --------------------------------- //
      
      if ($request->group) {
        $option = GoodsOptionManager::createGroup($request, $request->user());
      } else {
        $option = GoodsOptionManager::createOption($request, $request->user());
      }
      
      $createdOptionId = $option->getModel()->id;
      
      if (!is_null($goodsId = $request->goods_id)) {
        Goods::findOrFail($goodsId)->attachOption($createdOptionId, $request->user());
      }
      
      return responseApi(['option_id' => $createdOptionId])->success();
    }
}
