<?php

use App\Models\Author;
use App\Models\Banner;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', function (Request $request) {
    $search = $request->input('search');

    $query = Post::query();

    if ($search) {
        $query->where('title', 'like', '%' . $search . '%');
    }
    $posts = $query->latest()->paginate(5)->withQueryString();

    return view('home', ['posts' => $posts, 'banners' => Banner::all()]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['post' => $post]);
});

Route::get('/authors/{author:username}', function (Author $author) {
    return view('author', ['author' => $author]);
});
