<?php

namespace App\Shop\V1\Goods;

use App\Models\Goods;
use App\Models\GoodsOption;

class GoodsManager
{
    function __construct(
        protected ?Goods $model
    )
    {
        if (is_numeric($model)) {
            $this->model = Goods::findOrFail($model);
        } elseif ($model instanceof Goods) {
            $this->model = $model;
        } else {
            throw new \Exception('class App\Shop\V1\Goods\GoodsManager argument should be type of numeric of key a goods or instance of Goods model');
        }
    }

}