<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function path()
    {
        return route('posts.show', $this);
    }
}
