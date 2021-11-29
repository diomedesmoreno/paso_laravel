<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsFlight extends Model
{
    use HasFactory;
    protected $table = 'tickets';

    public function passenger(){
        return $this->belongsTo(Passenger::class,'passengerId','id');
    }

    public function flight(){
        return $this->belongsTo(Flight::class,'flightsId','id');
    }

    public function country(){
        return $this->belongsTo(Countries::class,'countryToId','id');
    }
}
