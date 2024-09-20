<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    public function showLoginForm()
    {

        return view('auth.login');
    }
    public function login(Request $request)
    {

        $request->validate([
            'email' => "required|email",
            "password" => "required",
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => "provided email is not true"
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect("/");
    }
    public function dashIND(Request $request)
    {
        $users=User::all();
        return  view('admin.dashboard',compact('users'));
    }
}
