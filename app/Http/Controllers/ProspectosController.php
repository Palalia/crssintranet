<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ProspectosController extends Controller
{
    public function index()
    {
        return view('prospectos.registrar');
    }
    public function store(Request $request)
    {
        Log::debug($request);
        /*$validator=Validator::make($request->all(), [
            'estado'=>'required|unique:estado,nombreEstado',
            'nombre' => 'required',
            'appaterno' => 'required',
            'apmaterno' => 'required',
            'fechanacimiento' => 'required',
            'edad' => 'required|numbre',
            'CURPPG' => 'required|unique:personal,curp',
            'sueldomensual' => 'number',
            'sueldoquincenal' => 'number',
            'sueldodiario' => 'number',
            'imagen' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'numsegurosocial' => 'number',
            //Validar puesto
            'cuip' => 'number',
            'vigencia' => 'date|after:tomorrow',
            'fechaIngreso' => 'date',
        ]);*/
        if($validator->fails())
        return response()->json(['message'=>"Validation Failed",'erro'=>$validator->errors()],422);
        try {
            $user = User::create([
            'estado'=>$request->input('estado'),
            'nombre' =>$request->input('nombre'),
            'appaterno' =>$request->input('appaterno'),
            'apmaterno' =>$request->input('apmaterno'),
            'fechanacimiento' =>$request->input('fechanacimiento'),
            'edad' =>$request->input('edad'),
            'CURPPG' =>$request->input('CURPPG'),
            'sueldomensual' =>$request->input('sueldomensual'),
            'sueldoquincenal' =>$request->input('sueldoquincenal'),
            'sueldodiario' =>$request->input('sueldodiario'),
            'imagen' =>$request->input('imagen'),
            'numsegurosocial' =>$request->input('numsegurosocial'),
            'vigencia' => $request->input('vigencia'),
            'fechaIngreso' =>$request->input('fechaIngreso'),
            'vigencia' => $request->input('vigencia'),
            ]);
        }catch (\Throwable $th) {
            throw $th;
        }
        return response()->json(["message","ok"],200);  
    }
}
