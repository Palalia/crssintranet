<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Campus;
use App\Models\Cliente;
use App\Models\Expediente;
use App\Models\Estado;
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
        //foreach (Campus::pluck('nombre')->all() as $unidad)
            $campus=Campus::pluck('nombre','nombre');
        //foreach (Cliente::pluck('nombre')->all() as $unidad)
            $clientes=Cliente::pluck('nombre','nombre');
        //foreach (Role::pluck('name')->all() as $unidad)
            $puestos=Role::pluck('name','name');
        //foreach(DB::table('estados')->pluck('nombre')->all() as $estado)
            $estados=DB::table('estados')->pluck('nombre','nombre');        
        return view('prospectos.registrar',compact('campus','clientes','puestos','estados'));
    }
    public function store(Request $request)
    {
        Log::debug($request->all());
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
        //$input=$request->all();
        try {
            $cliente=Cliente::where('nombre',$request->input('cliente'))->first();
            $campus=Campus::where('nombre',$request->input('campus'))->first();
            $puesto=Role::where('name',$request->input('puesto'))->first();
           
            $estado=DB::table('estados')
                        ->where('nombre',$request->input('estado'))
                        ->first();
            $estado=json_decode(json_encode($estado), true);
            $estado=$estado['id'];
            $prospecto = Expediente::create([
            'nombre' =>$request->input('nombre'),            
            'apellido_paterno' =>$request->input('appaterno'),
            'apellido_materno' =>$request->input('apmaterno'),
            'fecha_nacimiento' =>$request->input('fechanacimiento'),
            'idestado'=>$estado,
            'edad' =>$request->input('edad'),
            'curp' =>$request->input('CURPPG'),
            'nacionalidad'=>$request->input('nacionalidad'),
            'sueldo_diario' =>$request->input('sueldodiario'),
            'foto' =>$request->input('imagen'),
            'cuip'=>$request->input('cuip'),
            'horario'=>$request->input('horario'),
            'status'=>'prospecto',
            'idcliente' =>$cliente->id,
            'idcampus'=>$campus->id,
            'idpuesto'=>$puesto->id,
            ]);
        }catch (\Throwable $th) {
            throw $th;
        }
        return response()->json(["message","ok"],200);  
    }
}
