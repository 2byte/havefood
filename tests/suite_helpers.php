<?php

use App\Shop\DevTestUtils\DevTestUtilsFileUploads;
use Illuminate\Http\UploadedFile;
use App\Models\GoodsOption;
use Illuminate\Database\Eloquent\Factories\Sequence;

function makeBoss($user, $test, $login = true) {
  $user->update(['role' => 'boss']);

  $test->actingAs($user);

  return $user;
}

function makeUploads($test, $model, $count = 3) {
  $mockUploder = DevTestUtilsFileUploads::make();

  $mockUploder->clearFileUploads();

  [$fileModels,
    $dataFromApi] = $mockUploder->createUploads(
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

function makeGoodsOptions($countOptions = 2, $countGroups = 2, $countOptionGroups = 2) {
  $groups = GoodsOption::factory($countGroups)->group()->create();

  $groups->each(function ($option) use ($countOptionGroups) {
    GoodsOption::factory($countOptionGroups)
    ->state(new Sequence(function ($sequence) use ($countOptionGroups) {
      return ['sortpos' => ($sequence->index + $countOptionGroups) - 1];
    }))
    ->create([
      'parent_id' => $option->id
    ]);
  });

  $options = [
    ...GoodsOption::factory($countOptions)->create(),
    ...$groups
  ];

  return collect($options);
}