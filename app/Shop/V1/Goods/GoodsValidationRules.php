<?php

namespace App\Shop\V1\Goods;

use App\Models\GoodsOption;
use App\Shop\Goods\Enums\GoodsType;

class GoodsValidationRules
{
  protected array $rules = [];
  protected array $rulesMessages = [];
  protected array $attributes = [
    'name' => 'имя товара',
    'description' => 'описание товара',
    'price' => 'цена товара',
    'goods_type' => 'тип товара',
    'hidden' => 'скрыт',
  ];

  function __construct() {
    $this->setDefaultRules();
  }

  public function setDefaultRules() {
    $this->rules = [
      'category_id' => 'required|exists:goods_categories,id',
      'name' => 'required|min:3|max:500',
      'description' => 'nullable|min:3|max:6000',
      'price' => 'numeric',
      'sticker' => 'nullable|:100',
      'goods_type' => 'required|in:'. GoodsType::enumStringValues(),
      'hidden' => 'boolean'
    ];

    $this->rulesMessages = [
      'category_id.exists' => 'Не выбрана категория товара'
    ];
  }

  public function getRulesStore() {
    return [
      $this->rules,
      $this->rulesMessages,
      $this->attributes
    ];
  }
  
  public function getFields() {
    return array_keys($this->rules);
  }
}