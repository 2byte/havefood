<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Models\File;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Validation\ValidationException;
use App\Shop\Enums\FiletypeEnum;
use App\Http\Resources\ModelPreviewCollection;
use App\Http\Resources\ModelPreviews;
use App\Http\Resources\BaseApiCollection;

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
    $relateId = $request->relate_id;

    $model = Relation::getMorphedModel($aliasModel)::getModel();

    $uploadedFiles = $model->uploadFile($request);

    $createdFiles = array_map(function ($dataFile) use ($request, $aliasModel, $relateId, $model) {
      $sortpos = 0;
      //queryLogEnabled();
      if ($relateId) {
        $sortpos = (File::select('sortpos')
          ->whereRelateId($relateId)
          ->whereRelateType($model->getMorphClass())
          ->orderBy('sortpos', 'desc')
          ->value('sortpos') ?? 0) + 1;
      }
      
      $file = File::create([
        'user_id' => $request->user()->id,
        'relate_id' => $relateId ?? 0,
        'relate_type' => $aliasModel,
        'filename' => $dataFile['filename'],
        'type' => $dataFile['is_img'] ? FiletypeEnum::Img : FiletypeEnum::File,
        'filesize' => $dataFile['size'],
        'sortpos' =>  $sortpos
      ]);
      //queryLogDump();
      return array_merge($dataFile, [
        'id' => $file->id,
        'sortpos' => $file->sortpos
      ]);
    }, $uploadedFiles);


    return responseApi($createdFiles)->success();
  }
  
  public function get(Request $request) 
  {
    $aliasModel = $request->model;
    $relateId = $request->relate_id;

    $model = Relation::getMorphedModel($aliasModel)::getModel()->findOrFail($relateId);

    return responseApi($model->files)->success();
  }
  
  public function getPreviews(Request $request) 
  {
    $aliasModel = $request->model;
    $relateId = $request->relate_id;

    $model = Relation::getMorphedModel($aliasModel)::getModel()->findOrFail($relateId);

    return responseApi($model->previewSizes)->success();
  }
  
  public function delete(Request $request) 
  {
    $id = $request->id;

    $model = File::findOrFail($id);
    
    $model->delete();

    return responseApi()->success();
  }
}