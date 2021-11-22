<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turn extends Model
{
    use HasFactory, SoftDeletes;

    public function turnForDay($datetime, $school){
        
       $count = $this->where('date_turn',$datetime)->where('school_id',$school)->count();
        
        return $count;
    }
}
