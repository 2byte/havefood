<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class BaseModel extends Model
{
  protected static function booted() {
    Relation::enforceMorphMap([
      User::MORPH => 'App\Models\User',
      Goods::MORPH => 'App\Models\Goods',
      GoodsOption::MORPH => 'App\Models\GoodsOption',
      GoodsCategory::MORPH => 'App\Models\GoodsCategory',
    ]);
  }

  public function files() {
    return $this->morphMany(File::class, 'relate');
  }

  public function latestFile() {
    return $this->morphOne(File::class, 'relate')->latestOfMany();
  }

  public function oldestFile() {
    return $this->morphOne(File::class, 'relate')->oldestOfMany();
  }
  
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}