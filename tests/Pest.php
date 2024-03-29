<?php

use Database\Seeders\GoodsCategoriesSeeder;
use Database\Seeders\GoodsOptionSeeder;
use Database\Seeders\GoodsSeeder;
use App\Models\User;
use Illuminate\Support\Arr;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

uses(Tests\TestCase::class)->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function seedsForGoods($except = ['goods']) {
    $user = User::factory()->create();
    
    $seedersList = [
        'categories' => GoodsCategoriesSeeder::class,
        'options' => GoodsOptionSeeder::class, 
        'goods' => GoodsSeeder::class
    ];
    
    if (!empty($except)) {
        if (is_string($except)) $except = [$except];
        $seedersList = Arr::except($seedersList, $except);
    }
    
    test()->seed(array_values($seedersList));
    
    return $user;
}

require __DIR__ .'/suite_helpers.php';