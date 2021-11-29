<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airports extends Model
{
    use HasFactory;
    protected $fillable = ["id", "name", "countries_id","created_by" ];

    public function countries(){
        return $this->belongsTo(Countries::class);
        
    }

}
