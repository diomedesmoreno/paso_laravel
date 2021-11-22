<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController as Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// use Auth;

use App\Models\User;
use App\Http\Requests\CreateUser;
use App\Http\Requests\SignUp;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'signup']]);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);
        if (!$token = Auth::attempt($credentials)) {
            return $this->unauthorized("La contraseña o el correo es invalido");
            // return  response()->json(['error' => 'Email or password does\'t exist'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function signup(SignUp $request)
    {
        User::create([
            'name'          => $request->input('name'),
            'email'         => $request->input('email'),
            'password'      => Hash::make($request->input('password')),
            'birthday'      => $request->input('birthday'),
            'gender'        => $request->input('gender'),
        ]);
        // return $this->ok("Usuario creado con éxito",$request);
        return $this->login($request);
    }

    public function profile()
    {
        return response()->json(Auth::user());
    }

    public function logout()
    {
        Auth::logout();

        return $this->ok('Sesión cerrar con éxito');
        // return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(Auth::refresh());
    }
    
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
            'user' => Auth::user()->name
        ]);
    }
}
