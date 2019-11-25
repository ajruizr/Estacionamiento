<?php

namespace App\Http\Controllers;

use App\Lugar;
use Illuminate\Http\Request;
use App\Estacionamiento;

class LugarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lugars = Lugar::all();
        return view('lugars.lugarIndex',compact('lugars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estacionamientos= Estacionamiento::pluck('nombre','id');
        return view('lugars.lugarForm',compact('estacionamientos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Lugar::create($request->all());
        return redirect()->route('lugar.index')
        ->with(['mensaje' => 'Lugar almacenado con éxito', 'tipo' => 'alert-success']);//back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lugar  $lugar
     * @return \Illuminate\Http\Response
     */
    public function show(Lugar $lugar)
    {
        return view('lugars.lugarShow',compact('lugar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lugar  $lugar
     * @return \Illuminate\Http\Response
     */
    public function edit(Lugar $lugar)
    {
        $estacionamientos= Estacionamiento::pluck('nombre','id');
        return view('lugars.lugarForm',compact('lugar'),compact('estacionamientos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lugar  $lugar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lugar $lugar)
    {
        $lugar->estacionamiento_id=$request->estacionamiento_id;
        $lugar->discapacitado=$request->discapacitado;
        $lugar->disponible=$request->disponible;
        $lugar->save();

        return redirect()->route('lugar.show', $lugar->id)
        ->with(['mensaje' => 'Lugar actualizado con éxito', 'tipo' => 'alert-success']);//back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lugar  $lugar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lugar $lugar)
    {
        $lugar->delete();
        return redirect()->route('lugar.index')
        ->with(['mensaje' => 'Lugar eliminado con éxito', 'tipo' => 'alert-warning']);//back();
    }
}
