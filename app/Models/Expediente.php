<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Campus;
use App\Models\Cliente;
use Illuminate\Support\Facades\Log;
class Expediente extends Model
{
    use HasFactory;
    protected $guarded= [];
    public function campus()
    {
        return $this->belongsTo(Campus::class,'idcampus');
    }  
    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'idcliente');
    }  
    /*public function getCampus(){
        $idCampus = $this->idcampus;
        $campus=Campus::where('id','$idcampus')->first();
        Log::debug($campus);
        return $campus;
    }*/
}
