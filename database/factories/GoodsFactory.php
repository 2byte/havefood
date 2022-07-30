<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\GoodsCategory;
use App\Shop\Goods\Enums\GoodsType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Goods>
 */
class GoodsFactory extends Factory
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
            'user_id' => User::first()->id,
            'category_id' => GoodsCategory::first()->id,
            'name' => 'Бургер',
            'description' => 'description',
            'price' => 100,
            'goods_type' => GoodsType::Burger
        ];
    }
}
