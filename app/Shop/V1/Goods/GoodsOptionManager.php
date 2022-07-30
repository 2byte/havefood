<?php

namespace App\Shop\V1\Goods;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\GoodsOption as GoodsOptionModel;
use Illuminate\Support\Facades\Validator;

class GoodsOptionManager 
{
    function __construct(
        protected GoodsOptionModel $model
    )
    {
        
    }
    
    public static function validateOptionAttributes(array $attributes, array $rules = [], array $messages = [])
    {
        $validatedAttributes = Validator::make(
            $attributes,
            $rules,
            $messages
        )->validate();
        
        return $validatedAttributes;
    }
    
    public static function goodsOptionCreator(array $attributes): GoodsOptionModel
    {
        return GoodsOptionModel::create($attributes);
    }
    
    public static function createGroup(Request|array $attributes, ?User $user = null): GoodsOptionGroup
    {
        $attributes = is_array($attributes) 
                    ? $attributes 
                    : $attributes->all();
        
        $user = is_numeric($user)
                    ? User::findOrFail($user)
                    : $user;
                    
        if (!isset($attributes['user_id']) && !is_null($user)) {
            $attributes['user_id'] = $user->id;
        }
        if (!isset($attributes['group'])) {
            $attributes['group'] = 1;
        }
        
        return new GoodsOptionGroup(
            static::goodsOptionCreator(
                static::validateOptionAttributes(
                    $attributes, 
                    ...app(GoodsOptionValidationRules::class)->getRulesOptionGroup()
                )
            )
        );
    }
    
    public static function createOption(Request|array $attributes, ?User $user = null): GoodsOption
    {
        $attributes = is_array($attributes) 
                    ? $attributes 
                    : $attributes->all();
        
        $user = is_numeric($user)
                    ? User::findOrFail($user)
                    : $user;
        
        if (!isset($attributes['user_id']) && !is_null($user)) {
            $attributes['user_id'] = $user->id;
        }
        
        // auto sorting for option of group
        if (isset($attributes['parent_id']) && !isset($attributes['sortpos']) || $attributes['sortpos'] == 0) {
            $optionCount = GoodsOptionModel::whereId($attributes['parent_id'])->count();
            
            if ($optionCount > 0) {
                $attributes['sortpos'] = $optionCount;
            }
        }
        
        return new GoodsOption(
            static::goodsOptionCreator(
                static::validateOptionAttributes(
                    $attributes, 
                    ...app(GoodsOptionValidationRules::class)->getRulesOption()
                )
            )
        );
    }
    
    public function getModel()
    {
        return $this->model;
    }
    
    public static function find(int $id): GoodsOptionGroup
    {
        
    }
}