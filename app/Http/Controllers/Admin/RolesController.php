<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\mailConfirmacion;
use App\Models\Administrador;
use App\Models\Editor;
use App\Models\Usuario;
use App\Models\Normal;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use App\Mail\mailController;
use Illuminate\Support\Facades\Mail;


class RolesController extends Controller
{
    use HasRoles;

    public function __construct()
    {
        $this->middleware('can:roles.index');
    }

    public function index()
    {
        $editores = Editor::join('usuarios', 'editor.editor_id', '=', 'usuarios.id')
            ->select('editor.editor_id', 'usuarios.nombre')
            ->where('confirmado', false)->get();

        $administradores = Administrador::join('usuarios', 'administrador.administrador_id', '=', 'usuarios.id')
            ->select('administrador.administrador_id', 'usuarios.nombre')
            ->where('confirmado', false)->get();

        return view("roles.index", compact(["editores", "administradores"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('jugadores.edit', compact('jugador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Usuario::where('id', $id);
        $editor = Editor::where('editor_id', $id);
        $administrador = Administrador::where('administrador_id', $id);
        if ($editor->count() > 0) {
            $editor->update(['confirmado' => true]);
            $user = Usuario::where('id', $id)->first();
            $user->roles()->detach();
            $user->assignRole('Editor');
            $destinos = Usuario::join('administrador', 'usuarios.id', "administrador.administrador_id")
                ->where('administrador.confirmado', true)
                ->pluck("usuarios.email");
            Mail::to($user->email)->send(new mailConfirmacion($user, 'Editor', true));
        } else {
            if ($administrador->count() > 0) {
                $administrador->update(['confirmado' => true]);
                $user = Usuario::where('id', $id)->first();
                $user = Usuario::where('id', $id)->first();
                $user->roles()->detach();
                $user->assignRole('Admin');
            }
            Mail::to($user->email)->send(new mailConfirmacion($user, 'Administrador', true));
        }
        return redirect()->route('roles.index')
            ->with('success', 'Se confirmó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Usuario::where('id', $id);
        $editor = Editor::where('editor_id', $id);
        $administrador = Administrador::where('administrador_id', $id);
        if ($editor->count() > 0) {
            $editor->delete();
            $user = Usuario::where('id', $id)->first();
            Normal::create([
                'normal_id' => $user->id,
            ]);
            Mail::to($user->email)->send(new mailConfirmacion($user, 'Editor', false));
        } else {
            if ($administrador->count() > 0) {
                $administrador->delete();
                $user = Usuario::where('id', $id)->first();
                Normal::create([
                    'normal_id' => $user->id,
                ]);
                Mail::to($user->email)->send(new mailConfirmacion($user, 'Administrador', false));
            }
        }
        return redirect()->route('roles.index')
            ->with('success', 'Se rechazó correctamente');
    }
}
