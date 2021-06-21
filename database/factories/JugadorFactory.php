<?php

namespace Database\Factories;

use App\Models\Equipo;
use App\Models\Jugador;
use Illuminate\Database\Eloquent\Factories\Factory;

class JugadorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jugador::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nombre"=>$this->faker->word(20),
            "apellido"=>$this->faker->word(20),
            "nacionalidad"=>$this->faker->word(20),
            "fnacimiento"=>$this->faker->date(),
            "equipo_id"=>Equipo::all()->random()->id
        ];
    }
}
