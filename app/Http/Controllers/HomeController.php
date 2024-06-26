<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homepage()
    {
        $posts = Post::paginate(10);
        return view('welcome', compact('posts'));
    }

    public function posts($slug)
    {
        $post = Post::with('comments')->where('slug', $slug)->firstOrFail();
        $related = Post::where('category', $post->category)->where('slug', '!=', $slug)->inRandomOrder()->limit(4)->get();

        return view('posts', compact('post', 'related'));
    }

    public function comment(Request $request, $slug)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'website' => 'nullable|url',
            'content' => 'required',
        ]);

        $post = Post::where('slug', $slug)->firstOrFail();
        $comment = $request->only([
            'nama',
            'email',
            'website',
            'content',
        ]);

        Comment::create([
            'post_id' => $post->id,
            'nama' => $comment['nama'],
            'email' => $comment['email'],
            'website' => $comment['website'] ?? null,
            'content' => $comment['content'],
        ]);

        return back();
    }
}
