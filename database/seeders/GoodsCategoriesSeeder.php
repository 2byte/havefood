<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GoodsCategory;
use App\Models\User;
use App\Shop\Goods\Enums\GoodsType;
use Illuminate\Database\Eloquent\Factories\Sequence;

class GoodsCategoriesSeeder extends Seeder
{
    public const TEST_CATEGORIES = [
        [
            'name' => 'Пицца',
            'goods_type' => GoodsType::Pizza
        ],
        [
            'name' => 'Бургер',
            'goods_type' => GoodsType::Burger
        ],
        [
            'name' => 'Суши',
            'goods_type' => GoodsType::Common
        ],
        [
            'name' => 'Салаты',
            'goods_type' => GoodsType::Common
        ],
        [
            'name' => 'Роллы',
            'goods_type' => GoodsType::Common
        ],
        [
            'name' => 'Соусы',
            'goods_type' => GoodsType::Common
        ],
        [
            'name' => 'Напитки',
            'goods_type' => GoodsType::Drink
        ],
        [
            'name' => 'Крабы',
            'goods_type' => GoodsType::KamchatkaCrab
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->addCategories();
    }

    public function addCategories()
    {
        $userId = User::first()->id;

        GoodsCategory::factory()
            ->count(count(self::TEST_CATEGORIES))
            ->state(new Sequence(
                fn ($sequence) => [
                    'user_id' => $userId,
                    'name' => self::TEST_CATEGORIES[$sequence->index]['name'],
                    'goods_type' => self::TEST_CATEGORIES[$sequence->index]['goods_type'],
                    'sortpos' => $sequence->index
                ]
            ))->create();
    }
}
