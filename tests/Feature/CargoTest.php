<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CargoTest extends TestCase
{
    use RefreshDatabase;

    public function test_crear_cargo()
    {
        $response = $this->postJson('/api/cargos', [
            'nombre_cargo' => 'Gerente',
            'descripcion' => 'Cargo de gerencia'
        ]);

        $response->assertStatus(201);
    }

    public function test_listar_cargos()
    {
        $response = $this->getJson('/api/cargos');
        $response->assertStatus(200);
    }

    public function test_ver_un_cargo()
    {
        $cargo = $this->postJson('/api/cargos', [
            'nombre_cargo' => 'Gerente',
            'descripcion' => 'Cargo de gerencia'
        ]);

        $id = $cargo->json('id_cargo');
        $response = $this->getJson('/api/cargos/' . $id);
        $response->assertStatus(200);
    }

    public function test_actualizar_cargo()
    {
        $cargo = $this->postJson('/api/cargos', [
            'nombre_cargo' => 'Gerente',
            'descripcion' => 'Cargo de gerencia'
        ]);

        $id = $cargo->json('id_cargo');
        $response = $this->putJson('/api/cargos/' . $id, [
            'nombre_cargo' => 'Director',
            'descripcion' => 'Cargo de dirección'
        ]);

        $response->assertStatus(200);
    }

    public function test_eliminar_cargo()
    {
        $cargo = $this->postJson('/api/cargos', [
            'nombre_cargo' => 'Gerente',
            'descripcion' => 'Cargo de gerencia'
        ]);

        $id = $cargo->json('id_cargo');
        $response = $this->deleteJson('/api/cargos/' . $id);
        $response->assertStatus(200);
    }
}
