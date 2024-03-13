<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StateResource;
use App\Models\State;
use Illuminate\Http\Request;

class GeoController extends Controller
{
    public function all(Request $request)
    {

        return  StateResource::collection(State::orderBy('name')->get()->load('cities'));
    }
}
