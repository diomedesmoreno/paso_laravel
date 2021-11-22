<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as Controller;
use App\Models\School;
use App\Models\User;

class FileController extends Controller
{
    public function uploadimage(Request $request)
    {
      //check file
      if ($request->hasFile('image'))
      {
            $file      = $request->file('image');
            $filename  = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture   = date('His').'-'.$filename;
            //move image to public/img folder
            $file->move(public_path('img'), $picture);

            $school = School::find($request->id);
          
            $school->logo_url = $picture;

            $school->save();

            return $this->ok("Petición completada con éxito",["data" => $picture]);
      } 
      else
      {
            return $this->ok("Petición completada con éxito pero no existe un archivo");
      }
    }
    
    public function uploadProfileImagen(Request $request)
    {
      //check file
      if ($request->hasFile('image'))
      {
            $file      = $request->file('image');
            $filename  = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture   = date('His').'-'.$filename;
            //move image to public/img folder
            $file->move(public_path('profile'), $picture);

            $user = User::find($request->id);
          
            $user->logo_url = $picture;

            $user->save();

            return $this->ok("Petición completada con éxito",["data" => $picture]);
      } 
      else
      {
            return $this->ok("Petición completada con éxito pero no existe un archivo");
      }
    }
}
