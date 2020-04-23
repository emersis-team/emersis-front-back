<?php

namespace App\Http\Controllers;

use App\Models\Novedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NovedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Paginacion de resultados
        // $novedades = Novedad::where('activo', 1)
        //                     -> orderBy('created_at', 'desc')
        //                     -> paginate(10);

        $novedades = Novedad::orderBy('activo', 'asc')
                            -> orderBy('created_at', 'desc')
                            -> paginate(10);

        return view('novedades.index', compact('novedades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novedades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Valido los campos
        $campos = request()->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
        ],[
            'titulo.required' => __('El campo <b>Título</b> es Requerido'),
            'descripcion.required' => __('El campo <b>Texto</b> es Requerido'),
        ]);

        $activo = 0;

        if(request('activo') == 'on'){
            $activo = 1;
        }

        //INSERT en la DB
        Novedad::create([
            'titulo' => $campos['titulo'],
            'descripcion' => $campos['descripcion'],
            'activo' => $activo
        ]);

        return redirect()->route('novedades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('novedades.show', ['novedad' => Novedad::findOrFail($id)]);
        //return $novedades;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('novedades.edit', ['novedad' => Novedad::findOrFail($id)]);
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
        //Valido los campos
        $campos = request()->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
        ],[
            'titulo.required' => __('El campo <b>Título</b> es Requerido'),
            'descripcion.required' => __('El campo <b>Texto</b> es Requerido'),
    ]);

        $activo = 0;

        if(request('activo') == 'on'){
            $activo = 1;
        }

        //UPDATE en la DB
        Novedad::where('id',$id)->update([
            'titulo' => $campos['titulo'],
            'descripcion' => $campos['descripcion'],
            'activo' => $activo
        ]);

        //return view('novedades.show', ['novedad' => Novedad::findOrFail($id)]);
        return redirect()->route('novedades.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $novedad = Novedad::findOrFail($id);

        if(!Novedad::destroy($id)){
            return "NO borró de la BD";
        }

        return redirect()->route('novedades.index');
    }
}
