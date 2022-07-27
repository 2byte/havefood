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
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onUpdateCascade()
                ->nullOnDelete();
                
            $table->unsignedInteger('category_id');
            $table->string('name', 255);
            $table->string('description', 6000);
            $table->decimal('price')->default(0);
            $table->string('sticker')->nullable();
            $table->integer('count_photos')->default(0);
            $table->enum('goods_type', GoodsType::names());
            $table->boolean('hidden')->default(0);
            $table->timestamps();
            
            $table->foreign('category_id')
                ->references('id')
                ->on('goods_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                
            $table->index('user_id');
            $table->index(['user_id', 'category_id']);
            $table->index(['category_id', 'price']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
};
