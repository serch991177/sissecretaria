<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\TipoInforme;
use App\Models\Informe;
use App\Models\HistorialSeguimiento;
use App\Models\User;
use App\Models\Oficinas;
use App\Models\Seguimiento;

use RealRashid\SweetAlert\Facades\Alert;
use Dompdf\Dompdf;
use Dompdf\Options;
use GuzzleHttp\Client;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**consulta para recuperar solo los datos del usuario creado */
        $user_id = Auth::id();
        

        $dato = DB::table('historial_seguimiento')
            ->join('informe','informe.id','=','historial_seguimiento.id_informe_historial')
            ->join('users','users.id','=','informe.id_usuario_generador')
            ->select('informe.numero','informe.tipo_informe','informe.cite','informe.fecha_creacion','informe.estado','users.nombre_completo','historial_seguimiento.id_informe_historial')
            ->where('historial_seguimiento.id_usuarios_historial','=',$user_id)
            ->get();
        
        /**Fin consulta para recuperar solo  los datos del usuario creado*/
        return view("seguimiento")->with(['dato'=>$dato]);
    }

    public function tracking(Request $request){
        $id_informe_tracking = $request->id; 

        $seguimiento = DB::table('seguimiento')
            ->join('informe','informe.id','=','seguimiento.id_informe_seguimiento')
            ->select('seguimiento.id_informe_seguimiento','informe.numero' ,'informe.nombre_dirigido' ,'informe.tipo_informe' ,'informe.referencia' ,'informe.fecha_creacion','seguimiento.funcionario_generador','seguimiento.funcionario_destino' ,'seguimiento.estado_seguimiento' ,'seguimiento.fecha_derivacion')
            ->where('seguimiento.id_informe_seguimiento','=',$id_informe_tracking)
        ->get();

        $informe= Informe::find($id_informe_tracking);
    


        return view("seguimientoinforme")->with(['seguimiento'=>$seguimiento, 'informe'=>$informe]);
        //return view("seguimiento")->with(['dato'=>$dato]);
    }

    public function historialtramites(){
        $dato = DB::table('historial_seguimiento')
        ->join('informe','informe.id','=','historial_seguimiento.id_informe_historial')
        ->join('users','users.id','=','informe.id_usuario_generador')
        ->select('historial_seguimiento.id_informe_historial','informe.numero','informe.tipo_informe','informe.cite','informe.fecha_creacion','informe.estado','users.nombre_completo')
        ->distinct()
        ->get();
        
        return view("historialtramites")->with(['dato'=>$dato]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
