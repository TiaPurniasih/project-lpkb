<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    const ROLE_GUEST      = 0;
    const ROLE_USER       = 10;
    const ROLE_MODERATOR  = 50;
    const ROLE_ADMIN      = 80;
    const ROLE_SUPERADMIN = 100;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function hasLevel(int $level): bool
    {
        return $this->role_level >= $level;
    }

    public function roleName(): string
    {
        return match ($this->role_level) {
            self::ROLE_SUPERADMIN => 'Super Admin',
            self::ROLE_ADMIN      => 'Admin',
            self::ROLE_MODERATOR  => 'Moderator',
            self::ROLE_USER       => 'User',
            default               => 'Guest',
        };
    }
}
