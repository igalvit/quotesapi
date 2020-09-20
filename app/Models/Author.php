<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function quotes()
    {
        return $this->hasMany('App\Models\Quote');
    }
}
