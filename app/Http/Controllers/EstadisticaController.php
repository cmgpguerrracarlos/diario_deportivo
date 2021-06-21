<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\estadistica_partido;
use Illuminate\Http\Request;
use App\Models\Partido;
use Symfony\Component\Console\Input\Input;

class EstadisticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idPartido)
    {
        $partido = Partido::where('id', $idPartido)->first();
        // dd($partido);

        if ($partido->estadoPartido == "Finalizado") {
            $equipoLocal = Partido::join('estadistica_partido', 'partidos.id', '=', 'estadistica_partido.partido_id')
                ->join('equipos', 'estadistica_partido.equipo_id', '=', 'equipos.id')
                ->select('equipos.id', 'equipos.nombre')
                ->where('estadistica_partido.partido_id', $idPartido)
                ->where('estadistica_partido.estado', "Local")->first();

            $equipoVisitante = Partido::join('estadistica_partido', 'partidos.id', '=', 'estadistica_partido.partido_id')
                ->join('equipos', 'estadistica_partido.equipo_id', '=', 'equipos.id')
                ->select('equipos.id', 'equipos.nombre')
                ->where('estadistica_partido.partido_id', $idPartido)
                ->where('estadistica_partido.estado', "Visitante")->first();

            return view('administrador/partidos/crearEstadisticaPartido', compact(['equipoLocal', 'equipoVisitante', 'partido']));
        } else {
            return redirect()->route('partidos.show', $idPartido)
                ->with('estadoPartido', 'El estado de partido no permite cargar estadísticas.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idPartido, $idLocal, $idVisitante)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idPartido)
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idPartido, $idEquipo)
    {
        //

    }

    public function cargarEstadisticas(Request $request, $idPartido, $idLocal, $idVisitante)
    {
        $request->validate([
            'golesL' => 'required',
            'golesV' => 'required',
        ]);

        if (($request->Input('posesionL') + $request->Input('posesionV')) == 100) {
            $equipoEstadisticaL = estadistica_partido::where('partido_id', $idPartido)
                ->where('equipo_id', $idLocal)->first();

            $equipoEstadisticaV = estadistica_partido::where('partido_id', $idPartido)
                ->where('equipo_id', $idVisitante)->first();

            $equipoEstadisticaL->goles = $request->Input('golesL');
            $equipoEstadisticaL->posesion = $request->Input('posesionL');
            $equipoEstadisticaL->tirosTotales = $request->Input('tirosTotalesL');
            $equipoEstadisticaL->tirosPuerta = $request->Input('tirosPuertaL');
            $equipoEstadisticaL->corner = $request->Input('cornerL');
            $equipoEstadisticaL->offside = $request->Input('offsideL');
            $equipoEstadisticaL->faltas = $request->Input('faltasL');
            $equipoEstadisticaL->amarillas = $request->Input('amarillasL');
            $equipoEstadisticaL->rojas = $request->Input('rojasL');
            $equipoEstadisticaL->save();

            $equipoEstadisticaV->goles = $request->Input('golesV');
            $equipoEstadisticaV->posesion = $request->Input('posesionV');
            $equipoEstadisticaV->tirosTotales = $request->Input('tirosTotalesV');
            $equipoEstadisticaV->tirosPuerta = $request->Input('tirosPuertaV');
            $equipoEstadisticaV->corner = $request->Input('cornerV');
            $equipoEstadisticaV->offside = $request->Input('offsideV');
            $equipoEstadisticaV->faltas = $request->Input('faltasV');
            $equipoEstadisticaV->amarillas = $request->Input('amarillasV');
            $equipoEstadisticaV->rojas = $request->Input('rojasV');
            $equipoEstadisticaV->save();

            $partido = Partido::where('id', $idPartido)->first();
            $partido->estadoPartido = "Finalizado";
            $partido->save();

            return redirect()->route('partidos.show', $idPartido)
                ->with('estadistica', 'Estadística creada con éxito');
        } else {
            return redirect()->route('crearEstadistica', $idPartido)
                ->with('posesion', 'La posesion de ambos equipos debe sumar 100');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
