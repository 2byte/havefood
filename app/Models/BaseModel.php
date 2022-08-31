<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Storage;

class BaseModel extends Model
{
  public $imagePreviewSizes = [
    'small' => [300,
      300],
    'big' => [600,
      600],
    'original' => null
  ];

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

  public function makePathFile($modeFile) {}

  /**
   * Getting all previews of sorted
   * 
   * @return Illuminate\Support\Collection^ {
   * #items: array:3 [
   *   0 => array:3 [
   *     "small" => array:2 [
   *     "url" => "/storage/static/uploads/goods/1/ez9bhigffaEFjzFSqBrTUfRVyCWt5BJCz8RGTtBC_300x300.jpg"
   *     "id" => 1 {id file}
   *     ],
   *     "big" => array:2 [
   *     "url" => "/storage/static/uploads/goods/1/ez9bhigffaEFjzFSqBrTUfRVyCWt5BJCz8RGTtBC_600x600.jpg"
   *     "id" => 1
   *     ]
   *     "original" => array:2 [
   *     "url" => "/storage/static/uploads/goods/1/ez9bhigffaEFjzFSqBrTUfRVyCWt5BJCz8RGTtBC.jpg"
   *     "id" => 1
   *     ]
   *   ]
   *   ....
   * ]
   * }
   * */
  public function getImagePreviews() {

    $previews = $this->files()
    ->orderBy('sortpos', 'asc')
    ->get()
    ->map(function ($file) {

      $images = [];

      foreach ($this->imagePreviewSizes as $nameSize => [$sizeX, $sizeY]) {
        if ($sizeX && $sizeY) {
          [$filename, $extension] = explode('.', $file->filename);

          $filenamePreview = $filename .'_'. $sizeX .'x'. $sizeY .'.'. $extension;
        } elseif ($nameSize == 'original') {
          $filenamePreview = $file->filename;
        }

        $pathfile = $this->uploadDir .'/'. $file->user_id .'/'. $filenamePreview;

        if (Storage::exists($pathfile)) {
          $images[$nameSize] = [
            'url' => Storage::url($pathfile),
            'id' => $file->id
          ];
        }
      }
      
      return $images;
    });
    
    return $previews;
  }

  public function user() {
    return $this->belongsTo(User::class);
  }
}