<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Models\File;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Validation\ValidationException;
use App\Shop\Enums\FiletypeEnum;

class AdminApiFileController extends AdminBaseController
{

  /**
   * 
   * @return [
   *   [
   *     
   *   ]
   * ]
   **/
  public function upload(Request $request) {

    $aliasModel = $request->model;

    $model = Relation::getMorphedModel($aliasModel)::getModel();

    $uploadedFiles = $model->uploadFile($request);

    $createdFiles = array_map(function ($dataFile) use ($request, $aliasModel) {
      
      $file = File::create([
        'user_id' => $request->user()->id,
        'relate_type' => $aliasModel,
        'filename' => $dataFile['filename'],
        'type' => $dataFile['is_img'] ? FiletypeEnum::Img : FiletypeEnum::File,
        'filesize' => $dataFile['size']
      ]);
      
      return array_merge($dataFile, ['id' => $file->id]);
    }, $uploadedFiles);


    return responseApi($createdFiles)->success();
  }
}