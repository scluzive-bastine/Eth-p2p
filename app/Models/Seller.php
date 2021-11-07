<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'price',
        'coin',
        'currency',
        'balance',
        'min'
    ];

    public function hasRequest()
    {
        return Trade::where([
            ['seller', $this->id],
        ])->exists();
    }

    public function newRequest()
    {
        return Trade::where([
            ['seller', $this->id],
            ['status', 0]
        ])->count();
    }

    public function completedRequest()
    {
        return Trade::where([
            ['seller', $this->id],
            ['status', '>' , 1]
        ])->count();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
