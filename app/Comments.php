<?php

namespace App;
use App\Movies;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
	protected $dates = ['created_at'];
	
    public function movies(){
    	return $this->belongsTo('App\Movies');
    	
	}
	public function user(){
    	return $this->belongsTo('App\User');
    	
	}
	public function likes(){
    	return $this->hasMany('App\Likes');
    	
    }
}
