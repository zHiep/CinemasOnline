<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'price',
        'status'
    ];

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'combo_details', 'combo_id', 'food_id')->withPivot('quantity');
    }
}
