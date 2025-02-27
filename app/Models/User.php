<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
        'nip'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isSuperAdmin()
    {
        return $this->role === 'super_admin';
    }

    public function isGuru()
    {
        return $this->role === 'guru';
    }
}

