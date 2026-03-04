<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Redemption extends Model
{
    protected $fillable = [
        'user_id',
        'discount_id',
        'merchant_id',
        'outlet_id',
        'organisation_id',
        'amount_discounted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}
