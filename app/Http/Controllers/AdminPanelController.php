<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Movies;
use App\Genre;


class AdminPanelController extends Controller
{
public function adminPanel() {

      $genres= Genre::orderBy('id','DESC')->get();
        $movies= Movies::orderBy('name', 'asc')->get();
        return view("dashboard")->with('movies', $movies)->with('genres', $genres);

}
public function addMovie(Request $request) {

       $genres= Genre::orderBy('id','DESC')->get(); 
       $movies = Movies::paginate(6);
       return view("addMovies")->with('genres', $genres)->with('movies', $movies);

}
public function addNewMovie(Request $request) {
    	$genres= Genre::orderBy('id','DESC')->get();
      $movies= Movies::all();

      $this->validate($request, [
      'movieName' => 'required|max:255',
      'description' => 'required|max:255',
      'genre' => 'required|max:255'

      ]);
      
      $movie = new Movies();
    	$movie->name = $request->input("movieName");
    	$movie->description = $request->input("description");
    	$movie->genre_id = $request->input("genre");
      $movie->save();
    	return redirect('/');
}


public function deleteMovie(Request $request, $movie_id) {  

          $movies = Movies::find($movie_id);
          //var_dump($movies->comments());
          foreach ($movies->comments as  $comment) {
              $comment->likes()->delete();
            
            }  
            $movies->comments()->delete();        
                 
          Movies::where('id', $movie_id)->delete();  
          return redirect('/');    
          

}
public function updateMovie(Request $request, $movie_id) {  

          $movies = Movies::find($movie_id);
          $movies->name = $request->input("movieName");
          $movies->description = $request->input("description");
          $movies->genre_id = $request->input("genre");
          $movies->save();
          return redirect('/'); 
                 
            
          

}

}



