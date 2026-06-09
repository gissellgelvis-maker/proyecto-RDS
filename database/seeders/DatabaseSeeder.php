<?php

namespace Database\Seeders;

use App\Models\Cargo;
use App\Models\FuncionesCargo;
use App\Models\Empleado;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Cargo::factory(5)->create();
        FuncionesCargo::factory(10)->create();
        Empleado::factory(10)->create();
    }
}