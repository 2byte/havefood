<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\GoodsCategory;
use App\Shop\Goods\Enums\GoodsType;

class AdminGoodsCategoriesController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return responseApi()->success(
            GoodsCategory::orderBy('sortpos', 'asc')->get()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedAttrs = $request->validate([
          'id' => 'nullable|exists:goods_categories,id',
          'name' => 'required|min:3',
          'goods_type' => 'in:'. GoodsType::enumStringValues()
        ]);
        
        $return = [];
        
        if ($request->id) {
          GoodsCategory::findOrFail($request->id)
            ->update($validatedAttrs);
        } else {
          $sortpos = GoodsCategory::orderBy('sortpos', 'desc')->value('sortpos') + 1;
          $validatedAttrs['sortpos'] = $sortpos;
          
          $category = GoodsCategory::create($validatedAttrs);
          
          $return['id'] = $category->id;
        }
        
        return responseApi($return)->success();
    }

    public function delete(Request $request) 
    {
      $id = $request->id;
      
      $category = GoodsCategory::with('goods')->findOrFail($id);
      
      $category->goods->each->delete();
      
      return responseApi()->success();
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
