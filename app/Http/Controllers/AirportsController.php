<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as Controller;
use Illuminate\Http\Request;

use App\Models\Airports;

class AirportsController extends Controller
{
    //
    public function table()
    {
        $result = Airports::with("countries")->get();
        return $this->ok("Petición completada con éxito",['data' => $result]);
    }
    public function store(Request $request)
    {
        $airports = Airports::create([
            'name'          => $request->input('name'),
            'countries_id'   => $request->input('countries_id'),
            'created_by'        => 1,
        ]);

        return $this->ok("Petición completada con éxito",[
            'data' => [
                'data' => $airports,
                $request->all()
            ],
        ]);
    }
    public function show($id)
    {
        $airports = Airports::find($id);

        if (!empty($airports)) {
            return $this->ok("Muestra de detalle",['data' => $airports]);
        }

        return $this->ok("Este registro no tiene detalle",$request);
    }
    public function update(Request $request, $id)
    {
        $airports = Airports::find($id);

        foreach ($request->all() as $key => $value) {
            $airports->$key = $value;
        }
        
        $airports->save();

        return $this->ok("Petición completada con éxito",[
            'data' => [
                // 'data' => $school,
                $request->all()
            ],
        ]);
    }
}
