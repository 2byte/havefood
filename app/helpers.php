<?php

function parsePhone($raw) {
    if (str_starts_with($raw, '+')) $raw = substr($raw, 1);
    if (!str_starts_with($raw, '7')) $raw = '7'. $raw;
    if (is_numeric($raw)) return $raw;
    return false;
}

function responseApi(mixed $payload = null) {
    return new class($payload) {
        
        public $responseData = [
            'success' => false,
            'error' => true,
            'data' => []
        ];
        
        function __construct($payload)
        {
            if (
              $payload instanceof Illuminate\Database\Eloquent\Model
              ||
              $payload instanceof \Illuminate\Database\Eloquent\Collection
            ) {
              $payload = $payload->toArray();
            }
            
            $this->responseData['data'] = $payload;
        }
        
        public function success($data = []) {
            $this->responseData['success'] = true;
            $this->responseData['error'] = false;
            
            $this->setData($data);
            
            return $this->makeResponse($this->responseData);
        }
        
        public function error($data = []) {
            $this->responseData['success'] = false;
            $this->responseData['error'] = true;
            
            $this->setData($data);
            
            return $this->makeResponse($this->responseData);
        }
        
        public function setData($data)
        {
            if (!empty($data)) {
                if ($data instanceof \Illuminate\Database\Eloquent\Collection) {
                    $data = $data->toArray();
                }
                $this->responseData['data'] = $data;
            }
        }
        
        public function errorMessage($message) 
        {
          $this->responseData['error'] = true;
          $this->responseData['success'] = false;
          $this->responseData['data']['message'] = $message;
          
          return $this->makeResponse($this->responseData);
        }
        
        public function makeResponse($data)
        {
            return response()->json($data);
        }
    };
}

function queryLogEnabled() {
  return Illuminate\Support\Facades\DB::enableQueryLog();
}

function queryLogDump($exit = false) {
  if (!$exit) {
    dump(Illuminate\Support\Facades\DB::getQueryLog());
  }
}

/**
 * Get file with all previews base on morphed model $uploadImageResizeSizes
 * 
 * @param $listAll = true - return [
 *   'path string',
 *   'path string',
 *   ...
 * ]
 * 
 * @return [
 *   'original' => 'path string',
 *   'previews' => [
 *     300 => 'path string',
 *     600 => 'path string',
 *   ]
 * ]
 **/
function getPathFilesByModel(App\Models\BaseModel $file, array|bool $withPreviews = true, $listAll = false) {
  $parentModel = $file->relate;
  
  if (is_null($parentModel)) {
    $parentModel = Illuminate\Database\Eloquent\Relations\Relation::getMorphedModel($file->relate_type)::getModel();
  }
  
  $makePath = function ($file, $sizeX = 0, $sizeY = 0) use ($parentModel) {
    $filename = $file->filename;
    
    if ($sizeX && $sizeY) {
      [$name, $ext] = explode('.', $filename);
      $filename = $name .'_'. $sizeX .'x'. $sizeY .'.'. $ext;
    }
    
    return $parentModel->uploadDir .'/'. $file->user_id .'/'. $filename;
  };
  
  $makePathsBySizes = function ($file, $sizes) use ($makePath) {
    return array_map(function ($item) use ($file, $makePath) {
      [$sizeX, $sizeY] = $item;
      
      return [$sizeX => $makePath($file, sizeX: $sizeX, sizeY: $sizeY)];
    }, $sizes);
  };
  
  $returnData = [
    'original' => $makePath($file)
  ];
  
  if ($withPreviews === true) {
    $returnData['previews'] = $makePathsBySizes($file, $parentModel->uploadImageResizeSizes);
  } elseif (is_array($withPreviews) && !empty($withPreviews)) {
    
  }
  
  if ($listAll) {
    $returnData = [
      $returnData['original'],
      ...array_values($returnData['previews'])
    ];
  }
  
  return $returnData;
}