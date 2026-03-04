<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipPlan extends Model
{
    protected $fillable = [
        'name',
        'tier',
        'price',
        'benefits_text',
        'branding_logo',
        'branding_colors',
        'organisation_id',
    ];

    protected $casts = [
        'branding_colors' => 'array',
    ];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
