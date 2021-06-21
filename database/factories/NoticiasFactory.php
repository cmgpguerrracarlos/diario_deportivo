<?php

namespace Database\Factories;

use App\Models\Noticias;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoticiasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Noticias::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "tituloNoticia"=>$this->faker->word(20),
            'copeteNoticia' => $this->faker->sentence(2),
            'cuerpoNoticia' => $this->faker->text(255),
            'cantVisual' => $this->faker->numberBetween($min = 10, $max = 1000),
            'tipoNoticia' => $this->faker->randomElement(['Analisis', 'DatoColor','Fichaje','Información']),
            //'direccion' => 'hardcodeo la url a la carpeta public/posts/',
            'id_creador' => '1',
        ];
    }
}
