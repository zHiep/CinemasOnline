<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketFood extends Model
{
    use HasFactory;

    protected $table = 'ticketfoods';

    protected $fillable = [
        'foodName',
        'foodPrice',
        'quantity',
        'ticket_id',
    ];
}
