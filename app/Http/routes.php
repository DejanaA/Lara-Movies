<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'WelcomeController@welcomePage')->name("WelcomePage"); 
Route::get('/registration', 'RegistrationController@registration')->name("Registration"); 
Route::post('/registeringUser', 'RegistrationController@registeringUser')->name("RegisteringUser"); 

Route::get('/login', 'LoginController@login')->name("Login"); 
Route::post('/loginUser', 'LoginController@loginUser')->name("LoginUser"); 

Route::get('/logout', 'LoginController@logout')->name("Logout"); 
    
Route::get('/genres', 'GenresController@genres')->name("Genres");

Route::get('/genres/{genreName}', 'MoviesController@moviesList')->name("Movies");

Route::get('/search', 'SearchController@search')->name("Search"); 

Route::get('/{movieName}', 'MoviesController@movieDetails')->name("MovieDetails");

Route::post('comment', 'MoviesController@postComment')->name("Comments");

Route::get('/{movieName}/comment/{comment_id}/like', 'MoviesController@likeComment')->name("Likes");

Route::get('/login/dashboard', 'AdminPanelController@adminPanel')->name("AdminPanel");
Route::get('/login/dashboard/addMovies', 'AdminPanelController@addMovie')->name("AddMovie");
Route::post('/login/dashboard/addMovies/newMovie', 'AdminPanelController@addNewMovie')->name("AddNewMovie");

Route::get('/{movie_id}/delete', 'AdminPanelController@deleteMovie')->name("DeleteMovie");
Route::post('/{movie_id}/update', 'AdminPanelController@updateMovie')->name("UpdateMovie");









 