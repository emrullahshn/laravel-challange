<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    /**
     * Get the user that owns the song.
     */
    public function post()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user that owns the song.
     */
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
}
