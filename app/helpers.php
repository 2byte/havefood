<?php

function parsePhone($raw) {
    if (str_starts_with($raw, '+')) $raw = substr($raw, 1);
    if (!str_starts_with($raw, '7')) $raw = '7'. $raw;
    if (is_numeric($raw)) return $raw;
    return false;
}

function responseApi(array $payload = []) {
    return new class($payload) {
        
        public $responseData = [
            'success' => false,
            'error' => true,
            'data' => []
        ];
        
        function __construct(array $payload = [])
        {
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
        
        public function makeResponse($data)
        {
            return response()->json($data);
        }
    };
}