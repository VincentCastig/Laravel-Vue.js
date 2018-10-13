<?php

use App\Post;

Route::get('/posts', 'PostsController@index');

Route::get('/post/{id}', function ($id) {
    //$posts = DB::table('posts')->find($id);
    $posts = Post::find($id);
    return view('posts.show', compact('posts'));
});
