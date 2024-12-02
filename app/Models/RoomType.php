<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $table = 'roomtypes';

    protected $fillable = [
        'name',
        'surchange',
        'status',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class, 'roomType_id', 'id');
    }

    public function schedulesByDateAndTheaterAndMovie($date, $theater, $movie)
    {
        return $this->rooms()->select('schedules.*')
            ->join('schedules', 'schedules.room_id', '=', 'rooms.id')
            ->join('theaters', 'theaters.id', '=', 'rooms.theater_id')
            ->where('date', $date)
            ->where('rooms.roomType_id', $this->id)
            ->where('theaters.id', $theater)
            ->where('schedules.movie_id', $movie)
            ->where('schedules.status',1)->get();
    }

}
