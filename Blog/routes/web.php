<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/posts', function () {
    $posts = DB::table('posts')->get();
    return view('posts.index', compact('posts'));
});

Route::get('/posts/{id}', function ($id) {
    
    $posts = DB::table('posts')->find($id);
    return view('posts.show', compact('posts'));
});
