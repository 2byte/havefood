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
          
        if (!is_null($category)) {
          $goods = $category->goods()->sortByFresh()->paginate(10);
        }
      
      } else {
        $goods = Goods::sortByFresh()->paginate(15);
      }
      
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
