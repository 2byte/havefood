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
  $user = seedsForGoods();
  $user->update(['role' => 'boss']);
  
  $this->actingAs($user);
  
  $mockUploder = DevTestUtilsFileUploads::make();
  
  $mockUploder->clearFileUploads();
  
  $goods = Goods::first();
  
  [$fileModels, $dataFromApi] = $mockUploder->createUploads(
    test: $this, 
    count: 3,
    model: $goods
  );
  
  $dataImagePreviews = $goods->getImagePreviews();
  //dump($dataImagePreviews);
  expect($dataImagePreviews)->toHaveCount(3);
  
  //dump($dataImagePreviews);
  /*foreach ($dataImagePreviews as $data) {
    
  }*/
  
});