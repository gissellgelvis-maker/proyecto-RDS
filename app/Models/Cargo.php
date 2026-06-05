<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargos';
    protected $primaryKey = 'id_cargo';

    protected $fillable = [
        'nombre_cargo',
        'descripcion'
    ];

    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'id_cargo', 'id_cargo');
    }

    public function funciones()
    {
        return $this->hasMany(FuncionesCargo::class, 'id_cargo', 'id_cargo');
    }
}
