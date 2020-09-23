<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $hidden = array('created_at', 'updated_at');

    public function phrases()
    {
        return $this->hasMany('App\Models\Quote');
    }
}
