<?php

namespace App\Shop\DevTestUtils;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\Finder\Finder; 

class DevTestUtilsFileUploads 
{
  public function makeFileUploads() 
  {
    
  }
  
  public function clearFileUploads()
  {
    Storage::deleteDirectory('static/uploads');
  }
  
}