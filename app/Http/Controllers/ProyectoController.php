<?php

namespace App\Http\Controllers;

use App\Models\Asignacione;
use App\Models\Proyecto;
use App\Http\Requests\ProyectoRequest;
use Exception;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::all();

        return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyecto = new Proyecto();

        return view('proyectos.create', compact('proyecto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProyectoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProyectoRequest $request)
    {
        try{
            if(Proyecto::create($request->validated())){
                return redirect()->route('proyectos.index')->with('success', 'El proyecto ha sido creado correctamente');
            }
        }catch(Exception $e){
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        return view('proyectos.edit', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProyectoRequest  $request
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(ProyectoRequest $request, Proyecto $proyecto)
    {
        try{
            if($proyecto->update($request->validated())){
                return redirect()->route('proyectos.index')->with('success','El proyecto ha sido editado correctamente');
            }
        }catch(Exception $e){
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        $total_asignaciones = Asignacione::where('proyecto_id', $proyecto->id)->count();

        if($total_asignaciones == 0){
            Proyecto::find($proyecto->id)->delete();

            return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado exitosamente.');
        }else{
            return redirect()->route('proyectos.index')->with('error', 'Tiene asignaciones, debe de eliminarlos previamente.');
        }
    }
}
