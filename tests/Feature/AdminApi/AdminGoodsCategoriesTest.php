<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

// Uses the given trait in the current file
uses(RefreshDatabase::class);

test('get all', function () {
    $user = seedsForGoods();
    
    $user->update(['role' =>  'boss']);
    
    $this->actingAs($user);
    
    $response = $this->get('/api/gov/categories');
    
    $response->assertStatus(200);
});
