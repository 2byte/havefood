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
    
    public function goodsItem()
    {
        $goods = Goods::first();
        
        return Inertia::render('GoodsItemTest', compact('goods'));
    }
    
}
