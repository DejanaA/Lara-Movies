<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Movies;
use App\Genre;

class SearchController extends Controller
{
    public function search(Request $request){
    	$movies = Movies::where('name', 'like', '%'. $request->keyword . '%')->paginate(6);
    	return view('home')->with('movies', $movies)->with('genres',Genre::all());

    }
}
