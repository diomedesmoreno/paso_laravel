<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as Controller;
use Illuminate\Http\Request;

use App\Models\Country;

class CountryController extends Controller
{
    //
    public function table(Request $request){
        $result = Country::all();
        return $this->ok("Petición completada con éxito",['data'=> $result]);
    }
}
