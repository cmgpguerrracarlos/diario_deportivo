<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Liga;
use Illuminate\Http\Request;

class LigaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ligas = Liga::paginate(10);
        return view("administrador.ligas.lista", compact("ligas"));
    }

    public function listaLigas()
    {
        $ligas = Liga::paginate(10);
        return view("ligas.lista", compact("ligas"));
    }

    public static function buscarLiga($busqueda){
        $ligas = Liga::where("nombreLiga","LIKE","%$busqueda%")->get();
        return $ligas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.ligas.crearLiga');
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
            'nombreLiga' => 'required',
            'participantes' => 'required'
            // 'sistemaDeJuego' => 'required'
        ]);
    
        Liga::create($request->all());
     
        return redirect()->route('ligas.index')
                        ->with('success','Se creo con exito la liga.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Liga  $liga
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ligas = Liga::join("equipo_liga as tabla1","tabla1.liga_id","=","id")
        ->join("equipos","tabla1.equipo_id","=","equipos.id")
        ->select("nombreLiga","participantes","sistemaDeJuego","equipo_id","nombre","nomCorto")->where("tabla1.liga_id","=",$id)->get();
        $liga=Liga::where("id",$id)->first();
        return view('administrador.ligas.show',compact(['liga',"ligas"]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Liga  $liga
     * @return \Illuminate\Http\Response
     */
    public function edit(Liga $liga)
    {
        return view('administrador.ligas.edit',compact('liga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Liga  $liga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Liga $liga)
    {
        $request->validate([
            'nombreLiga' => 'required',
            'participantes' => 'required'
            // 'sistemaDeJuego' => 'required'
        ]);
    
        $liga->update($request->all());
    
        return redirect()->route('ligas.index')
                        ->with('success','Se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Liga  $liga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Liga $liga)
    {
        $liga->delete();
        return redirect()->route('ligas.index')
                        ->with('success','Se elimino correctamente');
    }
}
