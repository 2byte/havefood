<?php

namespace App\Shop\Goods\Enums;

enum GoodsOptionGroupType: string
{
    use HelperTrait;
    
    case Checkbox = 'checkbox';
    case Radio = 'radio';
    
    public static function nameForHumans()
    {
        $namesRu = [
            self::Checkbox->value => 'опциональный',
            self::Radio->value => 'вариативный',
        ];
        
        return static::valuesStringReplaced($namesRu);
    }
}