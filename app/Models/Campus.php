<?php
    
namespace App\Models;
use App\Models\Expediente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
class Campus extends Model
{   
    use HasFactory;
    protected $table = 'campus';
    protected $guarded= []; 
    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'idcliente');
    } 
}    
