<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id', 
        'address', 
        'public',
        'private', 
        'wif',
        'coin',
        'amt'
    ];
}
