<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'membership_plan_id',
        'organisation_id',
        'amount',
        'transaction_fee',
        'stripe_session_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function membershipPlan()
    {
        return $this->belongsTo(MembershipPlan::class);
    }

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }
}
