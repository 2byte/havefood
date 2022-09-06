<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\GoodsOption;

uses(RefreshDatabase::class);

test('getting tree options', function () {
  $user = seedsForGoods(except: 'options');
  
  $options = makeGoodsOptions(countOptions: 2, countGroups: 2, countOptionGroups: 2);
  
  $options = GoodsOption::root()->whereUserId($user->id)->get();
  
  $optionTree = GoodsOption::makeOptionTree($options);
  
  $singleOptions = $optionTree->filter(fn ($option) => !$option->group);
  
  expect($singleOptions->count())->toEqual(2);
  
  $groupOptions = $optionTree->filter(fn ($option) => $option->group);
  
  expect($groupOptions->count())->toEqual(2);
  
  $groupOptions->each(fn ($group) => 
    expect($group->childs->count())->toEqual(2)
  );
});