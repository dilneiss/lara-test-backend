<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FetchQuotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:quotes';

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
    public function handle()
    {

        \App\Jobs\FetchQuotes::dispatch();

        return 1;

    }
}
