<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketSeat;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function ticket()
    {
        $ticket = Ticket::orderBy('id', 'DESC')->Paginate(10);
        return view('admin.ticket.list',['ticket'=>$ticket]);
    }
}
