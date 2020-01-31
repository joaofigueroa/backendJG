<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    
   
    public function scopeWhere($query, $column, $value)
    {
        return $query->where($column,'%'.$value.'%');
    }

    public function movies()
    {
        return $this->belongsToMany('App\Movies','favorites','user_id', 'movie_id');
    }

    
}

