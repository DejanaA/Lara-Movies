<?php

namespace App;
use App\Comments;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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
    public function comments(){
        return $this->hasMany('App\Comments');
        
    }
    public function likes(){
        return $this->hasMany('App\Likes');
        
    }
}
