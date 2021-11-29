<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planes extends Model
{
    use HasFactory;
    protected $fillable = ["id", "name", "types_planes_id", "seating","created_by" ];

}
