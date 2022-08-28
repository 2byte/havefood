<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use App\Models\GoodsCategory;
use App\Models\Goods;

class AdminIndexController extends AdminBaseController
{
    //
    public function index(Request $request)
    {
        return Inertia::render('HomeView');
    }
    
    public function listGoods(Request $request, $categoryId = null)
    {
        $category = GoodsCategory::find($categoryId);
        
        if (!is_null($category)) {
            $goods = $category->goods()->sortByFresh()->paginate(10);
        }
        
        return Inertia::render('ListGoods', [
            'category' => $category, 
            'goods' => $goods
        ]);
    }
    
    /**
     * Test page for goods components
     * */
    public function goodsItem(Request $request)
    {
        return Inertia::render('FormFilePickerTest', [
          'goods-id' => (int)$request->goods_id
        ]);
    }
    
    public function formFilePickerTest(Request $request)
    {
        return Inertia::render('TestPages/FormFilePickerTest', [
          'goods-id' => (int)$request->goods_id
        ]);
    }
    
    public function categoryTest(Request $request)
    {
        return Inertia::render('CategoryTest', []);
    }
}
