<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $hidden = array('id', 'created_at', 'updated_at');

    public function categories()
    {
        return $this->hasMany('App\Models\Quotes');
    }
}
