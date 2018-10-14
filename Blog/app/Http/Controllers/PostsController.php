<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    //
    public function Index()
    {
        # code...
        $posts = Post::get();
        return view('posts.index', compact('posts'));
    }

    public function Show($id)
    {
        # code...
        $posts = Post::find($id);
        return view('posts.show', compact('posts'));
    }
}
