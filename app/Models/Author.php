<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;

    protected $hidden = array('created_at', 'updated_at', 'deleted_at');

    public function quotesSaid()
    {
        return $this->hasMany('App\Models\Quote');
    }
}
