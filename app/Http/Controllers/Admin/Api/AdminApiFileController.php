<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Models\File;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Validation\ValidationException;

class AdminApiFileController extends AdminBaseController
{
  
  public function upload(Request $request) {
    
    $aliasModel = $request->model;
    
    $model = Relation::getMorphedModel($aliasModel)::getModel();
    
    $uploadedFiles = $model->uploadFile($request);
    
    return responseApi($uploadedFiles)->success();
  }
}