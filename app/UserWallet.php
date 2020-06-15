<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;

class UserWallet extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $table = 'user';
    public $timestamps = false;

    protected $fillable = [
        'username', 'email', 'password',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}
