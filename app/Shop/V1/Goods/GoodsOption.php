<?php

namespace App\Shop\V1\Goods;

use App\Models\GoodsOption as GoodsOptionModel;
use App\Models\User;
use Illuminate\Http\Request;

class GoodsOption 
{
    
    protected $model;
    
    function __construct(
        GoodsOptionModel|int $modelOrId
    )
    {
        if (is_numeric($modelOrId)) {
            $this->model = GoodsOptionModel::findOrFail($modelOrId);
        } elseif ($modelOrId instanceof GoodsOptionModel) {
            $this->model = $modelOrId;
        } else {
            throw new \Exception('class App\Shop\V1\Goods\GoodsOption argument should be type of numeric or instance of GoodsOption model');
        }
    }
    
    public function getModel()
    {
        return $this->model;
    }
}