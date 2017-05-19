<?php

namespace App\Http\Controllers;

use App\User;
use App\Genre;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function login(Request $request)
    {
        $genres= Genre::orderBy('id','DESC')->get();
        return view("login")->with('genres', $genres);

    }
    public function loginUser(Request $request)
    {
        $email = $request->input("email");
        $password = $request->input("password");
       if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect("/");
        }
        else{
            echo "Something went wrong";
        }

    }
    public function logOut() {

        Auth::logout();
        return redirect("/");

}

    
    

}
?>