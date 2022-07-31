<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Shop\Goods\Enums\{
    GoodsType,
    GoodsOptionPriceType
};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GoodsOption>
 */
class GoodsOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'user_id' => \App\Models\User::first()->id,
            'name' => 'Лук',
            'description' => 'С луком',
            'goods_type' => GoodsType::Common,
            'price' => 100,
            'price_type' => GoodsOptionPriceType::Single
        ];
    }
    
    public function group()
    {
        return $this->state(function (array $attributes) {
            return [
                'group' => 1,
                'price' => 0,
            ];
        });
    }
}
