<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Shop\Goods\Enums\GoodsType;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onUpdateCascade()
                ->nullOnDelete();
            $table->string('name', 300);
            $table->integer('count_photos')->default(0);
            $table->integer('count_goods')->default(0);
            $table->smallInteger('sortpos')->default(0);
            $table->enum('goods_type', GoodsType::values())
                ->default(GoodsType::Common->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_categories');
    }
};
