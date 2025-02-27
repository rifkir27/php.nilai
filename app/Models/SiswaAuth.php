<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class SiswaAuth extends Authenticatable
{
    use Notifiable;

    protected $table = 'siswa_auth';
    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
} 