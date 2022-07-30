<?php

namespace App\Shop\V1\Goods;

use App\Models\GoodsOption;
use App\Shop\Goods\Enums\GoodsType;
use App\Shop\Goods\Enums\GoodsOptionPriceType;
use App\Shop\Goods\Enums\GoodsOptionGroupType;
use Illuminate\Support\Arr;

class GoodsOptionValidationRules
{
    
    protected array $rules = [];
    protected array $rulesMessages = [];
    
    function __construct()
    {
        $this->setDefaultRules();
    }
    
    public function setDefaultRules(): void
    {
        $this->rules = [
            'user_id' => 'required:exists:users,id',
            'parent_id' => 'integer|exists:'. GoodsOption::getModel()->getTable() .',id',
            'group' => 'in:1,0',
            'group_variant' => 'required_if:group,1|in:'. GoodsOptionGroupType::enumStringValues(),
            'name' => 'required|min:3|max:255',
            'description' => 'min:3|max:5000',
            'note' => 'min:3|max:2000',
            'goods_type' => 'in:'. GoodsType::enumStringValues(),
            'price' => 'required|numeric',
            'price_type' => 'in:'. GoodsOptionPriceType::enumStringValues(),
            'sortpos' => 'integer',
            'default' => 'boolean',
            'hidden' => 'boolean',
        ];
        
        $this->rulesMessaages = [
            'group_variant.in' => 'Тип группы должен быть из вариантов '. GoodsOptionGroupType::enumStringValues(),
            'goods_type.in' => 'Неверный тип товара, возможные значения '. GoodsType::enumStringValues(),
            'parent_id.exists' => 'Группа не найдена',
            'group.required' => 'Нет атрибута group',
            'group.required_if' => 'Требуется указание типа группы group_variant, возможные значения'. GoodsOptionGroupType::enumStringValues()
        ];
    }
    
    /**
     * 
     * @return [[rules], [messages]]
     **/
    public function getRulesOptionGroup(): array
    {
        return [
            Arr::only($this->rules, [
                'user_id',
                'group',
                'group_variant',
                'name',
                'description',
                'note',
                'goods_type',
            ]),
            $this->rulesMessaages
        ];
    }
    
    public function getRulesOption()
    {
        return [
            Arr::only($this->rules, [
                'user_id',
                'parent_id',
                'name',
                'description',
                'note',
                'goods_type',
                'price',
                'price_type',
                'sortpos',
                'default',
                'hidden',
            ]),
            $this->rulesMessaages
        ];
    }
}