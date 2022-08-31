<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile; 
use Illuminate\Support\Facades\Storage; 
use Illuminate\Testing\Fluent\AssertableJson;
use App\Models\Goods;
use App\Models\File;

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
  
  //$response->dump();
  
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

test('Api upload with attaching to model a entity', function () {
  $user = seedsForGoods(except: []);
  
  makeBoss($user, $this);
  
  $goods = Goods::first();
  
    // multiple
  $response = $this->postJson('/api/gov/file/upload', [
    'files' => [makeFakeImage(), makeFakeImage()],
    'model' => Goods::MORPH,
    'relate_id' => $goods->id
  ]);
  
  $response->assertStatus(200);
  
  $response->assertJson(fn (AssertableJson $json) =>
    $json->has('data.1', fn ($json) => 
      $json->where('sortpos', 2)->etc()
    )->etc()
  );
});

test('Api /api/gov/file/get getting files', function () {
  $user = seedsForGoods(except: []);
  
  makeBoss($user, $this);
  
  $goods = Goods::first();
  
  $dataUploads = makeUploads(test: $this, model: $goods);
  
  $response = $this->postJson('/api/gov/file/get', [
    'model' => $goods->getMorphClass(),
    'relate_id' => $goods->id
  ]);
  
  $response->assertStatus(200);
  
  //$response->dump();
  
  expect($response['data'])->toHaveCount(3);
});

test('Api /api/gov/file/get/previews getting previews', function () {
  $user = seedsForGoods(except: []);
  
  makeBoss($user, $this);
  
  $goods = Goods::first();
  
  $dataUploads = makeUploads(test: $this, model: $goods);
  
  $response = $this->postJson('/api/gov/file/get/previews', [
    'model' => $goods->getMorphClass(),
    'relate_id' => $goods->id
  ]);
  
  $response->assertStatus(200);
  
  //$response->dump();
  
  expect($response['data'])->toHaveCount(3);
});

test('Api /api/gov/file/delete', function () {
  $user = seedsForGoods(except: []);
  
  makeBoss($user, $this);
  
  $goods = Goods::first();
  
  $dataUploads = makeUploads(test: $this, model: $goods, count: 1);
  
  $response = $this->postJson('/api/gov/file/delete', [
    'id' => $dataUploads['fileModels'][0]->id
  ]);
  
  $response->dump();
  $response->assertStatus(200);
  
  expect($goods->refresh()->files)->toBeEmpty();
});

test('Model file make paths to all previews', function () {
  $user = seedsForGoods(except: []);
  
  makeBoss($user, $this);
  
  $goods = Goods::first();
  
  $dataUploads = makeUploads(test: $this, model: $goods, count: 1);
  
  $files = getPathFilesByModel(File::first());
  
  expect($files)->toHaveKeys(['original', 'previews']);
  expect($files['previews'])->toHaveCount(2);
});