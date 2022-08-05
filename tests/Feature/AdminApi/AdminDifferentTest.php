<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

// Uses the given trait in the current file
uses(RefreshDatabase::class);

test('get goods types', function () {
    $user = seedsForGoods();
    
    $user->update(['role' =>  'boss']);
    
    $this->actingAs($user);
    
    $response = $this->get('/api/gov/different/get-goods-types');
    
    $response->assertStatus(200);
});
