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
}
