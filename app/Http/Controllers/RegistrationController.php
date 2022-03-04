<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class RegistrationController extends Controller
{
    public function index() 
    {
        return view('registration');
    }

    public function registration(Request $request)
    {
        Password::min(8)
            ->mixedCase()
            ->numbers();
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username|min:5',
            'password' => ['required','string','confirmed', Password::min(8)
            ->mixedCase()
            ->numbers()],
            'email' => 'required|email|unique:users,email'
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password =Hash::make($request->input('password'));
        $user->save();
        return redirect()->route('main');     
    /*   User::query()->create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);*/
    }
}
