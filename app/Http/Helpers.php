<?php
use App\Models\User;
use App\Models\Crypto;
use Elliptic\EC;
use kornrunner\Keccak;

function tableNumber( int $total ) : int
{
    if( request()->page && request()->page != 1 )
        return ( request()->page*$total ) - $total + 1;
    return 1;
}

/**
* Generate Email Verification token
*
* @return String
*/
function generateNounce()
{
    $token = bin2hex(openssl_random_pseudo_bytes(11));
    $exists = User::where('nounce', $token)->exists();
    if($exists)
        return generateNounce();
    return $token;
}

function pubKeyToAddress($pubkey)
{
    return "0x" . substr(Keccak::hash(substr(hex2bin($pubkey->encode("hex")), 1), 256), 24);
}

function verifySignature($message, $signature, $address)
{
    $msglen = strlen($message);
    $hash   = Keccak::hash("\x19Ethereum Signed Message:\n{$msglen}{$message}", 256);
    $sign   = ["r" => substr($signature, 2, 64),
               "s" => substr($signature, 66, 64)];

    $recid  = ord(hex2bin(substr($signature, 130, 2))) - 27;

    if ($recid != ($recid & 1))
        return false;

    $ec = new EC('secp256k1');
    $pubkey = $ec->recoverPubKey($hash, $sign, $recid);

    return strtolower($address) == pubKeyToAddress($pubkey);
}

function cryptoExists($symbol)
{
    return Crypto::where('symbol', $symbol)->exists();
}

function currencyExists($symbol): bool
{
    $lists = config('currencies');
    if( isset($lists[$symbol])  )
        return true;

    return false;
}

function convertToFiat($coin, $qt, $fiatPrice)
{
    $coin = Crypto::where('symbol', $coin)->first();
    return $coin->price * $qt * $fiatPrice;
}
