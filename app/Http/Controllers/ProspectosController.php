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
        $validator=Validator::make($request->all(), [
            'estado'=>'required|',
            'nombre' => 'required',
            'appaterno' => 'required',
            'apmaterno' => 'required',
            'fechanacimiento' => 'required',
            'edad' => 'required|numbre',
  'CURPPG' => 'required',
  'sueldomensual' => 'number',
  'sueldoquincenal' => 'number',
  'sueldodiario' => 'number',
  'imagen' => 'required',
  'numsegurosocial' => 'number',
  'puesto' => 'number',
  'vigencia' => 'number',
        ]);
        if($validator->fails())
        return response()->json(['message'=>"Validation Failed",'erro'=>$validator->errors()],422);
    }
}
