<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function Index()
    {
        # code...
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

        return view('posts.index', compact('posts'));
    }

    public function Show(Post $post)
    {
        # code...
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        # code...
        
        return view('posts.create');
    }
    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);
        #create a new post
        // $post = new Post;
        // $post->title = request('title');
        // $post->body = request('body');

        // Post::create(request(['title', 'body', 'user_id']));
        // Post::create([
        //     'title' => request('title'), 
        //     'body' => request('body'), 
        //     'user_id' => auth()->id()
        // ]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );
        #save post to database
        //$post->save();

        #redirect
        return redirect('/');
    }
}
