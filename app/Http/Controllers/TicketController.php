<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Ticket;
use App\Models\Passenger;

class TicketController extends Controller
{
    //
    public function store(Request $request){
        $ticket = Ticket::create([
            'passengers_id'          => $request->input('passengers_id '),
            'countries_id'   => $request->input('countries_id'),
            'flights_id'      => $request->input('flights_id'),
            'created_by'        => '1'
        ]);
        
        // $ticket = Ticket::where('countryToId',$request->input('countryToId'))->where('flightsId',$request->input('flightsId'))->count();
        // dd($ticket);

        // $ticket = TicketDetail::create([
        //     'passengerId'          => $request->input('passengerId'),
        //     'countryToId'   => $request->input('countryToId'),
        //     'flightId'      => $request->input('flight'),
        //     'ticketsid'        => $ticket->id,
        //     // 'cantidad'        => $ticket->id
        // ]);

        return $this->ok("Petición completada con éxito",[ 
            'data' => [
                'data'=> $request->all()
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

    public function saveTicket(Request $request){
        $exist = Passenger::where('email',$request->input('email'))->first();

        // dd($request->input('email'),$exist);
        // return $this->ok("Petición completada con éxito",[ 
        //     'data' => [
        //         'data'=> $exist 
        //         ]
        // ]);
        if (!empty($exist)) {
            $userId = $exist;
        } else {
            $userId = Passenger::create([
                'name'          => $request->input('name'),
                'lastname'        => $request->input('lastname'),
                'email'         => $request->input('email'),
                'password'      => $request->input('id') == null? Hash::make('1234'):$request->input('password'),
                'birthday'      => $request->input('birthday'),
                // 'status'        => 'A',
                'created_by'        => '1'
            ]);
        }


        $ticket = Ticket::create([
            'passengers_id'          =>  $userId->id,
            // 'countries_id'   => $request->input('countries_id'),
            'flights_id'      => $request->input('flights_id'),
            'status'        => 'P',
            'created_by'        => '1'
        ]);
        
        // $ticket = Ticket::where('countryToId',$request->input('countryToId'))->where('flightsId',$request->input('flightsId'))->count();
        // dd($ticket);

        // $ticket = TicketDetail::create([
        //     'passengerId'          => $request->input('passengerId'),
        //     'countryToId'   => $request->input('countryToId'),
        //     'flightId'      => $request->input('flight'),
        //     'ticketsid'        => $ticket->id,
        //     // 'cantidad'        => $ticket->id
        // ]);

        return $this->ok("Petición completada con éxito",[ 
            'data' => [
                'data'=> $request->all()
                ]
        ]);
    }
}
