<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController as Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePassword;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;


class ChangePasswordController extends Controller
{
    public function process(Request $request)
    {
        return $this->getPasswordResetTableRow($request)->count()> 0 ? $this->changePassword($request) : $this->tokenNotFoundResponse();
    }

    private function getPasswordResetTableRow($request)
    {
        return DB::table('password_resets')->where(['email' => $request->email,'token' =>$request->resetToken]);
    }

    private function tokenNotFoundResponse()
    {
        return $this->unauthorized('El Token o el email es invalido');
        // return response()->json(['error' => 'Token or Email is incorrect'],Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    private function changePassword($request)
    {
        $user = User::where('email',$request->email)->first();
        $user->update(['password'=>$request->password]);
        $this->getPasswordResetTableRow($request)->delete();
        return $this->created('Password Successfully Changed');
        // return response()->json(['data'=>'Password Successfully Changed'],Response::HTTP_CREATED);
    }
}
