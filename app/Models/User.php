<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\User as Authenticatable; // harus pakai ini
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements AuthenticatableContract
{
    use HasFactory, Notifiable;

    protected $table = 'tb_users'; // kasih tahu Laravel nama tabelnya

    protected $primaryKey = 'user_id'; // pakai primary key sesuai migrasi

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'username',
        'password',
    ];

    public function getAuthIdentifierName()
    {
        return 'username';
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
