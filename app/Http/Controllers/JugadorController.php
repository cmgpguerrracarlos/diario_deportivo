<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Jugador;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class JugadorController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:jugadores.index')->only('index');
        $this->middleware('can:jugadores.create')->only('create', 'update', 'destroy');
    }

    public function index()
    {
        $jugadores = Jugador::join('equipos', 'jugadors.equipo_id', '=', 'equipos.id')
        ->select('jugadors.id', 'jugadors.nombre', 'jugadors.apellido', 'jugadors.fnacimiento', 'jugadors.nacionalidad', 'equipos.nombre as teamName')
        ->paginate(10);
        $jugadoresLibres = Jugador::whereNull('equipo_id')->paginate(10);
        return view("administrador.jugadors.lista", compact(["jugadores", "jugadoresLibres"]));
    }

    public function listaJugadores()
    {
        $jugadores = Jugador::paginate(10);
        return view("jugadors.lista", compact("jugadores"));
    }

    public static function buscarJugador($busquedas){
        $jugadores = Jugador::where("nombre","LIKE","%$busquedas%")->orwhere("apellido","LIKE","%$busquedas%")->get();
        return $jugadores;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.jugadors.crearJugador');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'fnacimiento' => 'required',
            'nacionalidad' => 'required'

        ]);

        Jugador::create($request->all());

        return redirect()->route('jugadors.index')
            ->with('success', 'Se creo con exito el jugador.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function show(Jugador $jugador)
    {
        if($jugador->equipo_id != null){
            $equipo = Equipo::where('id', $jugador->equipo_id)->first();
        }
        else {
            $equipo = null;
        }
        return view('administrador.jugadors.show', compact(['jugador', 'equipo']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function edit(Jugador $jugador)
    {
        return view('administrador.jugadors.edit', compact('jugador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jugador $jugador)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'nacionalidad' => 'required',
            'fnacimiento' => 'required'
        ]);

        $jugador->update($request->all());

        return redirect()->route('jugadors.index')
            ->with('success', 'Se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jugador $jugador)
    {
        $jugador->delete();
        return redirect()->route('jugadors.index')
            ->with('destroy', 'Se elimino correctamente');
    }
}
