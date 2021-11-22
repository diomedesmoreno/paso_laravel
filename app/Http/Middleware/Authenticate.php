<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Http\Controllers\BaseController as Controller;
use Closure;

class Authenticate extends Middleware
{
    // use Controller;
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
    // "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYyNTYwMTk0OSwiZXhwIjoxNjI1NjA1NTQ5LCJuYmYiOjE2MjU2MDE5NDksImp0aSI6Ik9WRjNKRHBlamVUdGVQSFciLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.Symb_tZH0yILtfpYX341nSeMBb-PA_dFqYLUCgVAvrM"
    public function handle($request, Closure $next, ...$guards)
    {
      // dd(897);
        $this->authenticate($request, $guards);

        return $next($request);
    }
    // public function handle($request, Closure $next)
    // {
        // dd(90);
    //     /*:TEMAS PENDIENTES:
    //       HAY QUE MANEJAR A CUALES ENPODINT TENDRIA UN USUARIO ACCESO SI SE LOGUEA ESTANDO EN ESTATUS=P, POR ROL.

    //       De igual forma la restrincion de un medico cuando aun no ha sido verificado como medico, ya sea automatico o por un representante de optimysa
    //      */

    //     //Si no envian los header esperados {token,screen}, o estos estan inválidos
        // if(
        //      !$request->bearerToken() 
        // //   || !vAlfaNumeric($request->bearerToken()) 
        //   )
        // {
        //     $response = [
        //         'code' => 401,
        //         'success' => "bien",            
        //         'message' => "message",
        //     ];
    
        //     // if(!empty($result))
        //     // {
        //     //     foreach ($result as $key => $value) {
        //     //         $response[$key] = $value;
        //     //     }
        //     // }        
    
        //     return response()->json($response, 401);
        //     // return $this->unauthorized("Petición no autorizada. header (token) no encontrados o inválidos");
        // }
        
    //     $condiciones = ["token"=>$request->bearerToken(),"estado"=>"A"];
    //     // $sesion = UsuarioSesion::where($condiciones)->get()->first();
    //     dd($request->bearerToken());
    //     //Si el Token es inválido
    //     // if(!$sesion)
    //     // {
    //     //     return $this->unauthorized("Petición no autorizada. Token inválido..");
    //     // }
    //     // $method = strtolower($request->method());
        

    //     //   if($method=="options")
    //     //   {
    //     //     return $next($request);
    //     //   }

    //     //   $tienePermisoParaAcceder = $this->validarPermisosEndpoint($request,$method);
          
    //     //   if($tienePermisoParaAcceder!==true)
    //     //   {
    //     //     return $tienePermisoParaAcceder;
    //     //   }

    //       //Si el token ha expirado
    //     //   if(now()->toDateTimeString() >= $sesion->fecha_expiracion)
    //     //  {
    //     //     $sesion->cerrarSesion($sesion_ha_expirado=true);
    //     //     return $this->unauthorized("Petición no autorizada. Su sesión ha expirado.");
    //     //  }  
       
    //    //Si pasa todas las validaciones anteriores, entonces iniciamos la sesión, y dejamos pasar el request
    //    Auth()->login($sesion->obtenerUsuario());
    //    return $next($request);
    // }

    // private function validarPermisosEndpoint($request,$method)
    // {
    //     //Validaciones si el usuario tiene permisos para lo que ha solicidado.        
    //     switch ($method) {
    //       case 'get':
    //         $accionSolicitud = "leer";
    //         break;

    //       case 'post':
    //         $accionSolicitud = "escribir";
    //         break;

    //       case 'put':
    //       case 'patch':
    //         $accionSolicitud = "actualizar";
    //         break;

    //       case 'delete':
    //         $accionSolicitud = "eliminar";
    //         break;

    //       default:
    //         $accionSolicitud = 'ninguno';
    //         break;
    //     }
       
    //     if(!$accionSolicitud)
    //       { return $this->methodNotAllowed("Method -{$method}- not allowed"); }
          
    //     //Excenciones
    //     // if(in_array($request->path(), $this->except))
    //     // {
    //     //   return true;
    //     // }
        
    //    $screen = $request->header('screen');
    // //    dd(90,$screen);
    // //    if(vNumberID($screen)){
    // //     $permisosPreliminares = $sesion->rol->misPermisos->where($this->screenDbKey,$screen);
    // //    }else{
    // //      $permisosPreliminares = $sesion->rol->misPermisos;
    // //    }
              
    //    $rolPermisos =  $permisosPreliminares->where($accionSolicitud,1)->all();
     
    

    //    $tienePermiso = false;
       
     
    //    if(!$rolPermisos)
    //    {
    //       return $this->forbidden("Usted no tiene permiso para acceder a este recurso.");
    //    }

    //    return true;
    // }

}
