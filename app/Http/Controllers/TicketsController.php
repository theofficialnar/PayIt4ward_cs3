<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\User;
use App\messages;
use App\tickets;
use Carbon\Carbon;
use Auth;
use DB;

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

    //Displays received messages
    function messages(){
        $uid = Auth::id();
        if(Auth::user()->role == 'admin'){
            $tickets = DB::table('tickets')
                ->join('users', 'tickets.user_id', '=', 'users.id')
                ->select('users.name', 'tickets.subject', 'tickets.created_at', 'tickets.id')
                ->where('tickets.status', '=', '0')
                ->get();
        }else{
            $tickets = DB::table('tickets')
                    ->join('users', 'tickets.user_id', '=', 'users.id')
                    ->select('users.name', 'tickets.subject', 'tickets.created_at', 'tickets.id')
                    ->where('tickets.user_id', '=', $uid)
                    ->get();
        }

        echo '<h3>Inbox</h3>
        <div class="panel-group scroll">';
        foreach($tickets as $ticket){
            echo '
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-9"><b>'.ucfirst($ticket->subject).'</b></div>
                        <div class="col-lg-3"><em>'.date('F d, Y',strtotime($ticket->created_at)).'</em></div>
                    </div>
                </div>
                <div class="panel-body">
                <p>From: <b>'.$ticket->name.'</b></p>
                <p><a href="#" data-id="'.$ticket->id.'" data-sub="'.$ticket->subject.'" data-date="'.date('F d, Y',strtotime($ticket->created_at)).'" class="readMessage">Read now</a></p>
                </div>
            </div>';
        }
        echo '</div>';
    }

    //Opens the selected message from the inbox
    function viewMessage($id, $sub, $date){
        $messages = DB::table('messages')
                ->join('tickets', 'messages.ticket_id', '=', 'tickets.id')
                ->join('users', 'messages.user_id', '=', 'users.id')
                ->where('tickets.id', '=', $id)
                ->select('messages.message', 'messages.created_at', 'users.name', 'tickets.subject')
                ->get();
        // dd($messages);
        echo '
        <h3 id="msgBack"><span class="glyphicon glyphicon-menu-left"></span>Back</h3>
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-9"><b>'.ucfirst($sub).'</b></div>
                    </div>
                </div>
                <div class="panel-body scroll" id="msgScroll">
                    <div id="msgBody">';
        foreach($messages as $message){
                    echo '
                        <p>From: <b>'.$message->name.'</b></p>
                        <p class="msg_date">'.$message->created_at.'</p>
                        <div class="well">
                        <span>'.$message->message.'</span>
                        </div>
                        <hr>';
        }
                echo'
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <textarea class="form-control" rows="4" id="msgReply" placeholder="Reply..." name="message" required></textarea>
        </div>
        <div class="col-lg-6">
        <button id="msgSendReply" data-tid="'.$id.'" class="btn btn-primary" style="width: 100%"><b>Send Reply</b></button>
        </div>
        <div class="col-lg-6">
        <button class="btn btn-danger" style="width: 100%"><b>Delete Ticket</b></button>
        </div>
        ';
        
    }

    function replyMessage(Request $request){
        $user_name = Auth::user()->name;
        $new_reply = new messages;
        $new_reply->ticket_id = $request->ticket_id;
        $new_reply->user_id = Auth::id();
        $new_reply->message = $request->message;
        $new_reply->save();

        echo '
        <p>From: <b>'.$user_name.'</b></p>
        <p class="msg_date">'.$new_reply->created_at.'</p>
        <div class="well">
        <span>'.$new_reply->message.'</span>
        </div>
        <hr>';
    }
}
