<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatType extends Model
{
    use HasFactory;

    protected $table = 'seattypes';

    protected $fillable = [
        'name',
        'surcharge',
        'color',
    ];
}