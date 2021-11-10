<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenIssue extends Model
{
    use HasFactory;

    protected $fillable = [
        'trade_id', 'issuer', 'msg'
    ];
}
