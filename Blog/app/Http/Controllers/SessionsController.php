<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //
    public function __construct()
    {
        # code...
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        # code...
        return view('sessions.create');
    }

    public function store()
    {
        //Attempt to authenticate the user
    
        if (! auth()->attempt(request(['email', 'password'])) ) {

            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        };

        //If not, redirect back

        //Redirect to Home Page
        return redirect()->home();
    }

    public function destroy()
    {
        # code...
        auth()->logout();

        return redirect()->home();
    }
}
