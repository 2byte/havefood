<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Shop\V1\Goods\GoodsOptionManager;
use App\Shop\V1\Goods\GoodsOptionGroup;
use App\Shop\Goods\Enums\GoodsType;
use App\Shop\Goods\Enums\GoodsOptionPriceType;
use App\Models\User;
use App\Models\Goods;
use App\Models\GoodsOption as GoodsOptionModel;
use App\Shop\V1\Goods\GoodsOption;
use Illuminate\Validation\ValidationException;

// Uses the given trait in the current file
uses(RefreshDatabase::class);

test('Creating a group for options', function () {
    $user = seedsForGoods();
    
    $group = GoodsOptionManager::createGroup(GoodsOptionModel::factory()->make([
        'name' => 'Размер',
        'description' => 'Выберите желаемый размер',
        'note' => 'Размер для пицц',
        'group_variant' => 'radio',
        'price' => 100,
        'price_type' => 'goods'
    ])->getAttributes(), User::find(1));
    
    expect($group)->toBeInstanceOf(GoodsOptionGroup::class);
    
    // checking auto sort a option of group
    GoodsOptionModel::factory(2)->make([
        'parent_id' => $group->getModel()->id
    ])->each(function ($option, $index) {
        $option = GoodsOptionManager::createOption($option->getAttributes());
        
        if ($index == 1) {
            $option->getModel()->refresh();
            
            expect($option->getModel()->sortpos)->toBe(1);
        }
    });
    
    expect(function () {
        GoodsOptionManager::createGroup([
            //'name' => 'Размер',
            'description' => 'Выберите желаемый размер',
            'note' => 'Размер для пицц',
            'group_variant' => 'radio',
            'price' => 100,
            'price_type' => 'goods'
        ]);
    })->toThrow(ValidationException::class);

});

test('Creating a option', function () {
    $user = seedsForGoods();
    
    $option = GoodsOptionManager::createOption(GoodsOptionModel::factory()->make([
        'name' => 'Супер соус',
        'description' => 'Супер соус от Алеши',
        'note' => 'Такой-то соус для админа',
        'price' => 50,
        'price_type' => GoodsOptionPriceType::Single
    ])->getAttributes(), User::find(1));
    
    expect($option)->toBeInstanceOf(GoodsOption::class);
    
});

test('Attach a option to goods',  function () {
    $user = seedsForGoods();
    
    $this->seed(\Database\Seeders\GoodsSeeder::class);
    
    $option = GoodsOptionModel::first();
    $goods = Goods::first();

    $goods->attachOption($option->id, $user->id);
    
    expect($goods->options->first()->id)->toBe($option->id);
    
    // checking sorting
    $option = GoodsOptionModel::factory()->create();
    
    $goods->attachOption($option->id, $user->id);
    $goods->refresh();
    
    expect($goods->options->last()->pivot->sortpos)->toBe(1);
})->only();

test('Find option', function () {
    $user = seedsForGoods();
    
});