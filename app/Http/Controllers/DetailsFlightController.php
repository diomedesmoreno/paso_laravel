<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as Controller;
use Illuminate\Http\Request;

use App\Models\DetailsFlight;

class DetailsFlightController extends Controller
{
    //
    public function table(){
        $result = DetailsFlight::with("passenger","flight","flight.countryFrom","flight.countryTo","country")->get(); 
        return $this->ok("Petición completada con éxito",[ 'data' => $result]);
    }
}
