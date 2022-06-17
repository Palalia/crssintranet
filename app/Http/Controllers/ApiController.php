<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Campus;
class ApiController extends Controller
{
    public function getCampus($cliente){
        
        $cliente=Cliente::where('nombre',$cliente)->first();
        $campus=(Campus::select('nombre')->where('cliente_id',$cliente->id)->get())->pluck('nombre');
        return $campus;    
    }
}
