<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    //

    protected $fillable = [
        'Name', 'belongs_to_collection', 'budget', 'genres','homepage','id','imdb_id',
        'original_language','original_title','overview','popularity','poster_path',
        'production_companies','production_countries','release_date','revenue','runtime',
        'spoken_languages','status','tagline','title','video','vote_average','vote_count'
    ];

    public function scopeWhereLike($query, $column, $value)
    {
        return $query->where($column, 'like', '%'.$value.'%');
    }
}
