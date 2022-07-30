<?php

namespace App\Shop\V1\Goods;

use App\Models\User;
use App\Models\GoodsOption;
use Illuminate\Support\Facades\Validator;

class GoodsOptionGroup
{
    private $model;
    
    function __construct(
        GoodsOption|int $modelOrId
    )
    {
        if (is_numeric($modelOrId)) {
            $this->model = GoodsOption::findOrFail($model);
        } elseif ($modelOrId instanceof GoodsOption) {
            $this->model = $modelOrId;
        } else {
            throw new \Exception('class GoodsOptionGroup argument should be type of numeric or instance of GoodsOption model');
        }
    }
    
    public function addOption()
    {
        
    }
    
    public function getModel()
    {
        return $this->model;
    }
}