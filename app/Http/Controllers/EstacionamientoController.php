<?php

namespace App\Http\Controllers;

use App\Estacionamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\InfoEstacionamiento;
use App\Lugar;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class EstacionamientoController extends Controller
{
    public function __construct()
    {
        
        $this->middleware(['auth','verified'], ['only' => [
            'update',
            'create',
            'store',
            'edit',
            'destroy' // Could add bunch of more methods too
        ]]);
    }

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
        $request->validate([
            'nombre'=> 'required|min:5|max:255',
            'lugar'=> 'required|min:5|max:255'
        ]);
        estacionamiento::create($request->all());
        return redirect()->route('estacionamiento.index')
        ->with(['mensaje' => 'Estacionamiento creado con éxito', 'tipo' => 'alert-success']);//back();
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
        $request->validate([
            'nombre'=> 'required|min:5|max:255',
            'lugar'=> 'required|min:5|max:255'
        ]);
        $estacionamiento->nombre=$request->nombre;
        $estacionamiento->lugar=$request->lugar;
        $estacionamiento->save();

        return redirect()->route('estacionamiento.show', $estacionamiento->id)
        ->with(['mensaje' => 'Estacionamiento actualizado con éxito', 'tipo' => 'alert-success']);//back();
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
        return redirect()->route('estacionamiento.index')->with(['mensaje' => 'Estacionamiento eliminado con éxito', 'tipo' => 'alert-warning']);//back();
    }

    public function infomail(Estacionamiento $estacionamiento)
    {
        //Envía correo al usuario
        Mail::to(Auth::user()->email)->send(new InfoEstacionamiento($estacionamiento));

        return redirect()->route('estacionamiento.index')->with(['mensaje' => 'Email enviado con exito', 'tipo' => 'alert-success']);
    }
}
