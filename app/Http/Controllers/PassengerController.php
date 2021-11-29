<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Passenger;

class PassengerController extends Controller
{
    //
    public function table(){
        $result = Passenger::get();
        return $this->ok("Petición completada con éxito",['data' => $result]);
    }
    
    public function details($id){
        $passenger = Passenger::find($id);
        return $passenger;
    }

    public function store(Request $request){
        $userId = Passenger::create([
            'name'          => $request->input('name'),
            'lastname'        => $request->input('lastname'),
            'email'         => $request->input('email'),
            'password'      => $request->input('id') == null? Hash::make('password'):$request->input('password'),
            'birthday'      => $request->input('birthday'),
            // 'status'        => 'A'
        ]);
        return $this->ok("Usuario creado con éxito",$request);
    }

    public function update(Request $request,$id){
        $user = Passenger::find($id);
        // dd($request->input('birthday'));
        $date = Carbon::parse($request->input('birthday'));
        $fecha1 = $date->format('Y-m-d');
      
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->birthday = $fecha1;
        // $user->status = $request->input('status');
        
        $user->save();

    }
}
