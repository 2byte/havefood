<?php

namespace App\Shop\DevTestUtils;

use App\Illuminate\Support\Facades\Storage;

class DevTestUtilsFileUploads 
{
  public function makeFileUploads() 
  {
    
  }
  
  public function clearFileUploads()
  {
    Storage::deleteDirectory('static/uploads');
  }
  
  public function getPathTestImages()
  {
    
  }
}