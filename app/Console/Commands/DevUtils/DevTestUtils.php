<?php

namespace App\Console\Commands\DevUtils;

use Illuminate\Console\Command;

class DevTestUtils extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'devtest';

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
        return 0;
    }
}
