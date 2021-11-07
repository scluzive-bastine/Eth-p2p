<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'coin',
        'currency',
        'amount',
        'balance',
        'price',
        'address'
    ];

    public function hasRequest()
    {
        return Trade::where([
            ['buyer', $this->id],
        ])->exists();
    }

    public function newRequest()
    {
        return Trade::where([
            ['buyer', $this->id],
            ['status', 0]
        ])->count();
    }

    public function completedRequest()
    {
        return Trade::where([
            ['buyer', $this->id],
            ['status', '>' , 1]
        ])->count();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
