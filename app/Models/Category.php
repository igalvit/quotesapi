<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $hidden = array('created_at', 'updated_at');

    public function phrases()
    {
        return $this->hasMany('App\Models\Quote');
    }
}
