<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Banner;

class HomeController extends Controller
{
    // public function index(Request $request)
    // {
    //     $search = $request->input('search');

    //     $posts = Post::when($search, function ($query) use ($search) {
    //             $query->where('title', 'like', "%{$search}%");
    //         })
    //         ->latest()
    //         ->paginate(6)
    //         ->withQueryString();

    //     return view('home', [
    //         'posts' => $posts,
    //         'banners' => Banner::all(),
    //     ]);
    // }
    public function index()
    {
        return view('home', [
            'banners' => Banner::all(),
        ]);
    }
}
