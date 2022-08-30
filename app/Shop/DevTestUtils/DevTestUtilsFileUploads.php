<?php

namespace App\Shop\DevTestUtils;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use App\Models\File;
use Illuminate\Support\Arr;

class DevTestUtilsFileUploads
{

  public static function make() {
    return new static();
  }

  public function makeFileUploads() {}

  public function clearFileUploads() {
    Storage::deleteDirectory('public/static/uploads');
  }

  /**
   * Using in tests
   * 
   * */
  public function createUploads($test, Model $model, $count = 1) {

    Storage::fake('images');

    $files = [];

    for ($i = 0; $i <= $count - 1; $i++) {
      $files[] = UploadedFile::fake()->image('image.jpg')->size(100);
    }

    $response = $test->postJson('/api/gov/file/upload', [
      'files' => $files,
      'model' => $model::MORPH,
      'relate_id' => $model->id,
    ]);
    
    $response->assertStatus(200);
    
    return [File::findMany(Arr::pluck($response['data'], 'id')), $response['data']];
  }

}