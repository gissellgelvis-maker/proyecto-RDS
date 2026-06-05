<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmpleadoTest extends TestCase
{
    use RefreshDatabase;

    private function crearCargo()
    {
        $response = $this->postJson('/api/cargos', [
            'nombre_cargo' => 'Gerente',
            'descripcion' => 'Cargo de gerencia'
        ]);
        return $response->json('id_cargo');
    }

    public function test_crear_empleado()
    {
        $id_cargo = $this->crearCargo();

        $response = $this->postJson('/api/empleados', [
            'nombres' => 'Aly',
            'apellidos' => 'Star',
            'fecha_nacimiento' => '1990-01-15',
            'fecha_ingreso' => '2020-03-01',
            'salario' => 25000.00,
            'estado' => 'activo',
            'id_cargo' => $id_cargo
        ]);

        $response->assertStatus(201);
    }

    public function test_listar_empleados()
    {
        $response = $this->getJson('/api/empleados');
        $response->assertStatus(200);
    }

    public function test_ver_un_empleado()
    {
        $id_cargo = $this->crearCargo();

        $empleado = $this->postJson('/api/empleados', [
            'nombres' => 'Aly',
            'apellidos' => 'Star',
            'fecha_nacimiento' => '1990-01-15',
            'fecha_ingreso' => '2020-03-01',
            'salario' => 25000.00,
            'estado' => 'activo',
            'id_cargo' => $id_cargo
        ]);

        $id = $empleado->json('id_empleado');
        $response = $this->getJson('/api/empleados/' . $id);
        $response->assertStatus(200);
    }

    public function test_actualizar_empleado()
    {
        $id_cargo = $this->crearCargo();

        $empleado = $this->postJson('/api/empleados', [
            'nombres' => 'Aly',
            'apellidos' => 'Star',
            'fecha_nacimiento' => '1990-01-15',
            'fecha_ingreso' => '2020-03-01',
            'salario' => 25000.00,
            'estado' => 'activo',
            'id_cargo' => $id_cargo
        ]);

        $id = $empleado->json('id_empleado');
        $response = $this->putJson('/api/empleados/' . $id, [
            'nombres' => 'Aly',
            'apellidos' => 'Star',
            'fecha_nacimiento' => '1990-01-15',
            'fecha_ingreso' => '2020-03-01',
            'salario' => 30000.00,
            'estado' => 'activo',
            'id_cargo' => $id_cargo
        ]);

        $response->assertStatus(200);
    }

    public function test_eliminar_empleado()
    {
        $id_cargo = $this->crearCargo();

        $empleado = $this->postJson('/api/empleados', [
            'nombres' => 'Aly',
            'apellidos' => 'Star',
            'fecha_nacimiento' => '1990-01-15',
            'fecha_ingreso' => '2020-03-01',
            'salario' => 30000.00,
            'estado' => 'activo',
            'id_cargo' => $id_cargo
        ]);

        $id = $empleado->json('id_empleado');
        $response = $this->deleteJson('/api/empleados/' . $id);
        $response->assertStatus(200);
    }
}
