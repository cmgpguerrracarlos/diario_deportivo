<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Jugador;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipo::paginate(10);
        return view("administrador.equipos.lista", compact("equipos"));
    }

    public function listaEquipos()
    {
        $equipos = Equipo::paginate(10);
        return view("equipos.lista", compact("equipos"));
    }

    public static function buscarEquipo($busqueda){
        $equipos = Equipo::where("nombre","LIKE","%$busqueda%")->get();
        return $equipos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.equipos.crearEquipo');
    }

    public function listarJugadores($idEquipo)
    {
        $jugadoresLibres = Jugador::whereNull('equipo_id')->get();
        $jugadores = Jugador::join('equipos', 'jugadors.equipo_id', '=', 'equipos.id')
            ->select('jugadors.id', 'jugadors.nombre', 'jugadors.apellido', 'jugadors.fnacimiento', 'jugadors.nacionalidad', 'equipos.nombre as teamName')
            ->WhereNotNull('equipo_id')
            ->where('equipo_id', '!=', $idEquipo)
            ->get();
        $equipo = Equipo::where("id", $idEquipo)->first();
        return view("administrador.equipos.listarJugadores", compact(["jugadoresLibres", "jugadores", "equipo"]));
    }

    public function vincularJugador($idEquipo, $idJugador)
    {
        $jugador = Jugador::where('id', $idJugador)->first();
        if ($jugador->equipo_id == null) {
            $jugador->equipo_id = $idEquipo;
            $jugador->save();

            return redirect()->route('equipos.show', ['equipo' => $idEquipo])
            ->with('success', 'Se agregó el jugador al equipo correctamente');
        } else {
            $jugador->equipo_id = $idEquipo;
            $jugador->save();
            return redirect()->route('equipos.show', ['equipo' => $idEquipo])
            ->with('success', 'Se cambió al jugador de equipo correctamente');
        }
    }

    public function listarOpciones($idEquipo, $idJugador){
        $jugador = Jugador::where('id', $idJugador)->first();
        if ($jugador->equipo_id == null) {
            $equipos = Equipo::all();
        } else {
            $equipos = Equipo::where('id', '!=', $idEquipo)->paginate(10);
        }
        return view("administrador.equipos.listaOpciones", compact(["equipos", "jugador"]));
    }

    public function quitarJugador($idEquipo, $idJugador){
        echo "Hola: ".$idEquipo;
        echo "Hola2: ".$idJugador;
        $jugador = Jugador::where('id', $idJugador)->first();
        $jugador->equipo_id = null;
        $jugador->save();
        return redirect()->route('equipos.show', ['equipo' => $idEquipo])
            ->with('quitar', 'Se quitó al jugador del equipo correctamente');
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
            'nomCorto' => 'required',
            'tresLetras' => 'required'
        ]);

        Equipo::create($request->all());

        return redirect()->route('equipos.index')
            ->with('success', 'Se creo con exito el equipo.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        $jugadores = Jugador::where('equipo_id', $equipo->id)->get();
        return view('equipos.mostrarEquipo', compact(['jugadores', 'equipo']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        return view('administrador.equipos.edit', compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        $request->validate([
            'nombre' => 'required',
            'nomCorto' => 'required',
            'tresLetras' => 'required'
        ]);

        $equipo->update($request->all());

        return redirect()->route('equipos.index')
            ->with('success', 'Se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        $equipo->delete();
        return redirect()->route('equipos.index')
            ->with('success', 'Se elimino correctamente');
    }
}
