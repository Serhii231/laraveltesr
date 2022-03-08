<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class AddNewsController extends Controller
{
    public function index() 
    {   
        return view('add_news');
    }

    public function add_news(Request $request)
    {
        $credentials = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'foto' => 'required|string'
        ]);
        //DB::table('users')->insert([
          //  'title' =>  $request->input('title'),
            //'votes' => 0
        //]);
        $news = new News();
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->foto = $request->input('foto');
        $news->user_id = auth()->user()->id;
        $news->save();
        return redirect()->route('main');
    }
}
