<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Genre;
use App\Movies;

class WelcomeController extends Controller
{
    public function welcomePage(Request $request){
    	$genres= Genre::orderBy('id','DESC')->get();
    	$movies = Movies::paginate(6);

        return view("movies")->with('genres', $genres)->with('movies', $movies);

    }
}
