<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Shop\Goods\Enums\GoodsType;
use Illuminate\Support\Facades\DB;
use App\Shop\V1\Goods\GoodsManager;

class Goods extends BaseModel
{
  use HasFactory,
  Traits\UploadFileTrait;

  public $table = 'goods';

  public $fillable = [
    'user_id',
    'category_id',
    'name',
    'description',
    'price',
    'sticker',
    'count_photos',
    'goods_type',
    'hidden'
  ];

  protected $casts = ['goods_type' => GoodsType::class];

  const MORPH = 'goods';

  public $uploadDir = 'public/static/uploads/goods';
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
  //public $imagePreviewSize = [300, 300];

  public function category() {
    return $this->belongsTo(GoodsCategory::class);
  }

  public static function getList($categoryId = null) {
    //$query = static::query();

    //$query->when($categoryId, fn () => $query->whereCategory)
  }

  public function scopeSortByFresh($query) {
    return $query->orderBy('id', 'desc');
  }

  public function options() {
    return $this->belongsToMany(GoodsOption::class, 'goods_ref_options', 'goods_id', 'option_id')
    ->withTimestamps()
    ->withPivot('own_user_id', 'set_user_id', 'sortpos');
  }

  public function attachOption($optionId, $userId) {
    if ($optionId instanceof GoodsOption) {
      $optionId = $optionId->id;
    }
    if ($userId instanceof User) {
      $userId = $userId->id;
    }

    if (is_numeric($optionId)) {
      $option = GoodsOption::findOrFail($optionId);
    }

    $sortpos = DB::table('goods_ref_options')->selectRaw('COUNT(*) as count')->whereGoodsId($this->id)->value('count');

    $this->options()->attach($optionId, [
      'sortpos' => $sortpos,
      'own_user_id' => $option->user_id,
      'set_user_id' => $userId
    ]);
  }

  public function makeOptionSortUp($optionId,
    $direction = 'up'): bool
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

    // Sort for pivot
    $optionPivot = DB::table('goods_ref_options')
    ->whereGoodsId($this->id)
    ->whereOptionId($optionId)
    ->first();

    if ($direction == 'up' && $optionPivot->sortpos == 0) return false;
    if (
      $direction == 'down' && $optionPivot->sortpos == $this->options()->count() - 1
    ) {
      return false;
    }

    $queryTarget = DB::table('goods_ref_options')
    ->whereGoodsId($this->id);

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

  public function makeOptionSortDown($optionId) {
    return $this->makeOptionSortUp($optionId, 'down');
  }
}