<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'room_type_id',
        'theater_id',
        'status'
    ];

    public function theater()
    {
        return $this->belongsTo(Theater::class, 'theater_id', 'id');
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'roomType_id', 'id');
    }

    public function seats()
    {
        return $this->hasMany(Seat::class, 'room_id', 'id');
    }

    public function rows()
    {
        return $this->seats()->select('row', 'mb', 'col')->groupBy('row');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'room_id', 'id');
    }

    public function schedulesbyDate($date)
    {
        return $this->schedules()->where('date', $date)->get();
    }

    public function latestScheduleByDate($date)
    {

        return $this->schedules()->where('date', $date)->latest('endTime')->limit(1)->get();
    }
}
