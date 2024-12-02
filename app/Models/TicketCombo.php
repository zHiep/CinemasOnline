<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketCombo extends Model
{
    use HasFactory;

    protected $table = 'ticketcombos';

    protected $fillable = [
        'comboName',
        'comboPrice',
        'comboDetails',
        'quantity',
        'ticket_id',
    ];
}
