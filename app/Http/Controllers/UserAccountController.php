<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserAccountController extends Controller
{
    function create()
    {
        return Inertia::render(
            'UserAccount/CreatePage'
        );
    }

    function store(Request $request)
    {
        $user = User::create($request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]));

        Auth::login($user);

        return redirect()->route('listings.index')
        ->with('success', 'User account created!');
    }
}
