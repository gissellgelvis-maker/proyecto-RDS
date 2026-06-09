<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class FuncionesCargoTest extends TestCase
{
    use RefreshDatabase;

    private $headers;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        $token = $user->createToken('test-token')->plainTextToken;

        $this->headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
    }

    private function crearCargo()
    {
        $response = $this->postJson('/api/cargos', [
            'nombre_cargo' => 'Gerente',
            'descripcion' => 'Cargo de gerencia'
        ], $this->headers);
        return $response->json('id_cargo');
    }

    public function test_crear_funcion()
    {
        $id_cargo = $this->crearCargo();

        $response = $this->postJson('/api/funciones-cargo', [
            'descripcion_funcion' => 'Supervisar personal',
            'estado' => 'activo',
            'id_cargo' => $id_cargo
        ], $this->headers);

        $response->assertStatus(201);
    }

    public function test_listar_funciones()
    {
        $response = $this->getJson('/api/funciones-cargo', $this->headers);
        $response->assertStatus(200);
    }

    public function test_ver_una_funcion()
    {
        $id_cargo = $this->crearCargo();

        $funcion = $this->postJson('/api/funciones-cargo', [
            'descripcion_funcion' => 'Supervisar personal',
            'estado' => 'activo',
            'id_cargo' => $id_cargo
        ], $this->headers);

        $id = $funcion->json('id_funcion');
        $response = $this->getJson('/api/funciones-cargo/' . $id, $this->headers);
        $response->assertStatus(200);
    }

    public function test_actualizar_funcion()
    {
        $id_cargo = $this->crearCargo();

        $funcion = $this->postJson('/api/funciones-cargo', [
            'descripcion_funcion' => 'Supervisar personal',
            'estado' => 'activo',
            'id_cargo' => $id_cargo
        ], $this->headers);

        $id = $funcion->json('id_funcion');

        $response = $this->putJson('/api/funciones-cargo/' . $id, [
            'descripcion_funcion' => 'Coordinar reuniones',
            'estado' => 'inactivo',
            'id_cargo' => $id_cargo
        ], $this->headers);

        $response->assertStatus(200);
    }

    public function test_eliminar_funcion()
    {
        $id_cargo = $this->crearCargo();

        $funcion = $this->postJson('/api/funciones-cargo', [
            'descripcion_funcion' => 'Supervisar personal',
            'estado' => 'activo',
            'id_cargo' => $id_cargo
        ], $this->headers);

        $id = $funcion->json('id_funcion');

        $response = $this->deleteJson('/api/funciones-cargo/' . $id, $this->headers);
        $response->assertStatus(200);
    }
}
