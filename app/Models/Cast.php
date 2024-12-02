<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'birthday',
        'national',
        'content',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'casts_movies', 'cast_id', 'movie_id');
    }
}
