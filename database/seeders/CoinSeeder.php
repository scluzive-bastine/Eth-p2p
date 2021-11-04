<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Crypto;

class CoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cryptos = [
            ['name'=>"Bitcoin", 'symbol'=>"BTC"],
            ['name'=>"Ethereum", 'symbol'=>"ETH"],
            ['name'=>"Dash", 'symbol'=>'DASH'],
            ['name'=>"Dogecoin", 'symbol'=>'DOGE'],
            ['name'=>"Litecoin", 'symbol'=>'LTC'],
            ['name'=>"BNB-BSC", 'symbol'=>'BNB (bsc)'],
            ['name'=>"binance", 'symbol'=>'BNB']
        ];

        for($i = 0; $i < count($cryptos); $i++){
            Crypto::create([
                'name'=>$cryptos[$i]['name'],
                'symbol'=>$cryptos[$i]['symbol'],
                'fee'=>2.2
            ]);
        }
    }
}
