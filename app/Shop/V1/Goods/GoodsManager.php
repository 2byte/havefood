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
     /**
      * 
      * @return array(
      *     App\Models\GoodsOption => {
              [
                  "attributes",
                  "childs" => Collection
              ]
            }
      * )
      * */
    public function makeOptionGroups()
    {
        // load all options
        $stockOptions = $this->model->options;
        
        // load all a childs
        $stockOptions->each(function ($option) use ($stockOptions) {
            if ($option->group) {
               $childOptions = GoodsOption::whereParentId($option->id)
                    ->orderBy('sortpos', 'asc')
                    ->get()
                    ->whenEmpty(fn () => collect());
                $option->setAttribute('childs', $childOptions);
            }
        });
        
        $sortedOptionWithGroups = $stockOptions->sortBy(function ($option) {
            return $option->pivot->sortpos;
        });
        // up do the index from pivot
        $sortedOptionWithGroups->each(function ($option) {
            $option->setAttribute('sortpos', $option->pivot->sortpos);
        });
        
        return $sortedOptionWithGroups->values(); 
    }
}