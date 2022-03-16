<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index()
    {
        $title = 'Регистрация';
        return view('registration', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1|',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'avatar' => 'nullable|image|max:50',
        ]);

        if ($request->hasFile('avatar'))
        {
            $folder = "avatars-" . date('d-m-Y');
            $avatar = $request->file('avatar')->store("images/{$folder}");
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatar ?? null,
        ]);

        session()->flash('success', 'Вы успешно зарегистрировались и вошли в систему!');

        Auth::login($user);

        return redirect()->route('home');
    }
}
