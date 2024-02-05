<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // SHOW REGISTER FORM
    public function register()
    {
        return view('users.register');
    }

    // CREATE USER ACCOUNT
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);
        // Create User
        $user = User::create($formFields);
        // Login User Automatically
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in!');
    }


    // SHOW LOGIN FORM
    public function login()
    {
        return view('users.login');
    }

    // 
}
