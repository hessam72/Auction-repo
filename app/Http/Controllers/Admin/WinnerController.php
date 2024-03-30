<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Winner;
use Illuminate\Http\Request;

class WinnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $winners = Winner::latest()->with(['user' , 'product'])->get();
        return view('admin.winners.index', compact('winners'));
    }

   
}
