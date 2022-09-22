<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Shop\Goods\Enums\GoodsType;

class GoodsCategory extends Model
{
    use HasFactory;
    
    public $table = 'goods_categories';
    public $fillable = [
      'name',
      'sortpos',
      'goods_type',
    ];
    
    protected $casts = [ 'goods_type' => GoodsType::class ];
    
    const MORPH = 'goodscategory';
    
    public function goods()
    {
        return $this->hasMany(Goods::class, 'category_id');
    }
    public static function getList()
    {
        return static::query()->orderyBy('sortpos', 'asc')->get();
    }
    
    public static function sort($direction, $categoryId)
    {
      $lastSortpos = static::query()->orderBy('sortpos', 'desc')->take(1)->value('sortpos');
      
      $category = static::findOrFail($categoryId);
      
      $sortposUp = [];
      
      if ($direction == 'down' && $category->sortpos >= 0 && $category->sortpos != $lastSortpos) {
        static::query()->whereSortpos($category->sortpos + 1)
          ->update([
            'sortpos' => $category->sortpos
          ]);
        static::query()->find($category->id)
          ->update([
            'sortpos' => $category->sortpos + 1
          ]);
      } elseif ($direction == 'up' && $category->sortpos > 0 && $category->sortpos != $lastSortpos) {
        static::query()->whereSortpos($category->sortpos - 1)
          ->update([
            'sortpos' => $category->sortpos
          ]);
        static::query()->find($category->id)
          ->update([
            'sortpos' => $category->sortpos - 1
          ]);
      }
      
      return true;
    }
}
