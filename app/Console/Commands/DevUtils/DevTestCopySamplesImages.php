<?php

namespace App\Console\Commands\DevUtils;

use Illuminate\Console\Command;
use Symfony\Component\Finder\Finder;
use Storage;

class DevTestCopySamplesImages extends Command
{
  /**
  * The name and signature of the console command.
  *
  * @var string
  */
  protected $signature = 'devtest:copy-samples-images';

  /**
  * The console command description.
  *
  * @var string
  */
  protected $description = 'Just copying images';

  /**
  * Execute the console command.
  *
  * @return int
  */
  public function handle() {

    $finder = new Finder();
    
    $finder->files()
      ->in(env('PATH_SAMPLES_IMAGES'))
      ->name(['*.jpg', '*.jpeg', '*.png', '*.bmp']);

    $fileList = [];
    $i = 1;
    foreach ($finder as $k => $file) {
      $destinationPath = config('filesystems.disks.public.root') .'/samples-images/'. "$i.{$file->getExtension()}";
      
      if (!file_exists($pathdir = dirname($destinationPath))) {
        mkdir($pathdir);
      }
      
      copy($file->getRealPath(), $destinationPath);

      $fileList[] = $destinationPath;
      $i++;
    }

    $this->info('Copying is ok');
    $this->info(implode(PHP_EOL, $fileList));

    return 0;
  }
}