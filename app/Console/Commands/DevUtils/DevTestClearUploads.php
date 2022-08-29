<?php

namespace App\Console\Commands\DevUtils;

use Illuminate\Console\Command;
use App\Shop\DevTestUtils\DevTestUtilsFileUploads;

class DevTestClearUploads extends Command
{
  /**
  * The name and signature of the console command.
  *
  * @var string
  */
  protected $signature = 'devtest:clear-uploads';

  /**
  * The console command description.
  *
  * @var string
  */
  protected $description = 'Command description';

  /**
  * Execute the console command.
  *
  * @return int
  */
  public function handle(DevTestUtilsFileUploads $fileUploadUtils) {
    $fileUploadUtils->clearFileUploads();
    
    return 0;
  }
}