<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
     public function user_tickets(){
        $user_tickets=Ticket::where('user_id' , Auth::user()->id)->get();
        return new TicketResource($user_tickets);
     }
}
