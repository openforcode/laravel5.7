<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 默认的登录验证：vendor\laravel\passport\src\Bridge\UserRepository.php
     * 大概45行是已email验证滴，在登录的时候很多人遇到invalid_credentials的错误，
     * 登录这里我们必须重载
     * @var array
     */
    public function findForPassport($login)
    {
        return $this->orWhere('email', $login)->orWhere('name', $login)->first();
    }
}
