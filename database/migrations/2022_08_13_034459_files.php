<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Shop\Enums\FiletypeEnum;

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
            $table->string('relate_type', 255)->nullable();
            $table->string('filename', 255)->nullable();
            $table->enum('type', FiletypeEnum::values())->default(FiletypeEnum::File->value);
            $table->unsignedInteger('filesize')->default(0);
            $table->smallInteger('sortpos')->default(0);
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
