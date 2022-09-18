<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Shop\Goods\Enums\GoodsType;
use App\Shop\Goods\Enums\GoodsOptionPriceType;
use App\Shop\Goods\Enums\GoodsOptionGroupType;

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
      $options->each(function ($option) {
        $this->makePreviewAttribute($option);
      });
    }
    
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
  
  public function makePreviewAttribute(self $option)
  {
    if ($option->previews->isNotEmpty()) {
      $option->setAttribute('preview_of_sizes',  $option->getImagePreviews($option->previews));
    }
  }
}