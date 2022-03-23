<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Genre;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $albums = Album::orderBy('created_at', 'desc')->paginate(5);
        $title = 'Главная страница';
        return view('main', compact('title', 'albums'));
    }
}
