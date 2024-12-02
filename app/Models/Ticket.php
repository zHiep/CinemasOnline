<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'user_id',
        'holdState',
        'status',
        'code',
        'hasPaid',
        'receivedCombo',
        'hasDiscount',
        'totalPrice',
        'created_at'
    ];

    public function ticketSeats()
    {
        return $this->hasMany(TicketSeat::class, 'ticket_id', 'id');
    }

    public function ticketCombos()
    {
        return $this->hasMany(TicketCombo::class, 'ticket_id', 'id');
    }
    public function schedule()
    {
        return $this->hasOne(Schedule::class,'id','schedule_id');
    }
    public function ticketFoods()
    {
        return $this->hasMany(TicketFood::class, 'ticket_id', 'id');
    }

}
