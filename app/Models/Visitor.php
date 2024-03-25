<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model // for managing site views
{
    use HasFactory;


    // fire an event each time a page visited to save data to database 
    // event must run in background
    
}
