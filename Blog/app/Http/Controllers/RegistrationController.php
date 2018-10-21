<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    //
    public function create()
    {
        # code...
        return view('registration.create');
    }

    public function store()
    {
        //Validate the User
        $this->validate(request(), [
            'name' => 'required',
            //Has to be email type
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        //Create and Save the User
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        //Sign User In
        auth()->login($user);

        //Redirect to Home Page
        return redirect()->home();
    }
}
