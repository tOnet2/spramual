<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Genre;
use Illuminate\Http\Request;

class AddAlubmController extends Controller
{
    public function index()
    {
        $genres = Genre::pluck('genre', 'id')->all();
        $title = "Добавить альбом";
        return view('addalbum', compact('title', 'genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:1|max:255',
            'author' => 'required|min:1|max:255',
            'history' => 'required|min:15',
            'genre_id' => 'integer',
            'photo' => 'nullable|image|max:100'
        ]);

        if ($request->hasFile('photo'))
        {
            $folder = "photos-" . date('d-m-Y');
            $photo = $request->file('photo')->store("images/{$folder}");
        }

        if (Album::create([
            'title' => $request->title,
            'author' => $request->author,
            'history' => $request->history,
            'photo' => $photo ?? null,
            'genre_id' => $request->genre_id,
        ]))
        {
            session()->flash('success', 'Вы успешно добавили альбом!');
        } else
        {
            session()->flash('error', 'Не удалось добавить альбом, что-то пошло не так :(');
        }

        return redirect()->route('home');
    }
}
