<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'id_empleado';

    protected $fillable = [
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'fecha_ingreso',
        'salario',
        'estado',
        'id_cargo'
    ];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'id_cargo', 'id_cargo');
    }
}