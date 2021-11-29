<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'passenger_id',
        "countries_id",
        "flights_id",
        "status",
        "created_by"
    ];

    public function passenger(){
        return $this->belongsTo(Passenger::class);
    }

    public function flight(){
        return $this->belongsTo(Flight::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }


}
