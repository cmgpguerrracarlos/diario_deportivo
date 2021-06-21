<?php

namespace Database\Factories;

use App\Models\Partido;
use Illuminate\Database\Eloquent\Factories\Factory;
use PhpParser\Node\Stmt\Enum_;

class PartidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partido::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "estadoPartido"=>$this->faker->randomElement(['Programado', 'En_disputa','Finalizado','Aplazado']),
            "fecha"=>$this->faker->date()
        ];
    }
}
