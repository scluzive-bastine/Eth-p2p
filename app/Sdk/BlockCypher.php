<?php
namespace App\Sdk;

use Illuminate\Support\Facades\Http;

class BlockCypher
{
    public function __construct()
    {

    }

    public static function generateAddress($coin)
    {
        $response = Http::post("https://api.blockcypher.com/v1/$coin/main/addrs");
        return $response->json();
    }


}
