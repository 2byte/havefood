<?php

namespace App\Shop\Goods\Enums;

enum GoodsType: string
{
    use HelperTrait;
    
    /**
     * It is the common goods
     * */
    case Common = 'common';
    /**
     * Pizza
     **/
    case Pizza = 'pizza';
    /**
     * Half a pizza 
     **/
    case Halfpizza = 'halfpizza';
    /**
     * The burger 
     **/
    case Burger = 'burger';
    /**
     * The drink
     **/
    case Drink = 'drink';
    /**
     * The pie
     **/
    case Pie = 'pie';
    
    public static function nameForHumans()
    {
        $namesRu = [];
        /*$namesRu = [
            self::Common->value => 'общий',
            self::Pizza->value => 'пицца',
        ];*/
        
        return static::valuesStringReplaced($namesRu);
    }
}