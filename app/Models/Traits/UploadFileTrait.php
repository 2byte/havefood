<?php

namespace App\Models\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait UploadFileTrait {

  public function uploadFile(Request $request) {
    
    $validationRules = ['required', 'file'];
    
    if (!empty($this->uploadAccessibleExtensions)) {
      $validationRules[] = ['mimes:'. implode(',', $this->uploadAccessibleExtensions)];
    }
    if (!empty($this->uploadMaxFilesizeKb)) {
      $validationRules[] = ['size:'. $this->uploadMaxFilesizeKb];
    }
    
    $request->validate([
      'files' => $validationRules,
      'files.*' => $validationRules,
      'model' => 'required',
    ]);
    
    $files = is_array($request->files) ? $request->files : [$request->file('files')];
    $aliasModel = $request->model;
    $userId = $request->user()->id;
    
    $uploadedFiles = array_map(function ($file) use ($aliasModel, $userId) {
      
      $path = $file->store($this->uploadDir .'/'. $userId);
      
      return [
        'path' => $path, 
        'filename' => basename($path)
      ];
    }, $files);
    
    return $uploadedFiles;
  }
}