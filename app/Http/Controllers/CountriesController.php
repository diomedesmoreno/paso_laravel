<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as Controller;
use Illuminate\Http\Request;

use App\Models\Countries;

class CountriesController extends Controller
{
    //
    public function table(Request $request){
        $result = Countries::all();
        return $this->ok("Petición completada con éxito",['data'=> $result]);
    }
}
