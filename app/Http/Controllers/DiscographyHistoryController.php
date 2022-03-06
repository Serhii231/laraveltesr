<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiscographyHistoryController extends Controller
{
    public function index() 
    {
        // dd(Auth::user());
        
        return view('discography_histories');
    }
}
