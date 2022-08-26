<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile; 
use Illuminate\Support\Facades\Storage; 
use App\Models\Goods;

uses(RefreshDatabase::class);

test('Api upload single', function () {
  $user = seedsForGoods();
  $user->update(['role' => 'boss']);

  $this->actingAs($user);
  
  Storage::fake('images'); 
  $file = UploadedFile::fake()->image('image.jpg')->size(100); 

  $response = $this->postJson('/api/gov/file/upload', [
    //'files' => [$file],
    'model' => Goods::MORPH
  ]);
  
  //$response->dump();
  $response->assertStatus(422);

  $response = $this->postJson('/api/gov/file/upload', [
    'files' => $file,
    'model' => Goods::MORPH
  ]);
  
  //$response->dump();
  
  $response->assertStatus(200);
  
  expect(file_exists(storage_path('app/'. $response['data'][0]['path'])))->toBeTrue();
  
  foreach ($response['data'] as $filedata) {
    unlink(storage_path('app/'. $filedata['path']));
  }
  
});

test('Api upload multiple', function () {
  $user = seedsForGoods();
  $user->update(['role' => 'boss']);

  $this->actingAs($user);
  
  Storage::fake('images'); 
  $file = UploadedFile::fake()->image('image.jpg')->size(100); 

  // multiple
  $response = $this->postJson('/api/gov/file/upload', [
    'files' => [$file, $file],
    'model' => Goods::MORPH
  ]);
  
  //$response->dump();
  
  $response->assertStatus(200);
  
  expect($response['data'])->toHaveCount(2);
  expect(file_exists(storage_path('app/'. $response['data'][0]['path'])))->toBeTrue();
  expect($response['data'][0]['is_img'])->toBeTrue();
  expect($response['data'][0]['size'])->toBe(100 * 1024);
  expect($response['data'][0]['id'])->toBeGreaterThan(0);
  
  foreach ($response['data'] as $filedata) {
    $pathfile = storage_path('app/'. $filedata['path']);
    
    if (file_exists($pathfile)) {
      unlink(storage_path('app/'. $filedata['path']));
    }
  }
});