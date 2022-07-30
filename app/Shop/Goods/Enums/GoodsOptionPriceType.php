<?php

namespace App\Shop\Goods\Enums;

enum GoodsOptionPriceType: string
{
    use HelperTrait;
    
    case Goods = 'goods';
    case Single = 'single';
}