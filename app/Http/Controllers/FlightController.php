<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as Controller;
use Illuminate\Http\Request;

use App\Models\Flight;
use App\Models\Countries;
// use App\Models\TypeNews;

class FlightController extends Controller
{
    //
    public function table()
    {
        $result = Flight::with("countryFrom","countryTo")->get();
        return $this->ok("Petición completada con éxito",['data' => $result]);
    }
    public function store(Request $request)
    {
        $vuelodesde = Countries::find($request->input('countryFrom'));
        $vueloa = Countries::find($request->input('countryTo'));

        $flight = Flight::create([
            'planes_id'          => $request->input('planes_id'),
            'countryFrom'          => $request->input('countryFrom'),
            'countryTo'   => $request->input('countryTo'),
            'minute'      => $request->input('minuto'),
            'hour'  => $request->input('hora'),
            'departuretime'      => $request->input('horaSalida'),
            'arrivaltime'      => $request->input('horaLlegada'),
            'name'        => 'Vuelo PAYIR ',
            'created_by'        => 1,
        ]);

        $nameAfter = 'Vuelo PAYIR '.$flight->id.' '.$vuelodesde->name.'-'.$vueloa->name;

        // dd($flight->id);
        $flight = Flight::find($flight->id);
        $flight->name = $nameAfter;
        $flight->save();

        return $this->ok("Petición completada con éxito",[
            'data' => [
                'data' => $flight,
                $request->all()
            ],
        ]);
    }
    public function search(Request $request)
    {
        $flight = Flight::where('countryFrom',$request->input('countryFrom'))
        ->where('countryTo',$request->input('countryTo'))
        ->where('departuretime',$request->input('departuretime'))
        ->where('arrivaltime',$request->input('arrivaltime'))
        ->get();
        // dd( $flight);

        if (!empty($flight)) {
            return $this->ok("Muestra de detalle",['data' => $flight]);
        }

        return $this->ok("Este registro no tiene detalle",$request);
    }
    public function show($id)
    {
        $flight = Flight::find($id);

        if (!empty($flight)) {
            return $this->ok("Muestra de detalle",['data' => $flight]);
        }

        return $this->ok("Este registro no tiene detalle",$request);
    }
    public function update(Request $request, $id)
    {
        $flight = Flight::find($id);

        $flight->countryFrom          = $request->input('countryFrom');
        $flight->countryTo   = $request->input('countryTo');
        $flight->hour  = $request->input('hora');
        $flight->departuretime      = $request->input('horaSalida');
        $flight->arrivaltime      = $request->input('horaLlegada');

        // 'created_by'        => 1,
        // foreach ($request->all() as $key => $value) {
            // $flight->$key = $value;
        // }
        
        $flight->save();

        return $this->ok("Petición completada con éxito",[
            'data' => [
                // 'data' => $school,
                $request->all()
            ],
        ]);
    }
}
