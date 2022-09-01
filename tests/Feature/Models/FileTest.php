<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\GoodsOption;
use App\Models\File;
use App\Models\Goods;
use Illuminate\Support\Facades\DB;
use App\Shop\DevTestUtils\DevTestUtilsFileUploads;

uses(RefreshDatabase::class);

test('Model test polymorphic a relation of files', function () {
    $user = seedsForGoods();
    
    $files = File::factory(3)->make();
    //dump($user);
    $user->files()->saveMany($files);
    
    $newUser = $user->refresh();
    
    //dump($user->files);
    
    expect($user->files()->first()->getAttributes())->not->toBeEmpty();
    
    queryLogEnabled();
    
    $user->files()->first();
    
    queryLogDump();
    
    $user->latestFile;
    
    queryLogDump();
});

test('Model getting images for previews', function () {
  $user = seedsForGoods(except: []);
  $user->update(['role' => 'boss']);
  
  $this->actingAs($user);
  
  $mockUploder = DevTestUtilsFileUploads::make();
  
  $mockUploder->clearFileUploads();
  
  $goods = Goods::first();
  
  [$fileModels, $dataFromApi] = $mockUploder->createUploads(
    test: $this, 
    model: $goods,
    count: 3,
  );
  
  $dataImagePreviews = $goods->getImagePreviews();
  
  dump($dataImagePreviews);
  expect($dataImagePreviews)->toHaveCount(3);
  expect($dataImagePreviews[0])->toHaveKeys(['small', 'big', 'original']);
  
});

test('Model use loadPreviews and set attribute previews', function () {
  $user = seedsForGoods(except: []);
  
  makeBoss($user, $this);
  
  $goods = Goods::first();
  
  $dataUploads = makeUploads(test: $this, model: $goods, count: 3);
  
  $goods->loadPreviews();
  
  expect($goods->previews)->not->toBeNull();
  
});

test('Model use previews relation and set attribute previews', function () {
  $user = seedsForGoods(except: []);
  
  makeBoss($user, $this);
  
  $goods = Goods::first();
  
  $dataUploads = makeUploads(test: $this, model: $goods, count: 3);
  
  $goods->load('previews');
  
  expect($goods->previews)->not->toBeNull();
  
  $previewSizes = $goods->previewSizes;
  
  expect($previewSizes)->toHaveCount(count($goods->uploadImageResizeSizes) + 1);
  expect($previewSizes[0])->toHaveKeys(['small', 'big', 'original']);
});