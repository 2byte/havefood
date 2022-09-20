<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Shop\Goods\Enums\GoodsType;
use App\Shop\Goods\Enums\GoodsOptionPriceType;
use App\Shop\Goods\Enums\GoodsOptionGroupType;
use Illuminate\Support\Facades\DB;

class GoodsOption extends BaseModel
{
  use HasFactory, Traits\UploadFileTrait;

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
    'group_variant' => GoodsOptionGroupType::class,
  ];

  const MORPH = 'goodsoption';
  
  public $uploadDir = 'public/static/uploads/goodsoption';
  public $uploadAccessibleExtensions = [];
  public $uploadMaxFilesizeKb = 20000;
  public $uploadImageDimensions = [300,
    300];
  // 1/1, 2/1, 3/4
  public $uploadImageRatio = null;
  public $uploadImageResizeSizes = [
    [600,
      600],
    [300,
      300]
  ];

  public function goods() {
    return $this->belongsToMany(Goods::class, 'goods_ref_options', 'option_id', 'goods_id')->withTimestamps();
  }

  public function optionChilds() {
    return $this->hasMany(self::class, 'parent_id', 'id')->orderBy('sortpos', 'asc');
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
  public static function makeOptionTree($options, $makePreviews = true) {
    // load all options
    $stockOptions = $options;
    
    // making previews
    if ($makePreviews) {
      $options->each->makePreviewAttribute();
    }
    
    // load all a childs
    $stockOptions->each(function ($option) use ($stockOptions, $makePreviews) {
      if ($option->group) {
        $childOptions = static::query()->whereParentId($option->id)
        ->orderBy('sortpos', 'asc')
        ->get()
        ->whenEmpty(fn () => collect());
        
        // previews for childs options
        if ($makePreviews) {
          $childOptions->each->makePreviewAttribute();
        }
        
        $option->setAttribute('childs', $childOptions);
      }
    });
    
    // Sort by pivot table sortpos
    if (isset($stockOptions[0]) && $stockOptions[0]->pivot) {
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
  
  public function makePreviewAttribute()
  {
    $previews = collect();
    
    if ($this->previews->isNotEmpty()) {
      $previews = $this->getImagePreviews($this->previews);
    }
    
    $this->setAttribute('preview_of_sizes',  $previews);
  }
  
  public static function makeSort($direction = 'up', $optionId, $goodsId = null)
  {
    $option = GoodsOption::findOrFail($optionId);

    // sort in group
    if (!is_null($option->parent_id)) {
      if (
        ($direction == 'up' && $option->sortpos == 0) ||
        (
          $direction == 'down' && $option->sortpos == $option->optionChilds()->count() - 1
        )
      ) {
        return false;
      }

      $queryTarget = GoodsOption::whereParentId($option->parent_id);

      if ($direction == 'up') {
        $queryTarget->whereSortpos($option->sortpos - 1)
        ->increment('sortpos');
      } else {
        $queryTarget->whereSortpos($option->sortpos + 1)
        ->decrement('sortpos');
      }

      if ($direction == 'up') {
        $option->decrement('sortpos');
      } else {
        $option->increment('sortpos');
      }

      return true;
    }

    // Sort for pivot with attached to goods
    $goods = Goods::findOrFail($goodsId);
    
    $optionPivot = DB::table('goods_ref_options')
    ->whereGoodsId($goodsId)
    ->whereOptionId($optionId)
    ->first();

    if ($direction == 'up' && $optionPivot->sortpos == 0) return false;
    if (
      $direction == 'down' && $optionPivot->sortpos == $goods->options()->count() - 1
    ) {
      return false;
    }

    $queryTarget = DB::table('goods_ref_options')
    ->whereGoodsId($goods->id);

    if ($direction == 'up') {
      $queryTarget->whereSortpos($optionPivot->sortpos - 1)
      ->increment('sortpos', 1);
    } else {
      $queryTarget->whereSortpos($optionPivot->sortpos + 1)
      ->decrement('sortpos', 1);
    }

    $queryCurrent = DB::table('goods_ref_options')
    ->whereId($optionPivot->id);

    if ($direction == 'up') {
      $queryCurrent->decrement('sortpos');
    } else {
      $queryCurrent->increment('sortpos');
    }

    return true;
  }
}