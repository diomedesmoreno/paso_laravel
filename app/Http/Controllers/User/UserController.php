<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController as Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Requests\CreateUser;
use App\Http\Requests\SignUp;

class UserController extends Controller
{
    public function __construct(){
        // $this->middleware('auth:api');
    }

    public function table(){
        $result = User::get();
        return $this->ok("Petición completada con éxito",['data' => $result]);
    }
    
    public function details($id){
        $user = User::find($id);
        
        return $user;
    }

    public function store(Request $request){
        $request->validate([
            'name'  => 'required|string|max:50',
            'email' => 'required|unique:users|max:255',
            'password'  => 'required|min:4|max:250',
            'gender' => 'nullable'
        ]);
        // $validated = $request->validate([
        //     'name'  => 'required|string|max:50',
        //     // 'email' => 'required|email|exists:email,id',
        //     'email' => 'required|unique:users|max:255',
        //     'password'  => 'required|min:4|max:250',
        //     'gender' => 'nullable'
        // ]);
        // $request->validate([
        //     'name'  => 'required|string|max:50',
        //     // 'email' => 'required|email|exists:email,id',
        //     'password'  => 'required|min:4|max:250',
        //     'gender' => 'nullable'
        // ],$request->all());
        User::create([
            'name'          => $request->input('fullName'),
            'email'         => $request->input('email'),
            'password'      => $request->input('id') == null? Hash::make('password'):$request->input('password'),
            'birthday'      => $request->input('birthday'),
            'gender'        => $request->input('gender'),
            'status'        => 'A'
        ]);
        return $this->ok("Usuario creado con éxito",$request);
    }

    public function update(CreateUser $request,$id){
        $user = User::find($id);

        foreach ($request->all() as $key => $value) {
            $user->$key = $value;
        }
        
        $user->save();

    }

    public function inactive($id){

    }

}
