<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $latestPosts = Post::with(['author:id,nickname,avatar'])
            ->select(['id', 'title', 'slug', 'thumbnail', 'author_id', 'created_at'])
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(8)
            ->get();

        return view('post', [
            'post' => $post,
            'latestPosts' => $latestPosts
        ]);
    }
}
