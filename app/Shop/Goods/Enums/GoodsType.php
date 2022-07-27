<?php

namespace App\Shop\Goods\Enums;

enum GoodsType
{
    /**
     * It is the common goods
     * */
    case Common;
    /**
     * Pizza
     **/
    case Pizza;
    /**
     * Half a pizza 
     **/
    case Halfpizza;
    /**
     * The burger 
     **/
    case Burger;
    /**
     * The drink
     **/
    case Drink;
    /**
     * The pie
     **/
    case Pie;
    
    public static function names()
    {
        return array_map('strtolower', array_column(self::cases(), 'name'));
    }
}