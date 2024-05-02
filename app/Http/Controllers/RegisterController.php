<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Oficinas;
use RealRashid\SweetAlert\Facades\Alert;


class RegisterController extends Controller
{
    public function create()
    {
        //clearstatcache();
        $oficinas = Oficinas::all();
        //dd($oficinas);
        return view('funcionarios')->with('oficinas',$oficinas);
    }

    public function store(Request $request){
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'id_oficina'=>'required',
            'apellido_paterno' => 'required',
            'apellido_materno'=>'required',
            'carnet'=>'required|unique:users,carnet',
            'celular'=>'required|min:8|max:8',
            'unidad'=>'required',
            'cargo'=>'required',
            'estado'=>'required',
            'telefono'=>'',
            'generador'=>'',
            'revisor'=>'',
            'finalizador'=>'',
            'firma'=>'required',
            'nombre_completo'=>'',
            'supervisor'=>'',
        ]);
        if($imagen = $request->file('firma')) {
            $rutaGuardarImg = 'imagenes/';
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $attributes['firma'] = "$imagenProducto";  
        }
        //dd($attributes);

        $user = User::create($attributes);
        Alert::success('Funcionario Creado Correctamente'); 

        return redirect('/user-management');
    } 
    public function show(Request $req){
        $solicitudId=$req->id;
        $solicitud = User::find($solicitudId);
        $oficinas = Oficinas::all();
        //Alert::success('Oficina Creada Correctamente'); 
        //dd($solicitud);
        return view('editarfuncionario', compact('solicitud','oficinas'));

    }

    public function roles(Request $req){
        $solicitudId=$req->id;
        //  dd($solicitudId);
        $solicitud = User::find($solicitudId);
        $oficinas = Oficinas::all();
        return view('editarrolesfuncionario', compact('solicitud','oficinas'));
    }

    public function update(Request $request){
        $id = $request->id;
        $users = User::find($id);
        $attributes = request()->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'id_oficina' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno'=>'required',
            'carnet'=>'required',
            'celular'=>'required',
            'unidad'=>'required',
            'cargo'=>'required',
            'estado'=>'required',
            'telefono'=>'',
            'generador'=>'',
            'revisor'=>'',
            'finalizador'=>'',
            'nombre_completo'=>'',

        ]);
        //dd($attributes);
        if($imagen = $request->file('firma')){
            $rutaGuardarImg = 'imagenes/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension(); 
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $attributes['firma'] = "$imagenProducto";
         }else{
            unset($attributes['firma']);
         }

        $users->update($attributes);
        Alert::success('Funcionario Actualizado Correctamente'); 
        return redirect('/user-management');

        //dd($users);
        
    }


    public function updaterol(Request $request){
        $id = $request->id;
        $users = User::find($id);
        $attributes = request()->validate([
            'id' => 'required',
            'generador'=>'',
            'revisor'=>'',
            'finalizador'=>'',
            'supervisor'=>'',
        ]);
        //dd($attributes);
        $users->update($attributes);
        Alert::success('Funcionario Actualizado Correctamente'); 
        return redirect('/user-management');

        //dd($users);
        
    }
   
}
