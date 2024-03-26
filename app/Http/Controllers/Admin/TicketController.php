<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Ticket;
use App\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Upload;

    public function index(Request $request)
    {
        
        if($request->has('id')){
            $current_ticket=Ticket::where('id' , $request->id)->with('children')->first();
        }else{
            $current_ticket=Ticket::where('reply_to_id', 0)->where('status' , 1)->with('children')->latest()->first();

        }
     
        $new_tickets= Ticket::where('reply_to_id', 0)->where('status' , 1)->latest()->get();


        //answered & closed
        $old_tickets= Ticket::where('reply_to_id', 0)->where('status' , '<>' , 1)->latest()->get();


        return view('admin.tickets.index' , compact('new_tickets','old_tickets' ,'current_ticket'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "subject" => 'required',
            "reply_to_id" => 'required',
            "content" => 'required',
            "attachment" => 'mimes:jpeg,png,doc,docs,pdf',
        ]);
        $ticket= Ticket::create([
            "user_id" => Auth::user()->id,
            "admin_id" => Admin::first()->id,
            "subject" => $request->subject,
            "content" => $request->content,
           
            "status" => 100, //its admin response
            "reply_to_id" => $request->reply_to_id,
        ]);
        if($request->has('attachment')){
            
            $path = $this->UploadFile($request->file('attachment'), 'images/ticket_images'); //use the method in the trait
            Ticket::where('id' , $ticket->id)->update([
                'attachment' =>$path
            ]);
        }

        // set parent ticket status to answered
        $ticket->parent->status = 100;
        $ticket->parent->save();


        return redirect()->back()->with('success', 'ثبت با موفقیت ثبت شد');
  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
