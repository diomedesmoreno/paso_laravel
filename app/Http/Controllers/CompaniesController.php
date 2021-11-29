<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as Controller;
use Illuminate\Http\Request;

use App\Models\Companies;

class CompaniesController extends Controller
{
    //
    public function table()
    {
        $result = Companies::get();
        return $this->ok("Petición completada con éxito",['data' => $result]);
    }
    public function store(Request $request)
    {
        $companies = Companies::create([
            'name'          => $request->input('name'),
            'description'   => $request->input('description'),
            'created_by'        => 1,
        ]);

        return $this->ok("Petición completada con éxito",[
            'data' => [
                'data' => $companies,
                $request->all()
            ],
        ]);
    }
    public function show($id)
    {
        $companies = Companies::find($id);

        if (!empty($companies)) {
            return $this->ok("Muestra de detalle",['data' => $companies]);
        }

        return $this->ok("Este registro no tiene detalle",$request);
    }
    public function update(Request $request, $id)
    {
        $companies = Companies::find($id);

        foreach ($request->all() as $key => $value) {
            $companies->$key = $value;
        }
        
        $companies->save();

        return $this->ok("Petición completada con éxito",[
            'data' => [
                $request->all()
            ],
        ]);
    }
}
