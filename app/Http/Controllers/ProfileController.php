<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;    
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::all();
        //dd($user);
        return view('pages.laravel-examples.user-management')->with('user',$user);
    }
    public function create()
    {
        return view('pages.profile');
    }

    public function update()
    {
            
        $user = request()->user();
        $attributes = request()->validate([
            'email' => 'required|email|unique:users,email,'.$user->id,
            'nombre_completo' => 'required',
            'celular'=>'required',
           // 'phone' => 'required|max:10',
            //'about' => 'required:max:150',
            //'location' => 'required'
        ]);

        auth()->user()->update($attributes);
        //dd(auth()->user()->update($attributes));
        //dd($user);
        return back()->withStatus('Perfil Actualizado Correctamente');
    
    }

    public function updatePassword(Request $request){
        //dd($request->old_password);
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
        return back()->with("error", "La contraseña Antigua no coincide!");
        }
        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", "Cambio de Contraseña Correcta !");

    }

    public function resetPassword(Request $request){
        
        $id_actualizar = $request->id_usuario;
        $category= User::find($id_actualizar);
       
        #Update the new Password
        User::whereId($id_actualizar)->update([
            'password' => Hash::make($category->carnet)
        ]);
        
        Alert::success('Contraseña Restaurada Correctamente'); 
        return redirect('/user-management');
    }
}
