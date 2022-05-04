<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Currency extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [];
        $data[] = [
            'name' => 'Terra',
            'symbol' => 'luna',
            'coingecko_id' => 'terra-luna',
        ];
        $data[] = [
            'name' => 'Cosmos Hub',
            'symbol' => 'atom',
            'coingecko_id' => 'cosmos',
        ];
        $data[] = [
            'name' => 'Ethereum',
            'symbol' => 'eth',
            'coingecko_id' => 'ethereum',
        ];
        $data[] = [
            'name' => 'Dacxi',
            'symbol' => 'dacxi',
            'coingecko_id' => 'dacxi',
        ];
        $data[] = [
            'name' => 'Bitcoin',
            'symbol' => 'btc',
            'coingecko_id' => 'bitcoin',
        ];

        foreach ($data as $item){
            DB::table('currencies')->insert($item);
        }

    }
}
