<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuscadorController extends Controller
{
    public function buscar(Request $r){
        $busqueda = $r->search;
        $equipos = EquipoController::buscarEquipo($busqueda);
        $jugadores = JugadorController::buscarJugador($busqueda);
        $noticias = NoticiaController::buscarNoticia($busqueda);
        $ligas = LigaController::buscarLiga($busqueda);
        return view("busqueda",compact(["equipos","jugadores","noticias","ligas","busqueda"]));
    }
}
