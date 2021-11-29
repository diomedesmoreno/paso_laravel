<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController as Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use Symfony\Component\HttpFoundation\Response;

use App\Mail\ResetPasswordMail;
use App\Models\User;
use Carbon\Carbon;


class ResetPasswordController extends Controller
{
    public function sendEmail(Request $request)
    {
        if (!$this->validateEmail($request->email)) {
            // return $this->preconditionFailed('Email does\'t found on our system');
            return $this->failedResponse();
        }

        $this->send($request->email);
        return $this->ok('Reset Email is send successfully, please check your inbox.');
        // return $this->succesomsResponse();
    }

    public function send($email)
    {
        $token = $this->createToken($email);
        Mail::to($email)->send(new ResetPasswordMail($token));
    }

    public function createToken($email)
    {
        $oldToken = DB::table('password_resets')->where('email', $email)->first();

        if ($oldToken) {
            return $oldToken->token;
        }
        $token = str_random(60);
        $this->saveToken($token, $email);
        return $token;
    }

    public function saveToken($token, $email)
    {
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
    }

    public function validateEmail($email)
    {
        return !!User::where('email', $email)->first();
    }

    public function failedResponse()
    {
        return response()->json([
            'error' => 'Este email no se encontro en nuestra base de datos'
        ], 412);
    }

    public function successResponse()
    {
        return response()->json([
            'data' => 'El correo electonico para restablecer su contraseña se envio correctamente.'
        ], Response::HTTP_OK);
    }
}
