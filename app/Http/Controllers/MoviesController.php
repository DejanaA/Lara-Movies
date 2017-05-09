<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;
use App\Genre;
use App\Movies;
use App\Comments;
use App\Likes;
use Illuminate\Support\Facades\DB;




class MoviesController extends Controller
{

    private function findByName($genreName){
        $genre = Genre::where('name', $genreName)->first();
        return $genre;

    }
    public function moviesList(Request $request, $genreName)
    {
        
        if ($genreName == 'all') {
            $movies = Movies::paginate(6);
        }
        else{
            $genre = $this->findByName($genreName);
            $movies = Genre::find($genre->id)->movies()->paginate(6);
        }
        $genres= Genre::orderBy('id','DESC')->get();
        return view("home")->with('genres', $genres)->with('movies', $movies);   
    }
    
    
    
    public function movieDetails(Request $request, $movieName){

        $movies = Movies::with('genre')->where('name', $movieName)->first();
        $genres= Genre::orderBy('id','DESC')->get();
        $comments = Comments::with('user')->where('movie_id', $movies->id)->get();


        return view('movieDetails')->with('genres', $genres)->with('movies', $movies)->with('comments',$comments); 

    }

    public function postComment(Request $request){
        
        $comm = new Comments();
        $comm->commentText = $request->input('commentText');
        $comm->user_id = Auth::user()->id;
        $comm->movie_id = $request->input('movie_id');
        if ($comm->save()) {
            return back();
        }

    }
    public function likeComment(Request $request){
 
        $like = new Likes();
        $like->comments_id = $request->comment_id;
        $like->user_id = Auth::id();
        $movieName = $request->movieName;
        if($like->save()){
            return redirect('/' . $movieName);
        }



    }
     
     
    
    
}
