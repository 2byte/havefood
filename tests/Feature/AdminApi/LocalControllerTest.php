<?php

test('LocalController getSamplesImages()', function () {
    $response = $this->getJson('/api/local/get-samples-images');
    
    $response->dump();
    
    $response->assertStatus(200);
});
