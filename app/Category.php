<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }
}
