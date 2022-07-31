<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Models\GoodsOption;
use App\Shop\Goods\Enums\{
    GoodsType,
    GoodsOptionPriceType,
    GoodsOptionGroupType
};

class GoodsOptionSeeder extends Seeder
{
    public const TEST_OPTIONS = [
        [
            'user_id' => 1,
            'name' => 'Лук',
            'description' => 'С луком',
            'goods_type' => GoodsType::Common,
            'price' => 100,
            'price_type' => GoodsOptionPriceType::Single
        ],
        [
            'user_id' => 1,
            'name' => 'Сыр',
            'description' => 'С сыром',
            'goods_type' => GoodsType::Common,
            'price' => 100,
            'price_type' => GoodsOptionPriceType::Single
        ],
        [
            'user_id' => 1,
            'name' => 'Чиснок',
            'description' => 'С чисноком',
            'goods_type' => GoodsType::Common,
            'price' => 100,
            'price_type' => GoodsOptionPriceType::Single
        ],
    ];
    
    public const TEST_OPTIONS_GROUPS = [
        [
            /**
             * Group a goods
             **/
            [
                'user_id' => 1,
                'name' => 'Размер',
                'description' => 'Размер товара',
                'goods_type' => GoodsType::Common,
                'price' => 150,
                'price_type' => GoodsOptionPriceType::Goods,
                'group' => 1,
                'group_type' => GoodsOptionGroupType::Radio
            ],
            /**
             * It options of group
             **/
            [
                'user_id' => 1,
                'name' => 'Маленький',
                'description' => 'Это маленький размер товара',
                'goods_type' => GoodsType::Common,
                'price' => 150,
                'price_type' => GoodsOptionPriceType::Goods,
            ],
            [
                'user_id' => 1,
                'name' => 'Средний',
                'description' => 'Это средний размер товара',
                'goods_type' => GoodsType::Common,
                'price' => 150,
                'price_type' => GoodsOptionPriceType::Goods,
            ],
            [
                'user_id' => 1,
                'name' => 'Большой',
                'description' => 'Это большой размер товара',
                'goods_type' => GoodsType::Common,
                'price' => 150,
                'price_type' => GoodsOptionPriceType::Goods,
            ],
        ]
    ];
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        GoodsOption::factory()
            ->count(count(self::TEST_OPTIONS))
            /*->state(new Sequence(
                fn ($sequence) => self::TEST_OPTIONS[$sequence->index]
            ))*/
            ->create();
        
        foreach (self::TEST_OPTIONS_GROUPS as $index => $item) {
            $optionParentId = $index == 0 
            ? GoodsOption::factory()->create()->id
            : null;
            
            if ($index > 0) {
                GoodsOption::factory()->create(['parent_id' => $optionParentId]);
            }
        }
    }
}
