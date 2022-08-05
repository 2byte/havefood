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

    public static function nameForHumans() {
      $namesRu = [];
      $namesRu = [
        self::Common => 'общий',
        self::Pizza => 'пицца',
      ];

      return static::valuesStringReplaced($namesRu);
    }

    public static function valuesToRu() {
      $names = [
        'common' => 'Общий',
        'pizza' => 'Пицца',
        'halfpizza' => 'половинка пиццы',
        'burger' => 'Бургер',
        'drink' => 'Напиток',
        'pie' => 'Пирог',
      ];

      return array_map(function ($value) use ($names) {
        return [$value => $names[$value]];
      },
        array_column(self::cases(), 'value')
      );
    }
}