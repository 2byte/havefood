<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\GoodsOption;
use App\Models\File;
use App\Shop\V1\Goods\GoodsOptionValidationRules;
use App\Shop\V1\Goods\GoodsOptionManager;
use Illuminate\Support\Facades\DB;

class AdminApiGoodsOptionController extends AdminBaseController
{
  //

  public function getGoodsOptions(Request $request) {
    $source = $request->source;
    $value = $request->value;
    
    $goods = null;
    
    switch ($source) {
      case 'goodsId':
        $goods = Goods::with('options.previews')->findOrFail($value);
        $options = GoodsOption::makeOptionTree($goods->options);
        $references = DB::table('goods_ref_options')->whereGoodsId($value)->get();
      break;
      
      case 'optionId':
        $options = GoodsOption::makeOptionTree(GoodsOption::with('previews')->findOrFail($value)->optionChilds);
        $references = DB::table('goods_ref_options')->whereOptionId($value)->get();
      break;

      case 'personal':
        $options = GoodsOption::makeOptionTree(
          GoodsOption::with('previews')->root()
            ->whereUserId($request->user()->id)
            ->orderBy('id', 'desc')
            ->get()
        );
        $references = DB::table('goods_ref_options')->whereOwnUserId($request->user()->id)->get();
      break;
      
      case 'all':
        $options = GoodsOption::makeOptionTree(
          GoodsOption::with('previews')->root()
            ->orderBy('id', 'desc')
            ->get()
        );
        $references = DB::table('goods_ref_options')->get();
      break;
    }

    return responseApi(compact('goods', 'options', 'references'))->success();
  }
  
  public function getGoodsOptionFirst(Request $request)
  {
    $id = $request->id;
    
    $option = GoodsOption::findOrFail($id);
    
    return responseApi($option)->success();
  }
  
  public function attach(Request $request) 
  {
    $attach = $request->input('attach', false);
    $goodsId = $request->goods_id;
    $optionId = $request->option_id;
    
    $goods = Goods::findOrFail($goodsId);
    
    if ($attach) {
      $goods->attachOption($optionId, $request->user()->id);
    } else {
      $goods->options()->detach($optionId);
    }
    
    return responseApi()->success();
  }
  
  public function delete(Request $request) 
  {
    $id = $request->id;
    
    $option = GoodsOption::findOrFail($id);
    
    if ($option->group) {
      $option->optionChilds->each->files->each->delete();
      $option->optionChilds->each->delete();
    }
    
    $option->files->each->delete();
    $option->delete();
    
    return responseApi()->success();
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
    
    File::whereRelateType(GoodsOption::MORPH)
      ->whereUserId($request->user()->id)
      ->whereRelateId(0)
      ->update(['relate_id' => $createdOptionId]);

    return responseApi(['option_id' => $createdOptionId])->success();
  }
  
  public function sort(Request $request) 
  {
    $optionId = $request->option_id;
    $goodsId = $request->goods_id;
    $direction = $request->direction;
    
    GoodsOption::makeSort($direction, $optionId, $goodsId);
    
    return responseApi()->success();
  }
}