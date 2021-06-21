<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\Editor;
use App\Models\Normal;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Usuario::create([
            'username' => 'pablo.suarez',
            'nombre' => 'Pablo',
            'apellido' => 'Suárez',
            'fNacimiento' => '1996-02-15',
            'email' => 'pablo.suarez.urrutia@gmail.com',
            'password' => Hash::make('123456789'),
        ])->assignRole('Admin');
        Administrador::create([
            'administrador_id' => $user->id,
            'confirmado' => true,
        ]);

        $user = Usuario::create([
            'username' => 'carlos.guerra',
            'nombre' => 'Carlos',
            'apellido' => 'Guerra',
            'fNacimiento' => '1998-08-26',
            'email' => 'carlos.guerra@gmail.com',
            'password' => Hash::make('123456789'),
        ])->assignRole('Editor');
        Editor::create([
            'editor_id' => $user->id,
            'confirmado' => true,
        ]);

        $user = Usuario::create([
            'username' => 'eugenio.perdomo',
            'nombre' => 'Eugenio',
            'apellido' => 'Perdomo',
            'fNacimiento' => '1999-04-16',
            'email' => 'eugenio.perdomo@gmail.com',
            'password' => Hash::make('123456789'),
        ])->assignRole('Normal');
        Normal::create([
            'normal_id' => $user->id,
        ]);
    }
}
