<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesPlanes extends Model
{
    use HasFactory;
    protected $fillable = ["id", "name", "description", "types_classes","created_by" ];
}
