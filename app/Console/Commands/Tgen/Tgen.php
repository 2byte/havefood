<?php

namespace App\Console\Commands\Tgen;

use Illuminate\Console\Command;

class Tgen extends Command
{
  /**
  * The name and signature of the console command.
  *
  * @var string
  */
  protected $signature = 'tgen:make {name?}';

  /**
  * The console command description.
  *
  * @var string
  */
  protected $description = 'Generator templates';

  public $vueComponents = [
    'admin.component' => [
      'Common.vue'
    ],
    'admin.store' => [
      'commonStore.js'
    ]
  ];

  public $templates = [
    'admin.component' => [
      'scripts/admin/components',
      'scripts/admin/Goods'
    ],
    'admin.store' => [
      'scripts/admin/stores'
    ]
  ];

  public $pathTemplates = null;

  function __construct()
  {
    parent::__construct();
    
    $this->pathTemplates = resource_path('scripts/Templates');
  }
  
  /**
  * Execute the console command.
  *
  * @return int
  */
  public function handle() {

    if (is_null($this->argument('name'))) {
      $this->interactiveMode();
    }

    return 0;
  }

  public function interactiveMode() {
    $item = $this->choice('Do what create?', array_keys($this->templates), 0);
    
    $destination = $this->choice('Please do select a directory: ', $this->templates[$item], 0);

    $templateName = $this->choice('Select the template a component', $this->vueComponents[$item], 0);
    $name = $this->ask('Type a name (CompName.vue|js)');
    
    $checkCopy = copy($this->pathTemplates .'/'. $templateName, resource_path($destination) .'/'. $name);

    if ($checkCopy) {
      $this->info('Component is created');
    } else {
      $this->error('Error creating component');
    }
  }
}