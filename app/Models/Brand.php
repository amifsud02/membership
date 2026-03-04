<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'organisation_id',
        'merchant_id',
    ];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function outlets()
    {
        return $this->hasMany(Outlet::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }
}
