<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('api user list', function () {
  $user = seedsForGoods(except: 'option');
  
  makeBoss($user, $this);
  
  $response = $this->postJson('/api/gov/user/list');
  
  $response->dump();
  $response->assertStatus(200);
});