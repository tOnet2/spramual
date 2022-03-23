<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyLoginController extends Controller
{
    public function index()
    {
        $title = "Вход";
        return view('login', compact('title'));
    }

    public function loginSend(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]))
        {
            session()->flash('success', 'Вы успешно вошли в систему!');
            return redirect()->route('home');
        }

        return redirect()->back()->with('error', 'Вы ввели неверную почту или неверный пароль.');
    }

    public function logOut()
    {
        Auth::logout();
        session()->flash('success', 'Вы вышли из системы.');
        return redirect()->route('login');
    }
}
