<?php

namespace App;

use Carbon\Carbon;

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

    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filters)
    { 
        if ($month = isset($filters['month'])) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = isset($filters['year'])) {
            $query->whereYear('created_at', $year);
        }
    }

    public static function archives( )
    {
        # code...
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderBYRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }
}
