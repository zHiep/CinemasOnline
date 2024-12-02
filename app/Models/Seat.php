<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        'row',
        'col',
        'seat_type_id',
        'room_id',
        'status',
    ];

    public function seatType()
    {
        return $this->belongsTo(SeatType::class, 'seatType_id', 'id');
    }
}
