<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campus;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CampusController extends Controller
{
    //index
    public function index()
    {   
        $campuses=Campus::paginate(5);
        return view('campus.index',compact('campuses'));
    }
    public function create(){
        $clientes=collect();
        $estados=collect();    
        //$clientes=Cliente::pluck('nombre','nombre'); si queremos que retorne el nombre en lugar de el id
        $clientes=Cliente::pluck('nombre','id');//retorna id
        // $estados=DB::table('estados')->pluck('nombre','nombre');retorna el nombre en lugar de el id  
        $estados=DB::table('estados')->pluck('nombre','id');        
        return view('campus.registrar',compact('clientes','estados'));
    }   
    public function store(Request $request){
        Log::debug($request);
        $this->validate($request,[
            'nombre' => 'required',
            'direccion' => 'required',
            'url_maps' => 'required|url|unique:campus,url_maps',
            'cantidad_personal'=>'required|numeric',
            'sueldo_autorizado'=>'numeric',            
            'idestado'=>'required|exists:estados,id',
            'idcliente'=>'required|exists:clientes,id'
        ]);
        try {
            unset($request['btn_enviar']);
            $newCampus=Campus::create($request->all());
            if($newCampus){
                return $this->index();
            }
        }catch (\Throwable $th) {
            throw $th;
        }
    }
    public function edit($id)
    {
       if($campus=Campus::find($id)){
        $clientes=collect();
        $estados=collect();    
        $clientes=Cliente::pluck('nombre','id');
        $estados=DB::table('estados')->pluck('nombre','id');        
        return view('campus.editar',compact('clientes','estados','campus'));
       }else{
           $errors="Error al encontrar campus";
        return view('campus.index',compact('errors'));
       }
        
    }
    public function update(Request $request,$id){
        Log::debug($request);
        if($campus=Campus::find($id)){
            if($campus->url_maps==$request['url_maps']){
              $this->validate($request,[
                'nombre' => 'required',
                'direccion' => 'required',
                'cantidad_personal'=>'required|numeric',
                'sueldo_autorizado'=>'numeric',            
                'idestado'=>'required|exists:estados,id',
                'idcliente'=>'required|exists:clientes,id'
              ]);
            }else{
                $this->validate($request,[
                    'nombre' => 'required',
                    'direccion' => 'required',
                    'url_maps' => 'required|url|unique:campus,url_maps',
                    'cantidad_personal'=>'required|numeric',
                    'sueldo_autorizado'=>'numeric',            
                    'idestado'=>'required|exists:estados,id',
                    'idcliente'=>'required|exists:clientes,id'
                  ]);
            }
            try {
                unset($request['btn_enviar']);
                if($campus->update($request->all())){
                    return $this->index();
                }
            }catch (\Throwable $th) {
                throw $th;
            }
        }
    }
    public function destroy($id)
    {
        Campus::find($id)->delete();
        ///verificar $id
        return redirect()->route('campus.index');
    }
    
}
