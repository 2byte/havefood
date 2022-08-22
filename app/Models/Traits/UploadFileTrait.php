<?php

namespace App\Models\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait UploadFileTrait {

  public function uploadFile(Request $request) {
    
    $validationRules = ['required', 'file'];
    
    if (!empty($this->uploadAccessibleExtensions)) {
      $validationRules[] = 'mimes:'. implode(',', $this->uploadAccessibleExtensions);
    }
    if (!empty($this->uploadMaxFilesizeKb)) {
      $validationRules[] = 'between:20,'. $this->uploadMaxFilesizeKb;
    }
    
    $request->validate([
      'files' => 'required',
      'files.*' => $validationRules,
      'model' => 'required',
    ], [
      'files.required' => 'Файлы не получены'
    ]);
    
    $files = is_array($request->file('files')) ? $request->file('files') : [$request->file('files')];
    
    $aliasModel = $request->model;
    $userId = $request->user()->id;
    
    $uploadedFiles = array_map(function ($file) use ($aliasModel, $userId) {
      
      $path = $file->store($this->uploadDir .'/'. $userId);
      
      return [
        'path' => $path, 
        'filename' => basename($path),
        'is_img' => str_contains($file->getClientMimeType(), 'image'),
        'size' => $file->getSize(),
      ];
    }, $files);
    
    return $uploadedFiles;
  }
}