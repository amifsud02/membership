<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    protected $fillable = [
        'name',
        'description',
        'email',
        'phone',
        'logo',
        'status',
        'transaction_fee',
    ];

    public function merchants()
    {
        return $this->hasMany(Merchant::class);
    }

    public function membershipPlans()
    {
        return $this->hasMany(MembershipPlan::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
