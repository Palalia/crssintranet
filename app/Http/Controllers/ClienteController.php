<?php
namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Campus;
class ClienteController extends Controller
{
    public function index(){
        $clientes=Cliente::paginate(5);
        return view('clientes.index',compact('clientes'));
    }
    public function create(){
        return view('clientes.form');
    }
    public function store(Request $request ){
        $this->validate($request,[
            'nombre'=>'required|unique:clientes,nombre'
        ]);
        try {
            unset($request['btn_enviar']);
            $newCliente=Cliente::create($request->all());
            if($newCliente){
                return $this->index();
            }
        }catch (\Throwable $th) {
            throw $th;
        }
    }
    public function edit($id){
        if($cliente=Cliente::find($id)){
        return view('clientes.form',compact('cliente'));
        }else{
            return view('clientes.index',compact('errors'));
        }     
    }
    public function update(Request $request, $id){
        Log::debug($request);
        if($cliente=Cliente::find($id)){
            $this->validate($request,[
                'nombre'=>'required|unique:clientes,nombre'
            ]);
            unset($request['btn_enviar']);
            $cliente->update($request->all());
        }
        
        return $this->index();
    }
    public function verCampus($id){
        $campuses=Campus::where('idcliente',$id)->get();
        Log::debug($campuses);
        return view('clientes.campusClientes',compact('campuses'));
    }
    public function show(){
        Log::debug('algo');
    }
    public function destroy($id)
    {
        try{
        Cliente::find($id)->delete();
        }catch(\Throwable $th){
            Log::debug($th);
        }
        ///verificar $id
        return redirect()->route('clientes.index');
    }
}