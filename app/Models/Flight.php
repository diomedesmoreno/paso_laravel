<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Flight extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        "countryFrom",
        "countryTo",
        "minute",
        "hour",
        "departuretime",
        "arrivaltime",
        "flightDuration",
        "price",
        "planes_id",
        "companiesId",
        "created_by"
    ];

    public function countryFrom(){
        return $this->belongsTo(Countries::class,'countryFrom','id');
    }
    public function countryTo(){
        return $this->belongsTo(Countries::class,'countryTo','id');
    }
}
