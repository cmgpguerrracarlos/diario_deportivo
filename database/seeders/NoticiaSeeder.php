<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Noticias as ModelsNoticia;

use Ramsey\Uuid\Type\Integer;

class NoticiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsNoticia::factory(100)->create();
    }
}
