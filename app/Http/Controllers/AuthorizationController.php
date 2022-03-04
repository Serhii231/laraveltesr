<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function index() 
    {
        return view('authorization');
    }
    
    public function authorization()
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => [
                'required',
                'string',
                Password::min(8)->mixedCase()->numbers()
            ]
        ]);
        
       
        if (Auth::attempt($credentials)) {
            dd(Auth::attempt($credentials));
            $request->session()->regenerate();
            dd(Auth::user());
            return redirect()->route('main');
        }
 
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
}
