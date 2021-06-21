<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\estadistica_partido;
use App\Models\Partido;
use App\Models\Jugador;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        Carbon::setLocale('es');
    }

    public function index()
    {
        $partidos = Partido::orderBy('fecha', 'desc')->paginate(10);
        foreach ($partidos as $partido) {
            $l = Partido::join("estadistica_partido", "partido_id", "partidos.id")->where("partido_id", $partido->id)->where("estado", "local")->first()->equipo_id;
            $v = Partido::join("estadistica_partido", "partido_id", "partidos.id")->where("partido_id", $partido->id)->where("estado", "visitante")->first()->equipo_id;
            $partido["local"] = Equipo::where("id", $l)->select("nombre", "id")->first();
            $partido["visitante"] = Equipo::where("id", $v)->select("nombre", "id")->first();
        }

        return view("administrador.partidos.lista", compact("partidos"));
    }

    public function listaPartidos()
    {
        $partidos = Partido::paginate(10);
        return view("administrador.partidos.lista", compact("partidos"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipos = Equipo::all();
        return view('administrador.partidos.crearPartido', compact('equipos'));
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
            'fecha' => 'required'
        ]);

        $partido = new partido;
        $partido->fecha = $request->input('fecha');
        $partido->estadoPartido = "Programado";
        $partido->save();

        $partidoestadistica = new estadistica_partido;
        $partidoestadistica->equipo_id = $request->input('local');
        $partidoestadistica->estado = "Local";
        $partidoestadistica->partido_id = $partido->id;
        $partidoestadistica->save();

        $partidoestadistica = new estadistica_partido;
        $partidoestadistica->equipo_id = $request->input('visitante');
        $partidoestadistica->estado = "Visitante";
        $partidoestadistica->partido_id = $partido->id;
        $partidoestadistica->save();

        return redirect()->route('partidos.index')
            ->with('success', 'Se creo con exito el partido.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Partido $partido)
    {
        if ($partido->estadoPartido == "Finalizado") {
            $estadisticaLocal = Equipo::join('estadistica_partido', 'equipos.id', '=', 'estadistica_partido.equipo_id')
                ->join('partidos', 'estadistica_partido.partido_id', '=', 'partidos.id')
                ->select(
                    'estadistica_partido.*',
                    'equipos.id as idEq',
                    'equipos.nombre',
                    'partidos.id as idPar',
                    'partidos.estadoPartido',
                    'partidos.fecha'
                )
                ->where('estadistica_partido.partido_id', $partido->id)
                ->where('estadistica_partido.estado', "Local")->first();

            $estadisticaVisitante = Equipo::join('estadistica_partido', 'equipos.id', '=', 'estadistica_partido.equipo_id')
                ->join('partidos', 'estadistica_partido.partido_id', '=', 'partidos.id')
                ->select(
                    'estadistica_partido.*',
                    'equipos.id as idEq',
                    'equipos.nombre',
                    'partidos.id as idPar',
                    'partidos.estadoPartido',
                    'partidos.fecha'
                )
                ->where('estadistica_partido.partido_id', $partido->id)
                ->where('estadistica_partido.estado', "Visitante")->first();

            $acciones = Jugador::join('accion_partido', 'jugadors.id', '=', 'accion_partido.jugador_id')
                ->join('partidos', 'accion_partido.partido_id', '=', 'partidos.id')
                ->select('accion_partido.*', 'jugadors.nombre', 'jugadors.apellido')
                ->where('accion_partido.partido_id', $partido->id)
                ->orderBy('minuto', 'asc')
                ->get();

            if ($acciones == null) {
                return view('administrador.partidos.show', compact('partido', 'estadisticaLocal', 'estadisticaVisitante'));
            } else {
                return view('administrador.partidos.show', compact('partido', 'estadisticaLocal', 'estadisticaVisitante', 'acciones'));
            }
        } else {
            return view('administrador.partidos.show', compact('partido'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Partido $partido)
    {
        return view('administrador.partidos.edit', compact('partido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partido $partido)
    {
        $request->validate([
            'estadoPartido' => 'required',
            'fecha' => 'required'
        ]);

        $partido->update($request->all());

        return redirect()->route('partidos.index')
            ->with('success', 'Se actualizo correctamente');
    }

    public function cargarEstadisticas($idPartido)
    {
        return redirect()->route('estadisticas.create', $idPartido);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partido $partido)
    {
        $estadisticaLocal = Equipo::join('estadistica_partido', 'equipos.id', '=', 'estadistica_partido.equipo_id')
            ->join('partidos', 'estadistica_partido.partido_id', '=', 'partidos.id')
            ->select(
                'estadistica_partido.id'
            )
            ->where('estadistica_partido.partido_id', $partido->id)
            ->where('estadistica_partido.estado', "Local")->first();
        $estadisticaVisitante = Equipo::join('estadistica_partido', 'equipos.id', '=', 'estadistica_partido.equipo_id')
            ->join('partidos', 'estadistica_partido.partido_id', '=', 'partidos.id')
            ->select(
                'estadistica_partido.id'
            )
            ->where('estadistica_partido.partido_id', $partido->id)
            ->where('estadistica_partido.estado', "Visitante")->first();
        $estadisticaLocal = estadistica_partido::where('id', $estadisticaLocal->id)->first();
        $estadisticaLocal->delete();
        $estadisticaVisitante = estadistica_partido::where('id', $estadisticaVisitante->id)->first();
        $estadisticaVisitante->delete();
        $partido->delete();
        return redirect()->route('partidos.index')
            ->with('success', 'Se elimino correctamente');
    }
}
