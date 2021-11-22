<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as Controller;
use Illuminate\Http\Request;

use App\Models\Flight;
// use App\Models\CourseType;
// use App\Models\TypeNews;

class FlightController extends Controller
{
    //
    public function table()
    {
        $result = Flight::get();
        return $this->ok("Petición completada con éxito",['data' => $result]);
    }
    public function store(Request $request)
    {
        $flight = Flight::create([
            'countryFrom'          => $request->input('countryFrom'),
            'countryTo'   => $request->input('countryTo'),
            'minute'      => $request->input('minute'),
            'hour'  => $request->input('hour'),
            'departuretime'      => $request->input('departuretime'),
            'arrivaltime'      => $request->input('arrivaltime'),
            'status'        => 'A'
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
        $flight = Flight::find($id);

        if (!empty($flight)) {
            return $this->ok("Muestra de detalle",['data' => $flight]);
        }

        return $this->ok("Este registro no tiene detalle",$request);
    }
    public function update(Request $request, $id)
    {
        $flight = Flight::find($id);

        foreach ($request->all() as $key => $value) {
            $flight->$key = $value;
        }
        
        $flight->save();

        return $this->ok("Petición completada con éxito",[
            'data' => [
                // 'data' => $school,
                $request->all()
            ],
        ]);
    }
}
