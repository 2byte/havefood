<?php

namespace App\Console\Commands\DevUtils;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Goods;
use App\Models\GoodsOption;
use App\Shop\Goods\Enums\GoodsType;

class DevTestUtils extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'devtest {--make-fake-option} {--sort}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Utilites for local development';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      if ($this->option('make-fake-option')) {
        $this->makeFakeOptions();
      }
      if ($this->option('sort')) {
        $this->sort();
      }
      
      return 0;
    }
    
    public function makeFakeOptions()
    {
      $goodsOptionManager = new \App\Shop\V1\Goods\GoodsOptionManager(GoodsOption::getModel());
      
      $user =  User::find(12);
      
      $group = $goodsOptionManager->createGroup([
        'name' => 'Новая опция',
        'description' => 'Описание некой группы',
        'user_id' => $user->id,
        'group_variant' => 'radio'
      ]);
      
      $attributes = [
        'name' => 'Лук',
        'parent_id' => $group->getModel()->id,
        'user_id' => $user->id,
        'price' => 100
      ];
     
      $suboption = $goodsOptionManager->createOption($attributes, $user);
      
      Goods::find(16)->attachOption($group->getModel()->id, $user->id);
      
      $attributes = [
        'name' => 'Чиснок',
        'parent_id' => $group->getModel()->id,
        'user_id' => $user->id,
        'price' => 100
      ];
     
      $suboption = $goodsOptionManager->createOption($attributes, $user);
      
      $this->info('OK');
    }
    
    public function sort()
    {
      $categories = \App\Models\GoodsCategory::all();
      
      foreach ($categories as $i => $cat) {
        $cat->update(['sortpos' => $i]);
      }
      
      $this->info('OK');
    }
}
