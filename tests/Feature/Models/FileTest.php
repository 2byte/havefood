<?php

use App\Models\GoodsOption;
use App\Models\File;
use Illuminate\Support\Facades\DB;

test('Test 1', function () {
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
