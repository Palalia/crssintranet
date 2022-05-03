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
    {   /*
        $prospectos=Expediente::paginate(5);
        return view('prospectos.index',compact('prospectos'));*/
    }
    public function create(){
        $campus=collect(); 
        $clientes=collect();
        $puestos=collect();
        $estados=collect();    
        $campus=Campus::pluck('nombre','nombre');
        $clientes=Cliente::pluck('nombre','nombre');
        $estados=DB::table('estados')->pluck('nombre','nombre');        
        $puestos=Role::pluck('name','name');
        return view('prospectos.registrar',compact('campus','clientes','puestos','estados'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'estado'=>'required|exists:estados,nombre',
            'nombre' => 'required|alpha',
            'appaterno' => 'required|alpha',
            'apmaterno' => 'required|alpha',
            'fechanacimiento' => 'required',
            'edad' => 'required|numeric',
            'CURPPG' => 'required|unique:expedientes,curp|alpha_num',
            'sueldodiario' => 'numeric',
            'imagen' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'numsegurosocial' => 'numeric',
            'puesto'=>'required|exists:roles,name',
            'cuip' => 'string|alpha_num',
            'vigencia' => 'date|after:tomorrow',
            'fechaIngreso' => 'date',
        ]);
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
            'campus_id'=>$campus->id,
            'salario' =>$request->input('salario'),
            'tipo_salario'=>'0',///implementar en el formulario
            'puesto'=>$puesto->name,
            'status'=>1,
            'nombre' =>$request->input('nombre'),            
            'apellido_paterno' =>$request->input('appaterno'),
            'apellido_materno' =>$request->input('apmaterno'),
            //'fecha_nacimiento' =>$request->input('fechanacimiento'),
            //direccion
            //municipio
            //colonia
            //estado
            //'fecha_nacimiento' =>$request->input('fechanacimiento'),
            //'edad'
            //'curp' =>$request->input('CURPPG'),
            
            //'foto' =>$request->input('imagen'),
            //'cuip'=>$request->input('cuip'),
            //'horario'=>$request->input('horario'),
            
            'idcliente' =>$cliente->id,
            
            
            ]);
        }catch (\Throwable $th) {
            throw $th;
        }
        return $this->index();  
    }
    public function show($id)
    {
        if($prospecto=Expediente::find($id)){
            $puesto=Role::find($prospecto->idpuesto);
            $estado=DB::table('estados')->select('nombre')->find($prospecto->idestado);     
            $estado=$estado->nombre;
            return view('prospectos.showProspecto',compact('prospecto','puesto','estado'));
        }else{
            return response()->json("user not found",404);
        }
    }
    public function edit($id)
    {
       if($prospecto=Expediente::find($id)){
        $campus=collect(); 
        $clientes=collect();
        $puestos=collect();
        $estados=collect();    
        $campus=Campus::pluck('nombre','nombre');
        $clientes=Cliente::pluck('nombre','nombre');
        $estados=DB::table('estados')->pluck('nombre','nombre');        
        $puestos=Role::pluck('name','name');
        return view('prospectos.editar',compact('prospecto','campus','clientes','puestos','estados'));
       }else{
        return view('campus.editar',compact('clientes','estados',));
       }
        
    }
    public function update(Request $request, $id){
        $prospecto = Expediente::find($id);
        if($request['CURPPG']==$prospecto->curp){
            $this->validate($request,[
                'estado'=>'required|exists:estados,nombre',
                'nombre' => 'required|alpha',
                'appaterno' => 'required|alpha',
                'apmaterno' => 'required|alpha',
                'fechanacimiento' => 'required',
                'edad' => 'required|numeric',
                'CURPPG' => 'required|alpha_num',
                'sueldodiario' => 'numeric',
                'imagen' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
                'numsegurosocial' => 'numeric',
                'puesto'=>'required|exists:roles,name',
                'cuip' => 'string|alpha_num',
                'vigencia' => 'date|after:tomorrow',
                'fechaIngreso' => 'date',
            ]);
        }else{
            $this->validate($request,[
                'estado'=>'required|exists:estados,nombre',
                'nombre' => 'required|alpha',
                'appaterno' => 'required|alpha',
                'apmaterno' => 'required|alpha',
                'fechanacimiento' => 'required',
                'edad' => 'required|numeric',
                'CURPPG' => 'required|unique:expedientes,curp|alpha_num',
                'sueldodiario' => 'numeric',
                'imagen' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
                'numsegurosocial' => 'numeric',
                'puesto'=>'required|exists:roles,name',
                'cuip' => 'string|alpha_num',
                'vigencia' => 'date|after:tomorrow',
                'fechaIngreso' => 'date',
            ]);
        }

        DB::beginTransaction();
        try {
            //$prospecto->update($request->all());
            $cliente=Cliente::where('nombre',$request->input('cliente'))->first();
            $campus=Campus::where('nombre',$request->input('campus'))->first();
            $puesto=Role::where('name',$request->input('puesto'))->first();
            $estado=DB::table('estados')
            ->where('nombre',$request->input('estado'))
            ->first();
            $estado=json_decode(json_encode($estado), true);
            $estado=$estado['id'];
            $prospecto->update([
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
            DB::commit();
            return $this->index();           
        }catch(\Throwable $th){
            DB::rollback();
            return $this->index();    
        }

    }
    public function destroy($id)
    {
        $prospecto=Expediente::find($id);
        if(!$prospecto){
            return $this->index();
        }
        $prospecto->delete();
             return $this->index();
         
    }   
}
