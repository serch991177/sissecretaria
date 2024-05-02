<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Oficinas;
use App\Models\User;
use Illuminate\View\View;    
use RealRashid\SweetAlert\Facades\Alert;
//Use Alert;

class OficinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $oficinas = Oficinas::all();
        return view('pages.tables')->with('oficinas',$oficinas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('oficinas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $attributes = request()->validate([
            'numero' => 'required',
            'nombre_oficina' => 'required',
            'nombre_oficina_superior' => 'required',
            'estado' =>'required'
        ]);
        $oficinas = Oficinas::create($attributes);    
        //dd($oficinas);
        Alert::success('Oficina Creada Correctamente'); 
        //alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.');

        return redirect('/tables');
    }



    /**
     * Display the specified resource.
     */
    public function show(Request $req){
        $solicitudId=$req->id;
        $solicitud = Oficinas::find($solicitudId);
        //Alert::success('Oficina Creada Correctamente'); 
        //dd($solicitud);
        return view('editaroficina', compact('solicitud'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request){   
        $id = $request->id;
        $oficinas = Oficinas::find($id);
        $attributes = request()->validate([
            'id' => 'required',
            'numero' => 'required|unique:oficinas,numero',
            'nombre_oficina' => 'required',
            'nombre_oficina_superior' => 'required',
            'estado' =>'required'
        ]);
        $oficinas->update($attributes);
        Alert::success('Oficina Actualizada Correctamente'); 
        return redirect('/tables');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }

   
}
