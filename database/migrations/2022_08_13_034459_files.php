<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            
            $table->id();
            $table->foreignId('user_id')
              ->nullable()
              ->constrained()
              ->onUpdateCascade()
              ->nullOnDelete();
              
            $table->bigInteger('relate_id')->default(0);
            $table->string('relate_type', 191)->nullable();
            $table->string('type', 255);
            $table->string('sizes_img', 255);
            $table->unsignedInteger('size')->default(0);
            $table->timestamps();
            
            $table->index(['id', 'relate_id', 'relate_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
};
