<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Shop\Goods\Enums\GoodsType;
use App\Shop\Goods\Enums\GoodsOptionPriceType;
use App\Shop\Goods\Enums\GoodsOptionGroupType;

class GoodsOption extends Model
{
  use HasFactory;

  public $table = 'goods_options';

  public $fillable = [
    'user_id',
    'parent_id',
    'group',
    'group_variant',
    'name',
    'description',
    'note',
    'goods_type',
    'price',
    'price_type',
    'sortpos',
    'count_photos',
    'default',
    'hidden',
  ];

  protected $casts = [
    'goods_type' => GoodsType::class,
    'price_type' => GoodsOptionPriceType::class,
    'group_type' => GoodsOptionGroupType::class,
  ];

  const MORPH = 'goodsoption';

  public function goods() {
    return $this->belongsToMany(Goods::class, 'goods_ref_options', 'option_id', 'goods_id')->withTimestamps();
  }

  public function optionChilds() {
    return $this->hasMany(self::class, 'parent_id', 'id');
  }
  
  public function scopeRoot($query) {
    return $query->whereNull('parent_id');
  }

  /**
   * 
   * @return Illuminate\Database\Eloquent\Collection {
     "items": array(
       GoodsOption {
         childs => Illuminate\Database\Eloquent\Collection
       },
       GoodsOption {
         childs => Illuminate\Database\Eloquent\Collection
       },
     )
   }
   * */
  public static function makeOptionTree($options) {
    // load all options
    $stockOptions = $options;

    // load all a childs
    $stockOptions->each(function ($option) use ($stockOptions) {
      if ($option->group) {
        $childOptions = static::query()->whereParentId($option->id)
        ->orderBy('sortpos', 'asc')
        ->get()
        ->whenEmpty(fn () => collect());
        $option->setAttribute('childs', $childOptions);
      }
    });
    
    if ($stockOptions[0]->pivot) {
      $sortedOptionWithGroups = $stockOptions->sortBy(function ($option) {
        return $option->pivot->sortpos;
      });
      // do up the index from pivot
      $sortedOptionWithGroups->each(function ($option) {
        $option->setAttribute('sortpos', $option->pivot->sortpos);
      });
      
      return $sortedOptionWithGroups->values();
    }
    
    return $stockOptions;
  }
}