<?php

namespace App\Jobs;

use App\Models\Currency;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class FetchQuotes implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $currencies = Currency::all()->pluck('coingecko_id')->toArray();
        $currenciesFetch = implode(',', $currencies);

        $response = Http::get("https://api.coingecko.com/api/v3/simple/price?ids=$currenciesFetch&vs_currencies=usd");

        if ($response->status() == 200){
            foreach ($response->object() as $coingeckoId => $object){
                SaveQuotes::dispatch($coingeckoId, $object->usd);
            }
        }

    }
}
