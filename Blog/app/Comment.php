<?php

namespace App;


class Comment extends Model
{
    //
    public function post()
    {
        # code...
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }
}

