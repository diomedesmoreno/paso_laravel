<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    private $code_ok;
    //
    public function ok($message="Petición completada con éxito",$result=[])
    {
        return $this->response($message,$result,config('const.code_http')['OK']);
    }

    public function created($message="Petición completada con éxito",$result=[])
    {
        return $this->response($message,$result,config('const.code_http')['CREATED']);
    }

    public function forbidden($message="No tiene permiso para acceder a este recurso")
    {
        return $this->response($message,[],config('const.code_http')['FORBIDDEN']);
    }

     public function preconditionFailed($message="Validación fallida",$detalleErrores=[])
    {
        return $this->response($message,$detalleErrores,config('const.code_http')['PRECONDITION_FAILED']);
    }

    public function methodNotAllowed($message="Metodo no permitido")
    {
        return $this->response($message,[],config('const.code_http')['METHOD_NOT_ALLOWED']);
    }

    public function unauthorized($message="No autorizado")
    {
        return $this->response($message,[],config('const.code_http')['UNAUTHORIZED']);
    }

    public function notFound($message="Recurso no encontrado")
    {
        return $this->response($message,[],config('const.code_http')['NOT_FOUND']); 
    }

    public function response($message="Petición completada con éxito",$result=[],$code)
    {
        $success = $code == config('const.code_http')['OK'] ? true : false ;
        
    	$response = [
            'code' => $code,
            'success' => $success,            
            'message' => $message,
        ];

        if(!empty($result))
        {
            foreach ($result as $key => $value) {
                $response[$key] = $value;
            }
        }        

        return response()->json($response, $code);
    }
}
