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
        Schema::create('goods_ref_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('goods_id')
                ->constrained('goods')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
                
            $table->unsignedInteger('option_id');
            $table->foreign('option_id')
                ->references('id')
                ->on('goods_options')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
                
            $table->unsignedBigInteger('own_user_id');
            $table->unsignedBigInteger('set_user_id');
            $table->unsignedInteger('sortpos')->default(0);
            $table->enum('goods_type', GoodsType::values())->default(GoodsType::Common->value);
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
        Schema::dropIfExists('goods_ref_options');
    }
};
