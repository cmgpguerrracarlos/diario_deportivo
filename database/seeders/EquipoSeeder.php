<?php

namespace Database\Seeders;

use App\Models\Equipo as ModelsEquipo;
use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsEquipo::factory(15)->create();
    }
}
