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

    public function Show(Post $id)
    {
        # code...
        
        return view('posts.show', compact('id'));
    }

    public function create()
    {
        # code...
        
        return view('posts.create');
    }
    public function store()
    {
        #create a new post
        // $post = new Post;
        // $post->title = request('title');
        // $post->body = request('body');

        Post::create(request(['title', 'body']));
        #save post to database
        //$post->save();

        #redirect
        return redirect('/');
    }
}
