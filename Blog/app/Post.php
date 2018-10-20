<?php

namespace App;

class Post extends Model
{
    //
    //protected $fillable = ['title', 'body'];
    public function comments()
    {
        # code...
        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {
        # code...
        $this->comments()->create(compact('body'));

        // Comment::create([
        //     'body' => $body,
        //     'post_id' => $this->id
        // ]);
    }
}
