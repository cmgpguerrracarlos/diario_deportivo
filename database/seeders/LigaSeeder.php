<?php

namespace Database\Seeders;

use App\Models\Equipo;
use App\Models\Liga;
use Illuminate\Database\Seeder;

class LigaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ligas = Liga::factory(3)->create();
        $equipos = Equipo::all();
        foreach($ligas as $liga){
            foreach($equipos as $equipo){
                $liga->roles()->attach([$equipo->id]);
            }
        }
        
    }
}
