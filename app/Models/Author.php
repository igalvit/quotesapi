<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $hidden = array('created_at', 'updated_at');

    public function quotesSaid()
    {
        return $this->hasMany('App\Models\Quote');
    }
}
