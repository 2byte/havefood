<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Shop\V1\Goods\GoodsOptionValidationRules;
use App\Shop\V1\Goods\GoodsValidationRules;

class ShopServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(GoodsOptionValidationRules::class, function ($app) {
            return new GoodsOptionValidationRules();
        });
        $this->app->singleton(GoodsValidationRules::class, function ($app) {
            return new GoodsValidationRules();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    
    public function provides()
    {
        return [
          GoodsOptionValidationRules::class,
          GoodsOValidationRules::class,
        ];
    }
}
