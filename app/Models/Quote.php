<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $hidden = array('id', 'author_id', 'category_id', 'created_at', 'updated_at');
    
    public function author()
    {
        return $this->belongsTo('App\Models\Author');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function toArray() 
    {
        $data = parent::toArray();
        if ($this->author) {
            $data['author'] = $this->author->author;
        } else {
            $data['author'] = null;
        }
        if ($this->category) {
            $data['category'] = $this->category->category;
        } else {
            $data['category'] = null;
        }
        return $data;
    }
}
