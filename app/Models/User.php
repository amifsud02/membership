<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRole;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return true;
        }

        return match ($panel->getId()) {
            'organisation' => $this->role === UserRole::ORGANISATION,
            'merchant' => $this->role === UserRole::MERCHANT,
            'customer' => $this->role === UserRole::CUSTOMER,
            default => false,
        };
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}

