<?php

test('preg replace', function () {
    $testPath = 'qqqqqww11/qwww2222/11122.jpg';
    $testPathResult = 'qqqqqww11/qwww2222/11122_120x120.jpg';
    
    $result = preg_replace('/^(.+)(\..+)$/i', '$1_120x120$2', $testPath);

    $this->assertEquals($result, $testPathResult);
});
