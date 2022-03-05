<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Campus;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
class ProspectosController extends Controller
{
    public function index()
    {   
        $campus=collect(); 
        $clientes=collect();
        $puestos=collect();
        $estados=collect();    
        foreach (Campus::pluck('nombre')->all() as $unidad)
            $campus->push($unidad);
        foreach (Cliente::pluck('nombre')->all() as $unidad)
            $clientes->push($unidad);
        foreach (Role::pluck('name')->all() as $unidad)
            $puestos->push($unidad);
        foreach(DB::table('estados')->pluck('nombre')->all() as $estado)
            $estados->push($estado);        
        return view('prospectos.registrar',compact('campus','clientes','puestos','estados'));
    }
    public function store(Request $request)
    {
        Log::debug($request);
      $this->validate($request,[
            'estado'=>'required|exists:estados,nombre',
            'nombre' => 'required',
            'appaterno' => 'required',
            'apmaterno' => 'required',
            'fechanacimiento' => 'required',
            'edad' => 'required|numeric',
            'CURPPG' => 'required|unique:expedientes,curp',
            'sueldodiario' => 'numeric',
            'imagen' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'numsegurosocial' => 'numeric',
            'puesto'=>'required|exists:roles,name',
            'cuip' => 'string',
            'vigencia' => 'date|after:tomorrow',
            'fechaIngreso' => 'date',
        ]);
        $input=$request->all();
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
