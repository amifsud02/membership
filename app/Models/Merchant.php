<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $fillable = [
        'name',
        'description',
        'email',
        'phone',
        'logo',
        'organisation_id',
        'status',
    ];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }
}
