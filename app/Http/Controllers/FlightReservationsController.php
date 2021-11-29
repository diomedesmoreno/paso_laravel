<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as Controller;
use Illuminate\Http\Request;

use App\Models\FlightReservations;

class FlightReservationsController extends Controller
{
    //
    public function table()
    {
        $result = FlightReservations::with("","")->get();
        return $this->ok("Petición completada con éxito",['data' => $result]);
    }
    public function store(Request $request)
    {
        $flight = FlightReservations::create([
            'passengersId'          => $request->input('passengersId'),
            'flightsId'   => $request->input('flightsId'),
            'travelDateFrom'      => $request->input('travelDateFrom'),
            'travelDateTo'  => $request->input('travelDateTo'),
            'created_by'        => 1,
        ]);

        return $this->ok("Petición completada con éxito",[
            'data' => [
                'data' => $flight,
                $request->all()
            ],
        ]);
    }
    public function show($id)
    {
        $flight = FlightReservations::find($id);

        if (!empty($flight)) {
            return $this->ok("Muestra de detalle",['data' => $flight]);
        }

        return $this->ok("Este registro no tiene detalle",$request);
    }
    public function update(Request $request, $id)
    {
        $flight = FlightReservations::find($id);

        foreach ($request->all() as $key => $value) {
            $flight->$key = $value;
        }
        
        $flight->save();

        return $this->ok("Petición completada con éxito",[
            'data' => [
                $request->all()
            ],
        ]);
    }
}
