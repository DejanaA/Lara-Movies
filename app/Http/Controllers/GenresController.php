<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Genre;

class GenresController extends Controller
{
	public function genres(Request $request)
    {
        $genres= Genre::all();
        return view("genres")->with('genres', $genres);
    }
	
    
}
