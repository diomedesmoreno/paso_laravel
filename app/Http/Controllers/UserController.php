<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\School;
use App\Models\SchoolUser;
use App\Http\Requests\CreateUser;
use App\Http\Requests\SignUp;
use Carbon\Carbon;
use DateTime;


class UserController extends Controller
{
    public function __construct(){
        // $this->middleware('auth:api');
    }

    public function table(){
        $result = User::with("schools")->get();
        // dd($result);
        return $this->ok("Petición completada con éxito",['data' => $result]);
    }
    
    public function details($id){
        $user = User::find($id);
        
        return $user;
    }

    public function store(Request $request){
        $userId = User::create([
            'name'          => $request->input('fullName'),
            'email'         => $request->input('email'),
            'password'      => $request->input('id') == null? Hash::make('password'):$request->input('password'),
            'birthday'      => $request->input('birthday'),
            'gender'        => $request->input('gender'),
            'status'        => 'A'
        ]);
        // SchoolUser::create([
        //     'user_id'   => $userId,
        //     'school_id'   => Auth::user()->schoolActive(),
        // ]);
        return $this->ok("Usuario creado con éxito",$request);
    }

    public function update(Request $request,$id){
        $user = User::find($id);
        // dd($request->input('birthday'));
        $date = Carbon::parse($request->input('birthday'));
        $fecha1 = $date->format('Y-m-d');
      
        $user->name = $request->input('fullName');
        $user->email = $request->input('email');
        $user->birthday = $fecha1;
        $user->gender = $request->input('gender');
        // $user->status = $request->input('status');
        
        $user->save();

    }

    public function inactive($id){

    }

}
