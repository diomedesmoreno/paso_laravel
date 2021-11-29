<?php

namespace App\Http\Controllers;

use App\Models\Planes;
use App\Http\Controllers\BaseController as Controller;
use Illuminate\Http\Request;

class PlanesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = Planes::get();
        return $this->ok("Petición completada con éxito",['data' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $planes = Planes::create([
            'name'          => $request->input('name'),
            'types_planes_id'   => $request->input('types_planes_id'),
            'seating'   => $request->input('seating'),
            'created_by'        => 1,
        ]);

        return $this->ok("Petición completada con éxito",[
            'data' => [
                'data' => $planes,
                $request->all()
            ],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Planes  $planes
     * @return \Illuminate\Http\Response
     */
    public function show(Planes $planes)
    {
        //
        $planes = Planes::find($id);

        if (!empty($planes)) {
            return $this->ok("Muestra de detalle",['data' => $planes]);
        }

        return $this->ok("Este registro no tiene detalle",$request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Planes  $planes
     * @return \Illuminate\Http\Response
     */
    public function edit(Planes $planes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Planes  $planes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planes $planes)
    {
        //
        $planes = Planes::find($id);

        foreach ($request->all() as $key => $value) {
            $planes->$key = $value;
        }
        
        $planes->save();

        return $this->ok("Petición completada con éxito",[
            'data' => [
                $request->all()
            ],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Planes  $planes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Planes $planes)
    {
        //
    }
}
