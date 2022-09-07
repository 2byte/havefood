<?php

namespace App\Console\Commands\DevUtils;

use Illuminate\Console\Command;
use App\Models\Goods;
use App\Models\GoodsOption;

class DevTestGoodsOptionAttach extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'devtest:option-attach {--goods-id=} {--count-options=2}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Attaching options to goods';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      $goodsId = $this->option('goods-id');
      
      GoodsOption::take($this->option('count-options'))
        ->each(fn ($option) => 
          Goods::find($goodsId)->attachOption($option->id, $option->user_id)
      );
      
      $this->info('OK');
      
      return 0;
    }
}
