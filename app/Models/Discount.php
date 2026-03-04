<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'applied_globally',
        'organisation_id',
        'brand_id',
        'outlet_id',
        'merchant_id',
    ];

    protected $casts = [
        'applied_globally' => 'boolean',
    ];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
