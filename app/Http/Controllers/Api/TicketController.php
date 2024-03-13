<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
use App\Models\Admin;
use App\Models\Ticket;
use App\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    use Upload;
    public function user_tickets()
    {
        // only fetch main tickets 
        $user_tickets = Ticket::where('user_id', Auth::user()->id)->where('reply_to_id', 0)->orderBy('created_at' , 'desc')->get();
        return new TicketResource($user_tickets);
    }
    public function getInfo(Request $request)
    {

        $request->validate([
            "ticket_id" => 'required',
        ]);
        $parent = Ticket::find($request->ticket_id);
        return TicketResource::collection($parent->children);
    }
    public function store(Request $request)
    {

        $request->validate([
            "subject" => 'required',
            "content" => 'required',
            "attachment" => 'mimes:jpeg,png,doc,docs,pdf',
        ]);

        // check to see if it's a reply or new ticket
        if ($request->has('reply_to_id')) {
            //its a reply
            // if user submit new reply, then ticket status will be 1 = pending 
            // if admin submit new reply, then ticket status will be 100 = answered 


           $ticket= Ticket::create([
                "user_id" => Auth::user()->id,
                "admin_id" => Admin::first()->id,
                "subject" => $request->subject,
                "content" => $request->content,
               
                "status" => 1,
                "reply_to_id" => $request->reply_to_id,
            ]);
            
        } else {
            // its new
            $ticket =Ticket::create([
                "user_id" => Auth::user()->id,
                "admin_id" => Admin::first()->id,
                "subject" => $request->subject,
                "content" => $request->content,
               
                "status" => 1,
            ]);
        }

        if($request->has('attachment')){
            
            $path = $this->UploadFile($request->file('attachment'), 'images/ticket_images'); //use the method in the trait
            Ticket::where('id' , $ticket->id)->update([
                'attachment' =>$path
            ]);
        }
  


        return response()->json([
            'success' => 'ticket created successfully',

        ], 200);
    }
    public function update(Request $request)
    {
        $request->validate([
            "ticket_id" => 'required',
            "status" => 'required',
        ]);
        Ticket::where('id', $request->ticket_id)->update([
            "status" => $request->status
        ]);
        return response()->json([
            'success' => 'ticket updated successfully',

        ], 200);
    }
}
