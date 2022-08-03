<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use App\Models\GoodsCategory;

class AdminIndexController extends AdminBaseController
{
    //
    public function index(Request $request)
    {
        return Inertia::render('HomeView');
    }
    
    public function listGoods(Request $request, $categoryId = null)
    {
        $category = GoodsCategory::find($categoryId)
        
        if (!is_null($category)) {
            $goods = $category->goods->
        }
        
        return Inertia::render('ListGoods', [
            'category' => $category
        ]);
    }
    
}
