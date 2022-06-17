<?php

namespace App\Models;
use App\Models\Campus;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $table = 'personal';
    protected $fillable=['campus_id'];
    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }
}
