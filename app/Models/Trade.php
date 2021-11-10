<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer',
        'seller',
        'coin',
        'amount',
        'buyer_address',
        'bank_name',
        'bank_account_name',
        'bank_account_number',
        'price'
    ];

    public function theBuyer()
    {
        return $this->belongsTo(Buyer::class, 'buyer');
    }

    public function theSeller()
    {
        return $this->belongsTo(Seller::class, 'seller');
    }
}
