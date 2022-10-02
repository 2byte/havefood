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
        Schema::create('goods_options', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->unsignedInteger('parent_id')
                ->nullable()
                ->constrained('goods_options')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
                
            $table->boolean('group')->default(0);
            $table->enum('group_variant', ['checkbox', 'radio'])->default('checkbox');
            $table->string('name', 255);
            $table->string('description', 5000)->nullable();
            $table->string('note', 2000)->nullable();
            $table->enum('goods_type', GoodsType::values())->default(GoodsType::Common->value);
            $table->decimal('price')->default(0);
            $table->enum('price_type', ['goods', 'single'])->default('single');
            $table->unsignedInteger('sortpos')->default(0);
            $table->unsignedInteger('count_photos')->default(0);
            $table->boolean('default')->default(0);
            $table->boolean('hidden')->default(0);
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
        Schema::dropIfExists('goods_options');
    }
};
