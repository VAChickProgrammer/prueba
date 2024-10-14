<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
    
    protected $table = 'cargos';

    // Especificar los campos que se pueden llenar
    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
    ];
}
