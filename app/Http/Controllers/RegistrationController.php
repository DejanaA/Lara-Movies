<?php

namespace App\Http\Controllers;

use App\User;
use App\Genre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    
    public function registration(Request $request)
    {
        $genres= Genre::orderBy('id','DESC')->get();
        return view("registration")->with('genres', $genres);
    }
    public function registeringUser(Request $request)
    {

    $this->validate($request, [
    'name' => 'required|max:255',
    'email' => 'required|email |unique:users',
    'password' => 'required|max:255'

    ]);
       $user = new User();
    	$user->name = $request->input("name");
    	$user->email = $request->input("email");
    	$user->password = bcrypt($request->input("password"));
    	if ($user->save()) {
    		return back();
    	}
	}

}
?>