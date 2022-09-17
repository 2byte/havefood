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
      
      $category = null;
      
      if (!is_null($categoryId)) {
        $category = GoodsCategory::find($categoryId);
      }
      
      $goods = Goods::getList(categoryId: $categoryId);
      
      return Inertia::render('ListGoods', [
          'category' => $category, 
          'goods' => $goods
      ]);
    }
    
    public function listCategories(Request $request)
    {
      return Inertia::render('ListCategories');
    }
    
    public function options()
    {
      return Inertia::render('Options');
    }
}
