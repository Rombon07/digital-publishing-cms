<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    // Menampilkan form tulis artikel
    public function create()
    {
        return view('articles.create');
    }

    // Menyimpan artikel ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
        ]);

        Article::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . Str::random(5),
            'body' => $request->body,
            'status' => 'draft', // Otomatis jadi draft dulu
        ]);

        return redirect()->route('dashboard')->with('success', 'Artikel berhasil disimpan sebagai draft!');
    }
}
