<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as Controller;
use Illuminate\Http\Request;

use App\Models\TypesPlanes;

class TypesPlanesController extends Controller
{
    //
    public function table()
    {
        $result = TypesPlanes::get();
        return $this->ok("Petición completada con éxito",['data' => $result]);
    }
    public function store(Request $request)
    {
        $type = TypesPlanes::create([
            'name'          => $request->input('name'),
            'description'   => $request->input('description'),
            'types_classes'      => $request->input('types_classes'),
            'created_by'        => 1,
        ]);

        return $this->ok("Petición completada con éxito",[
            'data' => [
                'data' => $type,
                $request->all()
            ],
        ]);
    }
    public function show($id)
    {
        $type = TypesPlanes::find($id);

        if (!empty($type)) {
            return $this->ok("Muestra de detalle",['data' => $type]);
        }

        return $this->ok("Este registro no tiene detalle",$request);
    }
    public function update(Request $request, $id)
    {
        $type = TypesPlanes::find($id);

        foreach ($request->all() as $key => $value) {
            $type->$key = $value;
        }
        
        $type->save();

        return $this->ok("Petición completada con éxito",[
            'data' => [
                $request->all()
            ],
        ]);
    }
}
