<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\V1\Goods\GoodsValidationRules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\Goods;
use App\Models\File;

class AdminGoodsController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    //
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
    //
    $goodsValidation = app(GoodsValidationRules::class);

    $request->validate(...$goodsValidation->getRulesStore());

    $fields = $request->only($goodsValidation->getFields());
    
    if ($request->mode == 'create') {
      $fields['user_id'] = $request->user()->id;
    }
    
    $return = [];
    
    if ($request->mode == 'create') {
      $goods = Goods::create($fields);
      
      $return['goods_id'] = $goods->id;
    } else {
      $goods = Goods::findOrFail($request->id);
      $goods->update($fields);
    }
    
    File::whereRelateType(Goods::MORPH)
      ->whereUserId($request->user()->id)
      ->whereRelateId(0)
      ->update(['relate_id' => $goods->id]);

    return responseApi()->success($return);
  }
  
  public function delete(Request $request)
  {
    $id = $request->id;
    
    Goods::findOrFail($id)->delete();
    
    return responseApi()->success();
  }
  
  public function get(Request $request)
  {
    $id = $request->id;
    $typeList = $request->input('type_list', 'singleGoods');
    
    // get list goods
    if ($typeList != 'singleGoods') {
      
    }
    
    // get one goods
    if (is_null($id) && $typeList == 'singleGoods') {
      throw ValidationException::withMessages([
        'message' => 'Incorrect the id'
      ]);
    }
    
    $goods = Goods::with('previews')->findOrFail($id);
    
    $goods->setAttribute('preview_of_sizes', $goods->preview_sizes);
    
    return responseApi($goods)->success();
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id) {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id) {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id) {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id) {
    //
  }
}