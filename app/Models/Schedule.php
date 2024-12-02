<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'movie_id',
        'audio_id',
        'subtitle_id',
        'date',
        'startTime',
        'endTime',
        'early',
        'status',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'id');
    }

    public function audio()
    {
        return $this->belongsTo(Audio::class, 'audio_id', 'id');
    }

    public function subtitle()
    {
        return $this->belongsTo(Subtitle::class, 'sub_id', 'id');
    }

    public function theaters()
    {
        $theates = Schedule::select('theaters.name')
            ->join('theaters', 'rooms.theater_id', '=', 'theaters.id')
            ->groupBy('theaters.name')->get();
        return $theates;
    }
    public function Ticket()
    {
        return $this->hasMany(Ticket::class, 'schedule_id','id');
    }
}
