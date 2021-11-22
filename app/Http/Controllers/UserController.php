<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index')->with('users', User::orderBy('id', 'desc')->get());
    }

    public function admin(User $user)
    {
        if ($user->role === 'writer') {
            $user->role = 'admin';
        } else {
            $user->role = 'writer';
        };

        $user->save();

        return back();
    }
}
