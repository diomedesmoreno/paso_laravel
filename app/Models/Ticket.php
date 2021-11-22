<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

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
