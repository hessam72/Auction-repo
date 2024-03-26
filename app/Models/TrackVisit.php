<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackVisit extends Model
{
    use HasFactory;
    protected $table = 'shetabit_visits';
    protected $fillable=[
        "method" ,
        "request" ,
        "url" ,
        "referer" ,
        "languages" ,
        "useragent" ,
        "headers" ,
        "device" ,
        "platform" ,
        "browser" ,
        "ip" ,
    ];
}
