<?php

use App\Shop\DevTestUtils\DevTestUtilsFileUploads;
use Illuminate\Http\UploadedFile; 

function makeBoss($user, $test, $login = true) {
  $user->update(['role' => 'boss']);
  
  $test->actingAs($user);
  
  return $user;
}

function makeUploads($test, $model, $count = 3) {
  $mockUploder = DevTestUtilsFileUploads::make();
  
  $mockUploder->clearFileUploads();
  
  [$fileModels, $dataFromApi] = $mockUploder->createUploads(
    test: $test, 
    model: $model,
    count: $count,
  );
  
  return compact('fileModels', 'dataFromApi');
}

function makeFakeImage() {
  Storage::fake('images'); 
  $file = UploadedFile::fake()->image('image.jpg')->size(100);
  
  return $file;
}