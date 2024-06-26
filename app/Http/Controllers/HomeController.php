<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function homepage()
    {
        $posts = Post::paginate(10);
        return view('welcome', compact('posts'));
    }
}
