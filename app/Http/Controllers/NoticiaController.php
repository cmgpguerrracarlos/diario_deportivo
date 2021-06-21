<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administrador;
use App\Models\Editor;
use App\Models\Noticias;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class NoticiaController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('es');
    }

    public function index()
    {
        $noticias = Noticias::orderBy('updated_at', 'desc')->paginate(45);
        return view('noticias.index', compact("noticias"));
    }

    public function listaNoticias()
    {
        $noticias = Noticias::orderBy('updated_at', 'desc')->paginate(45);
        return view('noticias.lista', compact("noticias"));
    }

    public static function buscarNoticia($busqueda){
        $noticias = Noticias::where("tituloNoticia","LIKE","%$busqueda%")->get();
        return $noticias;
    }

    public function create()
    {
        return view('noticias.create');
    }

    public function store(Request $request)
    {
        $nota = new Noticias;
        $nota->tituloNoticia = $request->input('tituloNoticia');
        $nota->copeteNoticia = $request->input('copeteNoticia');
        $nota->cuerpoNoticia = $request->input('cuerpoNoticia');
        $nota->tipoNoticia = $request->input('tipoNoticia');
        $nota->cantVisual = 0;
        $nota->id_creador = $request->input('id_creador');

        if ($request->file('direccion')) {
            $url = Storage::put('posts', $request->file('direccion'));
            $nota->direccion = $url;
        }

        $request->validate([
            'tituloNoticia' => 'required',
            'copeteNoticia' => 'required',
            'cuerpoNoticia' => 'required',
            'tipoNoticia' => 'required'
        ]);

        $nota->save();
        return redirect()->route('noticias.index')
            ->with('success', 'Se creo la noticia con exito.');
    }

    public function show($id)
    {
        $noticia = Noticias::where('id', $id)->first();
        Noticias::find($id)->increment('cantVisual', 1);
        $noticiaUpdateTime = $noticia->updated_at;
        Noticias::where('id', $id)->update(['updated_at' => $noticiaUpdateTime]);
        $listaRelacionada = Noticias::where([
            ['tipoNoticia', $noticia->tipoNoticia],
            ['id', '<>', $id]])
            ->orderBy('updated_at', 'desc')->paginate(8);
        return view('noticias.show', compact('noticia', 'listaRelacionada'));
    }

    public function edit($id)
    {
        $noticia = Noticias::where('id', $id)->first();

        return view('noticias.edit', compact('noticia'));
    }

    public function update(Request $request, $idNoticias)
    {
        $request->validate([
            'tituloNoticia' => 'required',
            'copeteNoticia' => 'required',
            'cuerpoNoticia' => 'required',
            'tipoNoticia' => 'required'
        ]);


        $nota = Noticias::where('id', $idNoticias)->first();
        $nota->tituloNoticia = $request->input('tituloNoticia');
        $nota->copeteNoticia = $request->input('copeteNoticia');
        $nota->cuerpoNoticia = $request->input('cuerpoNoticia');
        $nota->tipoNoticia = $request->input('tipoNoticia');

        if ($request->file('direccion')) {
            $url = Storage::put('posts', $request->file('direccion'));
            $nota->direccion = $url;
        }

        $nota->save();

        return redirect()->route('noticias.lista')
            ->with('success', 'Se actualizo correctamente');
    }

    public function destroy($idNoticias)
    {
        $noticias = Noticias::where('id', $idNoticias)->first();
        $noticias->delete();
        return redirect()->route('noticias.lista')
            ->with('success', 'Se elimino correctamente');
    }
}
