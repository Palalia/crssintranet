<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userprueba extends Model
{
    protected $table='user_prueba';
    protected $guarded= [];
    use HasFactory;
    public $timestamps = false;
}
