<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FirstTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:first-test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        for ($i=0; $i <= 100; $i++) {
            if ($i %= 3) {
                echo "Mari";
            } else if ($i %= 5) {
                echo "Berkarya";
            } else if ($i %= 5) {
                echo "Mari Berkarya";
            } else {
                echo $i;
            }
        }
    }
}
