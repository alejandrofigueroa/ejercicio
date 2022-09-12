<?php

namespace App\Http\Controllers;

use App\Models\Asignacione;
use App\Models\Cooperante;
use App\Models\Proyecto;
use App\Http\Requests\AsignacionRequest;
//use Barryvdh\DomPDF\PDF as PDF;
use Exception;
use Illuminate\Support\Facades\App;

class AsignacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaciones = Asignacione::join('cooperantes','cooperantes.id','=','asignaciones.cooperante_id')
                            ->join('proyectos','proyectos.id','=','asignaciones.proyecto_id')
                            ->select('asignaciones.id','cooperantes.nombre_cooperante','proyectos.nombre_proyecto','asignaciones.monto', 'asignaciones.fecha_asignacion')
                            ->get();

        return view('asignaciones.index', compact('asignaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyectos = Proyecto::where('estado', 0)->pluck('nombre_proyecto', 'id');
        $cooperantes = Cooperante::pluck('nombre_cooperante', 'id');

        $asignacione = new Asignacione();
        return view('asignaciones.create', compact('asignacione', 'proyectos', 'cooperantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AsignacionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsignacionRequest $request)
    {
        try{
            if(Asignacione::create($request->validated())){
                return redirect()->route('asignaciones.index')->with('success', 'Asignación guardada exitosamente');
            }
        }catch(Exception $e){
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignacione  $asignacione
     * @return \Illuminate\Http\Response
     */
    public function show(Asignacione $asignacione)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignacione  $asignacione
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignacione $asignacione)
    {
        $proyectos = Proyecto::where('estado', 0)->orWhere('id', $asignacione->proyecto_id)->pluck('nombre_proyecto', 'id');
        $cooperantes = Cooperante::pluck('nombre_cooperante', 'id');

        return view('asignaciones.edit', compact('asignacione', 'proyectos', 'cooperantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\AsignacionRequest  $request
     * @param  \App\Models\Asignacione  $asignacione
     * @return \Illuminate\Http\Response
     */
    public function update(AsignacionRequest $request, Asignacione $asignacione)
    {
        try{
            if($asignacione->update($request->validated())){
                return redirect()->route('asignaciones.index')->with('success','Asignación editada exitosamente');
            }
        }catch(Exception $e){
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignacione  $asignacione
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignacione $asignacione)
    {
        
        Asignacione::find($asignacione->id)->delete();

        return redirect()->route('asignaciones.index')->with('success', 'Asignación eliminada exitosamente.');

    }

    public function generarReporte($cooperante_id)
    {

        $cooperante = Cooperante::where('id','=', $cooperante_id)->first();

        $asignacion_cooperante = Asignacione::join('cooperantes','cooperantes.id','=','asignaciones.cooperante_id')
                            ->join('proyectos','proyectos.id','=','asignaciones.proyecto_id')
                            ->select('asignaciones.id','cooperantes.nombre_cooperante','proyectos.nombre_proyecto','asignaciones.monto', 'asignaciones.fecha_asignacion')
                            ->where('cooperantes.id', '=', $cooperante_id)
                            ->get();

        $suma_total_asignacion = Asignacione::where('cooperante_id','=', $cooperante_id)->sum('monto');
  
        $data = [
            'asignaciones_cooperante' => $asignacion_cooperante,
            'cooperante' => $cooperante,
            'suma_total_asignacion' => $suma_total_asignacion
        ]; 
        
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('reportes.total_asignado', $data);
     
        return $pdf->stream('total_asignados.pdf');
    }

}
