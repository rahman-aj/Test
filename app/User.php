<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 'name', 'email', 'password',
    ];

    protected $attributes = [
        'role' => 'user'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // user has many articles
    public function articles()
    {
        return $this->hasMany('App\Article', 'author_id');
    }

    // user has many comments
    public function comments()
    {
        return $this->hasMany('App\Comment', 'from_user');
    }

    public function can_post()
    {
        $role = $this->role;
        if ($role == 'author' || $role == 'admin') {
            return true;
        }
        return false;
    }

    public function is_admin()
    {
        $role = $this->role;
        if ($role == 'admin') {
            return true;
        }
        return false;
    }
}
