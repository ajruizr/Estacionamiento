<?php

namespace App\Http\Controllers;

use App\Lugar;
use App\Horario;
use App\Estacionamiento;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarios = Horario::with('lugars:id')->paginate(10);
        return view('horarios.horarioIndex', compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lugars = Lugar::pluck('id','id');
        return view('horarios.horarioForm', compact('lugars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $horario = Horario::create($request->all());

        //Relaciona el Horario con los lugares seleccionados
        $horario->lugars()->attach($request->lugars_id);

        return redirect()->route('horario.show', $horario->id)
            ->with(['mensaje' => 'Horario creado con éxito', 'tipo' => 'alert-success']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show(Horario $horario)
    {
        return view('horarios.horarioShow', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function edit(Horario $horario)
    {
        $lugars = Lugar::pluck('id' , 'id');
        $seleccionados = $horario->lugars()->pluck('id');

        return view('horarios.horarioForm', compact('lugars', 'horario', 'seleccionados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horario $horario)
    {
        $horario->horario = $request->horario;
        $horario->save();
        $horario->lugars()->sync($request->lugars_id);

        return redirect()->route('horario.show', $horario->id)
            ->with(['mensaje' => 'Horario actualizado con éxito', 'tipo' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horario $horario)
    {
        $horario->delete();
        return redirect()->route('horario.index')
        ->with(['mensaje' => 'Horario eliminado con éxito', 'tipo' => 'alert-warning']);
    }
}
