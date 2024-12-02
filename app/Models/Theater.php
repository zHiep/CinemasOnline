<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'location',
        'status'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class, 'theater_id', 'id');
    }

    public function schedulesByDateAndMovie($date, $movie)
    {
        return $this->rooms()->select('schedules.*')
            ->join('schedules', 'schedules.room_id', '=', 'rooms.id')
            ->where('date', $date)
            ->where('schedules.movie_id', $movie)->get();
    }

    public function schedulesByTheaterAndMovie($movie, $roomType)
    {
        return $this->rooms()->select('schedules.*')
            ->join('schedules', 'schedules.room_id', '=', 'rooms.id')
            ->join('theaters', 'theaters.id', '=', 'rooms.theater_id')
            ->join('roomtypes', 'roomtypes.id', '=', 'rooms.roomType_id')
            ->where('theaters.id', $this->id)
            ->where('roomtypes.id', $roomType)
            ->where('schedules.movie_id', $movie)->get();
    }
    public function Ticket()
    {
        return $this->rooms()->select('tickets.*')
            ->join('schedules', 'schedules.room_id', '=', 'rooms.id')
            ->join('tickets', 'tickets.schedule_id', '=', 'schedules.id')
            ->where('rooms.theater_id', $this->id);
    }
}
