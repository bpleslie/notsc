<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class track extends Model
{
    protected $dates = ['published_at'];

    public function setTitle($value)
    {
        $this->attributes['title'] = $value;

        if ( !$this->exists) {
            $this->attributes['slug'] = str_slug($value);
        }
    }
}