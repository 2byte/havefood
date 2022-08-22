<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile; 
use Illuminate\Support\Facades\Storage; 
use App\Models\Goods;

uses(RefreshDatabase::class);

test('Api upload', function () {
  $user = seedsForGoods();
  $user->update(['role' => 'boss']);

  $this->actingAs($user);
  
  Storage::fake('images'); 
  $file = UploadedFile::fake()->image('image.jpg'); 

  $response = $this->postJson('/api/gov/file/upload', [
    //'files' => [$file],
    'model' => Goods::MORPH
  ]);
  
  //$response->dump();
  $response->assertStatus(422);

  $response = $this->post('/api/gov/file/upload', [
    'files' => $file,
    'model' => Goods::MORPH
  ]);
  
  $response->dump();
  $response->assertStatus(200);
  //Storage::disk('images')->assertExists($file->hashName());
});