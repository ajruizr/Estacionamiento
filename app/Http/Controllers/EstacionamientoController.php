<?php

namespace App\Http\Controllers;

use App\Estacionamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstacionamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estacionamientos =estacionamiento::all();
        return view('estacionamientos/estacionamientosIndex',compact('estacionamientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estacionamientos/estacionamientosForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        estacionamiento::create($request->all());
        return redirect()->route('estacionamiento.index');//back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estacionamiento  $estacionamiento
     * @return \Illuminate\Http\Response
     */
    public function show(Estacionamiento $estacionamiento)
    {
        return view('estacionamientos.estacionamientoShow',compact('estacionamiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estacionamiento  $estacionamiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Estacionamiento $estacionamiento)
    {
        return view('estacionamientos/estacionamientosForm',compact('estacionamiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estacionamiento  $estacionamiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estacionamiento $estacionamiento)
    {
        $estacionamiento->nombre=$request->nombre;
        $estacionamiento->lugar=$request->lugar;
        $estacionamiento->save();

        return redirect()->route('estacionamiento.show', $estacionamiento->id);//back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estacionamiento  $estacionamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estacionamiento $estacionamiento)
    {
        $estacionamiento->delete();
        return redirect()->route('estacionamiento.index');//back();
    }
}
