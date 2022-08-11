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
    protected array $rulesAttributes = [];
    
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
            'description' => 'nullable|min:3|max:5000',
            'note' => 'nullable|min:3|max:2000',
            'goods_type' => 'in:'. GoodsType::enumStringValues(),
            'price' => 'required|numeric',
            'price_type' => 'in:'. GoodsOptionPriceType::enumStringValues(),
            'sortpos' => 'integer',
            'default' => 'boolean',
            'hidden' => 'boolean',
        ];
        
        $this->rulesMessaages = [
            'name.required' => 'имя опции обязательно для заполнения',
            'group_variant.in' => 'Тип группы должен быть из вариантов '. GoodsOptionGroupType::enumStringValues(),
            'goods_type.in' => 'Неверный тип товара, возможные значения '. GoodsType::enumStringValues(),
            'parent_id.exists' => 'Группа не найдена',
            'group.required' => 'Нет атрибута group',
            'group.required_if' => 'Требуется указание типа группы group_variant, возможные значения'. GoodsOptionGroupType::enumStringValues()
        ];
        
        $this->rulesAttributes = [
          'name' => 'имя опции',
          'description' => 'описание опции',
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
            $this->rulesMessaages,
            $this->rulesAttributes
        ];
    }
    
    /**
     * 
     * @return [[rules], [messages]]
     **/
    public function getRulesForUpdateOptionGroup(): array
    {
        return [
            Arr::only($this->rules, [
                'group',
                'group_variant',
                'name',
                'description',
                'note',
                'goods_type',
            ]),
            $this->rulesMessaages,
            $this->rulesAttributes
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
            $this->rulesMessaages,
            $this->rulesAttributes
        ];
    }
    
    public function getRulesForUpdateOption()
    {
        return [
            Arr::only($this->rules, [
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
            $this->rulesMessaages,
            $this->rulesAttributes
        ];
    }
}