<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TrackVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    public function store(Request $request)
    {
        // visitor()->visit(); // save visitor info
        TrackVisit::create([
            "method" => "GET",
            // "request" =>  visitor()->request(),
            "url" => $request->url,
            "referer" =>  visitor()->referer(),
            "languages" => "en",
            "useragent" =>  visitor()->useragent(),
            // "headers" =>    implode(',', $request->headers),
            "device" =>     visitor()->device(),
            "platform" =>    visitor()->platform(),
            "browser" =>  visitor()->browser(),
            "ip" =>   visitor()->ip(),
        ]);

        return response()->json([
            'success' => 'visit saved',

        ], 201);
    }
}
