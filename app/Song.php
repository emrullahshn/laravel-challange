<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'favorites');
    }
}
