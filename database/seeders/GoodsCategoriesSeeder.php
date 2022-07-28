<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GoodsCategory;
use Illuminate\Database\Eloquent\Factories\Sequence; 

class GoodsCategoriesSeeder extends Seeder
{
    public const TEST_CATEGORIES = [
        'Пицца',
        'Бургер',
        'Суши',
        'Салаты',
        'Роллы',
        'Соусы',
        'Напитки'
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
        GoodsCategory::factory()
            ->count(count(self::TEST_CATEGORIES))
            ->state(new Sequence(
                fn ($sequence) => [
                    'name' => self::TEST_CATEGORIES[$sequence->index],
                    'sortpos' => $sequence->index
                ]
            ))->create();
    }
}
