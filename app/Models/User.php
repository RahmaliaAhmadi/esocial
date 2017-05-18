<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // Maklumat nama table yang perlu dihubungi oleh Model Gallery ini
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'full_name',
        'phone',
        'address',
        'role',
        'status',
        'picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Method relationship kepada table posts
    public function posts()
    {
      // relationship default
      // return $this->hasMany('App\Models\Post');
      // relationship yang memerlukan nama foreign key
      // return $this->hasMany('App\Models\Post', 'user_id');
      // relationship yang memerlukan foreign key dan juga local key
      return $this->hasMany('App\Models\Post', 'user_id', 'id');
    }
}
