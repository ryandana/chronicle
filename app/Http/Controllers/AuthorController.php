<?php

namespace App\Http\Controllers;

use App\Models\Author;

class AuthorController extends Controller
{
    public function show($username)
    {
        $author = Author::where('username', $username)->firstOrFail();

        // Semua post milik author
        $posts = $author->posts()
            ->with(['category', 'author'])
            ->latest()
            ->paginate(6);

        return view('authors.show', compact('author', 'posts'));
    }
    public function index()
    {
        $authors = Author::orderBy('nickname')->get();

        return view('authors.index', compact('authors'));
    }
}
