<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $hidden = array('id', 'created_at', 'updated_at');

    public function quotes()
    {
        return $this->hasMany('App\Models\Quote');
    }
}
