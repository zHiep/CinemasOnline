<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketSeat extends Model
{
    use HasFactory;

    protected $table = 'ticketseats';

    protected $fillable = [
        'row',
        'col',
        'price',
        'ticket_id',
        'seatType'
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id', 'id');
    }
}
