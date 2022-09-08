<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Goods;
use App\Models\GoodsOption;

uses(RefreshDatabase::class);

test('api getting options source goodsId', function () {
  $user = seedsForGoods(except: 'option');
  
  makeBoss($user, $this);
  
  $options = makeGoodsOptions();
  
  $goods = Goods::first();
  
  $goods->attachOption($options[0]->id, $user->id);
  
  $response = $this->postJson('/api/gov/goods/option/get', [
    'source' => 'goodsId',
    'value' => $goods->id
  ]);
  
  //$response->dump();
  $response->assertStatus(200);
});

test('api getting options source optionId', function () {
  $user = seedsForGoods(except: 'option');
  
  makeBoss($user, $this);
  
  $options = makeGoodsOptions();
  
  $option = GoodsOption::whereGroup(1)->first();
  
  $response = $this->postJson('/api/gov/goods/option/get', [
    'source' => 'optionId',
    'value' => $option->id
  ]);
  
  //$response->dump();
  $response->assertStatus(200);
});

test('api getting options source presonal', function () {
  $user = seedsForGoods(except: 'option');
  
  makeBoss($user, $this);
  
  $options = makeGoodsOptions(countOptions: 1, countGroups: 0, countOptionGroups: 0);
  
  $options->first()->update(['user_id' => $user->id]);
  
  $response = $this->postJson('/api/gov/goods/option/get', [
    'source' => 'personal',
    'value' => $user->id
  ]);
  
  //$response->dump();
  $response->assertStatus(200);
  
  expect($response['data'])->not->toBeEmpty();
});

test('api getting options source all', function () {
  $user = seedsForGoods(except: 'option');
  
  makeBoss($user, $this);
  
  $options = makeGoodsOptions(countOptions: 1, countGroups: 0, countOptionGroups: 0);
  
  $response = $this->postJson('/api/gov/goods/option/get', [
    'source' => 'all'
  ]);
  
  //$response->dump();
  $response->assertStatus(200);
  
  expect($response['data'])->not->toBeEmpty();
});