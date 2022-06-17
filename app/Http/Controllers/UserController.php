<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\userprueba;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
 public function index () {
   return view("users");
   
  }                                    

  public function store(Request $request ) {


      //validacion
      $request->validate([
        'nombre'=>'required|regex:/^[a-zA-Z\s]+$/u',
        'apellidoP'=>'required|regex:/^[a-zA-Z\s]+$/u',                                         
        'apellidoM'=>'required|regex:/^[a-zA-Z\s]+$/u',
        'edad'=>'integer|required|min:1|max:99'
      ]);



    Log::debug($request);
    $result=userprueba::create(['nombre'=>$request->nombre, 'ApellidoP'=>$request-> apellidoP, 'ApellidoM'=>$request->apellidoM, 'edad'=>$request->edad]);


  }
 
  
 public function VerRegistros () {
  $registro= userprueba::all();
  return view ('view_user', compact('registro'));

 }


 
 
 public function show(Request $request) {

  $consul= userprueba::where('id',$request->id)->first();

   return view('EditarUser', compact('consul'));

   

 }
 
 public function actUser(Request $request){
   Log::debug($request);
  

  
  
   /*
    $registro=userprueba::find($request->id);
    $registro->nombre=$request->nombre;
    $registro->save();
    //manera mas lenta 
    //save si no no guarda los cambios
    */

    /*$result=userprueba::where('id',$request->id)->update([
      'nombre'=>$request->nombre,
      'ApellidoP'=>$request-> apellidoP,
      'ApellidoM'=>$request->apellidoM,
      'edad'=>$request->edad]);*/
      $registro=userprueba::find($request->id);
      $registro->update(
        ['nombre'=>$request->nombre,
        'ApellidoP'=>$request-> apellidoP,
        'ApellidoM'=>$request->apellidoM,
        'edad'=>$request->edad]
      );
    //obtener el registro 
    //editarlo
 }

 public function destroy(Request $variable){
   Log::debug("dentro de destroy");
  $result=userprueba::find($variable->id)->delete(); // borrar registros
  
 }
 
public function delete(Request $request){
  return view('eliminarUsuarios');
  

}






}


