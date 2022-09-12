<?php

namespace App\Http\Controllers;

use App\Models\Asignacione;
use App\Models\Cooperante;
use App\Http\Requests\CooperanteRequest;
use Exception;

class CooperanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cooperantes = Cooperante::all();

        return view('cooperantes.index', compact('cooperantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cooperante = new Cooperante();

        return view('cooperantes.create', compact('cooperante'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CooperanteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CooperanteRequest $request)
    {
        try{
            if(Cooperante::create($request->validated())){
                return redirect()->route('cooperantes.index')->with('success', 'El cooperante ha sido creado correctamente');
            }
        }catch(Exception $e){
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cooperante  $cooperante
     * @return \Illuminate\Http\Response
     */
    public function show(Cooperante $cooperante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cooperante  $cooperante
     * @return \Illuminate\Http\Response
     */
    public function edit(Cooperante $cooperante)
    {
        return view('cooperantes.edit', compact('cooperante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CooperanteRequest  $request
     * @param  \App\Models\Cooperante  $cooperante
     * @return \Illuminate\Http\Response
     */
    public function update(CooperanteRequest $request, Cooperante $cooperante)
    {
        try{
            if($cooperante->update($request->validated())){
                return redirect()->route('cooperantes.index')->with('success','El cooperante ha sido editado correctamente');
            }
        }catch(Exception $e){
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cooperante  $cooperante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cooperante $cooperante)
    {
        $total_asignaciones = Asignacione::where('cooperante_id', $cooperante->id)->count();

        if($total_asignaciones == 0){
            Cooperante::find($cooperante->id)->delete();

            return redirect()->route('cooperantes.index')->with('success', 'Cooperante eliminado exitosamente.');
        }else{
            return redirect()->route('cooperantes.index')->with('error', 'Tiene asignaciones, debe de eliminarlos previamente.');
        }
        
    }
}
