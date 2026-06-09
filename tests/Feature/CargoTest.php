<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class CargoTest extends TestCase
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

    public function test_crear_cargo()
    {
        $response = $this->postJson('/api/cargos', [
            'nombre_cargo' => 'Gerente',
            'descripcion' => 'Cargo de gerencia'
        ], $this->headers);

        $response->assertStatus(201);
    }

    public function test_listar_cargos()
    {
        $response = $this->getJson('/api/cargos', $this->headers);
        $response->assertStatus(200);
    }

    public function test_ver_un_cargo()
    {
        $cargo = $this->postJson('/api/cargos', [
            'nombre_cargo' => 'Gerente',
            'descripcion' => 'Cargo de gerencia'
        ], $this->headers);

        $id = $cargo->json('id_cargo');
        $response = $this->getJson('/api/cargos/' . $id, $this->headers);
        $response->assertStatus(200);
    }

    public function test_actualizar_cargo()
    {
        $cargo = $this->postJson('/api/cargos', [
            'nombre_cargo' => 'Gerente',
            'descripcion' => 'Cargo de gerencia'
        ], $this->headers);

        $id = $cargo->json('id_cargo');
        $response = $this->putJson('/api/cargos/' . $id, [
            'nombre_cargo' => 'Director',
            'descripcion' => 'Cargo de dirección'
        ], $this->headers);

        $response->assertStatus(200);
    }

    public function test_eliminar_cargo()
    {
        $cargo = $this->postJson('/api/cargos', [
            'nombre_cargo' => 'Gerente',
            'descripcion' => 'Cargo de gerencia'
        ], $this->headers);

        $id = $cargo->json('id_cargo');
        $response = $this->deleteJson('/api/cargos/' . $id, $this->headers);
        $response->assertStatus(200);
    }
}
