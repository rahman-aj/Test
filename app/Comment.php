<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // user who has commented
    public function author()
    {
        return $this->belongsTo('App\User', 'from_user');
    }

    // returns article of any comment
    public function article()
    {
        return $this->belongsTo('App\Post', 'on_post');
    }
}
