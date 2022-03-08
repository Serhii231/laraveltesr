<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\Providers\RouteServiceProvider;

class VereficationController extends Controller
{
    public function index() 
    {
        return view('auth.verify');
    }

    function  emailverification (EmailVerificationRequest $request) 
    {
        $request->fulfill();
        return redirect()->route('main');
    }

    function sendemailverification ( Request $request) 
    {
        $request->user()->sendEmailVerificationNotification();
    
        return back()->with('message', 'Verification link sent!');
    }
}
