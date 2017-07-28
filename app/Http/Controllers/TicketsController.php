<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\messages;
use App\tickets;
use Carbon\Carbon;
use Auth;

class TicketsController extends Controller
{
    //Saves messages to database
    function saveTicket(Request $request){
        $new_ticket = new tickets;
        $new_ticket->user_id = Auth::id();
        $new_ticket->subject = $request->subject;
        $new_ticket->status = 0;
        $new_ticket->save();
        $ticket_id = $new_ticket->id;

        $new_message = new messages;
        $new_message->ticket_id = $ticket_id;
        $new_message->user_id = Auth::id();
        $new_message->message = $request->message;
        $new_message->save();
    }
}
