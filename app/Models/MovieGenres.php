<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieGenres extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status'
    ];
    public function movies(){
        return $this->belongsToMany(Movie::class,'moviegenres_movies','movieGenre_id','movie_id');
    }
}
