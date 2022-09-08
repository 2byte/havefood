<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\GoodsOption;
use App\Shop\V1\Goods\GoodsOptionValidationRules;
use App\Shop\V1\Goods\GoodsOptionManager;

class AdminApiGoodsOptionController extends AdminBaseController
{
  //

  public function getGoodsOptions(Request $request) {
    $source = $request->source;
    $value = $request->value;
    
    $goods = null;
    
    switch ($source) {
      case 'goodsId':
        $options = GoodsOption::makeOptionTree(Goods::findOrFail($value)->options);
        $goods = $options[0]->pivot->pivotParent;
      break;
      
      case 'optionId':
        $options = GoodsOption::findOrFail($value)->optionChilds;
      break;

      case 'personal':
        $options = GoodsOption::makeOptionTree(
          GoodsOption::root()
            ->whereUserId($request->user()->id)
            ->orderBy('id', 'desc')
            ->get()
        );
      break;
      
      case 'all':
        $options = GoodsOption::makeOptionTree(
          GoodsOption::root()
            ->orderBy('id', 'desc')
            ->get()
        );
      break;
    }

    return responseApi(compact('goods', 'options'))->success();
  }
  
  public function getGoodsOptionFirst(Request $request)
  {
    $id = $request->id;
    
    $option = Goods::findOrFail($id);
    
    return responseApi($option);
  }

  public function store(Request $request) {

    if ($request->mode == 'update') {
      if ($request->group) {
        GoodsOptionManager::updateOptionGroup($request);
      } else {
        GoodsOptionManager::updateOption($request);
      }

      return responseApi()->success();
    }

    // ---------------- creating ----------------- //

    if ($request->group) {
      $option = GoodsOptionManager::createGroup($request, $request->user());
    } else {
      $option = GoodsOptionManager::createOption($request, $request->user());
    }

    $createdOptionId = $option->getModel()->id;

    if ($request->goods_id != 0 && !is_null($goodsId = $request->goods_id)) {
      Goods::findOrFail($goodsId)->attachOption($createdOptionId, $request->user());
    }

    return responseApi(['option_id' => $createdOptionId])->success();
  }
}