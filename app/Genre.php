<?php

namespace App;
use App\Movies;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
	
    public function movies(){
    	return $this->hasMany('App\Movies');
    	
    }
}
