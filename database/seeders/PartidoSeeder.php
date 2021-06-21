<?php

namespace Database\Seeders;

use App\Models\Equipo;
use App\Models\Partido;
use App\Models\Jugador;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PartidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partidos = Partido::factory(23)->create();
        foreach ($partidos as $partido) {
            $numero = rand(30, 70);
            if ($partido->estadoPartido == 'Finalizado') {
                $partido->rolesequipos()->attach(Equipo::all()->random()->id, [
                    "goles" => rand(0, 5),
                    "posesion" => $numero,
                    "tirosTotales" => rand(0, 50),
                    "tirosPuerta" => rand(0, 50),
                    "corner" => rand(0, 50),
                    "offside" => rand(0, 50),
                    "faltas" => rand(0, 50),
                    "amarillas" => rand(0, 50),
                    "rojas" => rand(0, 50),
                    "estado" => "Local"
                ]);

                $partido->rolesequipos()->attach(Equipo::all()->random()->id, [
                    "goles" => rand(0, 5),
                    "posesion" => 100 - $numero,
                    "tirosTotales" => rand(0, 50),
                    "tirosPuerta" => rand(0, 50),
                    "corner" => rand(0, 50),
                    "offside" => rand(0, 50),
                    "faltas" => rand(0, 50),
                    "amarillas" => rand(0, 50),
                    "rojas" => rand(0, 50),
                    "estado" => "Visitante"
                ]);

                $partido->rolesjugadores()->attach(
                    Jugador::all()->random()->id,
                    [
                        "accion" => Arr::random(["Amarilla", "Roja", "Gol", "Asistencia", "Gol en contra"]),
                        "minuto" => rand(0, 95)
                    ]
                );
            } else {
                $partido->rolesequipos()->attach(Equipo::all()->random()->id, [
                    "estado" => "Local"
                ]);

                $partido->rolesequipos()->attach(Equipo::all()->random()->id, [
                    "estado" => "Visitante"
                ]);
            }
        }
    }
}
