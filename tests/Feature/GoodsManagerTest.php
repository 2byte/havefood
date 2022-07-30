<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Shop\V1\Goods\GoodsManager;
use App\Models\User;
use App\Models\GoodsCategory;
use Database\Seeders\GoodsCategoriesSeeder;

// Uses the given trait in the current file
uses(RefreshDatabase::class);

//$goodsManager = GoodsManager::make();

beforeEach(function () {
    //$this->seed(GoodsCategoriesSeeder::class);
});

//test('')

test('Adding a goods to categories with option', function () {
    $user = seedsForGoods();
    
    $attributes = [
        'user_id'     => $user->id,
        'category_id' => 1,
        'name' => ''
    ];
    
    GoodsManager::factory()->create($attributes);
    //GoodsManager::addOption()->;
    //GoodsManager::addGoods();
});
