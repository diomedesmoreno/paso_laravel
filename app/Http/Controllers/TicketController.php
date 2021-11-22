<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as Controller;
use Illuminate\Http\Request;

use App\Models\Ticket;

class TicketController extends Controller
{
    //
    public function store(Request $request){
        $ticket = Ticket::create([
            'passengerId'          => $request->input('passengerId'),
            'countryToId'   => $request->input('countryToId'),
            'flightId'      => $request->input('flight'),
            'status'        => 'A'
        ]);

        return $this->ok("Petición completada con éxito",[ 
            'data' => [
                'data'=> $result,
                $result->all()
                ]
        ]);
    }

    public function update(Request $request, $id){
        $ticket = Ticket::find($id);

        foreach ($request->all() as $key => $value) {
            $ticket->$key = $value;
        }
        
        $ticket->save();

        return $this->ok("Petición completada con éxito",[
            'data' => [
                'data' => $ticket,
                $request->all()
            ],
        ]);
    }
}
