<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightReservations extends Model
{
    use HasFactory;
    protected $fillable = [
        "id", 
    "passengers_id", 
    "flights_id",
    "travelDateFrom",
    "travelDateTo",
    "created_by" 
];

}
