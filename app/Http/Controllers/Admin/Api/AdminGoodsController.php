<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\V1\Goods\GoodsValidationRules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\Goods;

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

    $fields = $request->only($goodsValidation->getFields()) + ['user_id' => $request->user()->id];
    
    $goods = Goods::create(
      $fields
    );

    return responseApi()->success([
      'goods_id' => $goods->id
    ]);
  }
  
  public function get(Request $request)
  {
    $id = $request->id;
    
    if (is_null($id)) {
      throw ValidationException::withMessages([
        'message' => 'incorrect the id'
      ]);
    }
    
    $goods = Goods::find($id);
    
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