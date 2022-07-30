<?php

namespace App\Shop\Goods\Enums;

trait HelperTrait
{
    public static function values($middleware = null)
    {
        $values = array_column(self::cases(), 'value');
        
        if (is_callable($middleware)) {
            return $middleware($values);
        }
        
        return $values;
    }
    
    public static function enumStringValues(): string
    {
        return implode(',', static::values());
    }
    
    public static function valuesStringReplaced($repValues): string
    {
        return static::values(function ($values) use($repValues) {
            return strtr(implode(',', $values), $repValues);
        });
    }
}