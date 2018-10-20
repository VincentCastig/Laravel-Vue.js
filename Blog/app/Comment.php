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
}
