<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\mailController;
use DateTime;
use App\Providers\RouteServiceProvider;
use App\Models\Usuario;
use App\Models\Normal;
use App\Models\Editor;
use App\Models\Administrador;
use Carbon\Carbon;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::NOTI;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        Carbon::setLocale('es');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:usuarios'],
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'fNacimiento ' => ['nulleable', 'date'],
        ]);
    }

    protected function create(array $data)
    {
        $tipoUsuario = $data['tipoUsuario'];

        $user = Usuario::create([
            'username' => $data['username'],
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'email' => $data['email'],
            'fNacimiento' => $data['fNacimiento'],
            'password' => Hash::make($data['password']),
        ]);
        if ($tipoUsuario == 'normal') {
            $normal = Normal::create([
                'normal_id' => $user->id,
            ]);
        } elseif ($tipoUsuario == 'editor') {
            $editor = Editor::create([
                'editor_id' => $user->id,
            ]);
            $destinos = Usuario::join('administrador', 'usuarios.id', "administrador.administrador_id")
            ->where('administrador.confirmado', true)
            ->pluck("usuarios.email");
            Mail::to($destinos)->send(new mailController($user, $tipoUsuario));
        } elseif ($tipoUsuario == 'admin') {
            $admin = Administrador::create([
                'administrador_id' => $user->id,
            ]);
            $destinos = Usuario::join('administrador', 'usuarios.id', "administrador.administrador_id")
            ->where('administrador.confirmado', true)
            ->pluck("usuarios.email");
            Mail::to($destinos)->send(new mailController($user, $tipoUsuario));
        }
        $user->assignRole('Normal');
        return ($user);
    }
}
