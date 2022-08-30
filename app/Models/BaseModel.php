<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Storage;

class BaseModel extends Model
{
  public $imagePreviewSize = [300, 300];
  
  protected static function booted() {
    Relation::enforceMorphMap([
      User::MORPH => 'App\Models\User',
      Goods::MORPH => 'App\Models\Goods',
      GoodsOption::MORPH => 'App\Models\GoodsOption',
      GoodsCategory::MORPH => 'App\Models\GoodsCategory',
    ]);
  }

  public function files() {
    return $this->morphMany(File::class, 'relate')->orderBy('sortpos', 'asc');
  }

  public function latestFile() {
    return $this->morphOne(File::class, 'relate')->latestOfMany();
  }

  public function oldestFile() {
    return $this->morphOne(File::class, 'relate')->oldestOfMany();
  }
  
  public function makePathFile($modeFile) {
    
  }

  public function getImagePreviews() {
    
    $previews = $this->files()
    ->orderBy('sortpos', 'asc')
    ->get()
    ->map(function ($file) {
      [$filename, $extension] = explode('.', $file->filename);
      [$sizeX, $sizeY] = $this->imagePreviewSize;
      
      $filenamePreview = $filename .'_'. $sizeX .'x'. $sizeY .'.'. $extension;

      $pathfile = $this->uploadDir .'/'. $file->user_id .'/'. $filenamePreview;
      
      return Storage::exists($pathfile)
      ? [
        'url' => Storage::url($pathfile),
        'id' => $file->id
      ] : null;
    })->filter(fn ($item) => !is_null($item));
    
    return $previews;
  }

  public function user() {
    return $this->belongsTo(User::class);
  }
}