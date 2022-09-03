<?php

namespace App\Models\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Image;
use Storage;

trait UploadFileTrait {

  /**
   * 
   * @return [
   *   [
   *    'path' => '/path', 
   *    'path_destination' => '/path', 
        'filename' => 'filename.jpg',
        'is_img' => true,
        'size' => 123,
        ?'resized_images' => [
          [300] => '/path',
          [600] => '/path',
        ]
   *   ]
   * ]
   **/
  public function uploadFile(Request $request) {
  
    if (!$request->file('files')->isValid()) {
      throw ValidationException::withMessages([
        'files' => $request->files->all()['files']->getErrorMessage()
      ]);
    }
    
    $validationRules = ['required', 'file'];
    
    if (!empty($this->uploadAccessibleExtensions)) {
      $validationRules[] = 'mimes:'. implode(',', $this->uploadAccessibleExtensions);
    }
    if (!empty($this->uploadMaxFilesizeKb)) {
      $validationRules[] = 'between:20,'. $this->uploadMaxFilesizeKb;
    }
    
    // checking image sizes and ratio
    $ruleImageDimensions = Rule::dimensions()
      ->minWidth($this->uploadImageDimensions[0] ?? 0)
      ->minHeight($this->uploadImageDimensions[1] ?? 0);
    
    if (!is_null($this->uploadImageRatio)) {
      $ruleImageDimensions->ratio($this->uploadImageRatio);
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
      
      $isImage = str_contains($file->getClientMimeType(), 'image');
      
      $path = $file->store($this->uploadDir .'/'. $userId);
      $pathDestination = storage_path('app/'. $path);
      
      $returnData = [
        'path' => $path,
        'path_destination' => $path,
        'filename' => basename($path),
        'is_img' => $isImage,
        'size' => $file->getSize(),
      ];
      
      // Resizing images
      if (
        $isImage 
        && isset($this->uploadImageResizeSizes) 
        && is_array($this->uploadImageResizeSizes)
        && !empty($this->uploadImageResizeSizes)
        ) {
        foreach ($this->uploadImageResizeSizes as $sizes) {
          
          $im = Image::make($pathDestination);
          $im->resize($sizes[0], null, function ($constraint) { $constraint->aspectRatio(); });
          $pathResizedImage = preg_replace('/^(.+)(\..+)$/i', '$1_'. $sizes[0] .'x'. $sizes[1] .'$2', $pathDestination);
          $im->save($pathResizedImage);
          
          $returnData['resized_images'][$sizes[0]] = $pathResizedImage;
        }
      }
      
      return $returnData; 
    }, $files);
    
    return $uploadedFiles;
  }
}