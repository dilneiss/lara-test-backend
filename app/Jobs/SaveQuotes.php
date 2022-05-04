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

class SaveQuotes implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $coingeckoId;
    public float $price;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $quote, float $price)
    {
        $this->coingeckoId = $quote;
        $this->price = $price;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $currency = Currency::whereCoingeckoId($this->coingeckoId)->firstOrFail();

        $currency->Quotes()->create(['value' => $this->price]);

    }

}
