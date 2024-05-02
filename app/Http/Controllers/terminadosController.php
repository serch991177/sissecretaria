<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\TipoInforme;
use App\Models\Informe;
use App\Models\User;
use App\Models\Oficinas;
use App\Models\Revisor;
use App\Models\Observaciones;
use App\Models\Terminados;
use RealRashid\SweetAlert\Facades\Alert;
use Dompdf\Dompdf;
use Dompdf\Options;
use DateTime;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class terminadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $iduser= Auth::id();
        
        $usuario_terminado = DB::table('informe')
        ->join('terminados','terminados.id_informe_terminado','=','informe.id')
        ->join('users','users.id','=','terminados.id_usuario_terminado')
        ->select()
        ->where('terminados.id_usuario_terminado','=',$iduser)
        ->orderBy('fecha_finalizacion', 'desc')
        ->get();
        //dd($usuario_terminado);
        return view('informeterminado')->with(['usuario_terminado'=>$usuario_terminado ]);
    }

    public function pdffinal(Request $request){
        $solicitudId = $request->id_informe;    
        $solicitud = Informe::find($solicitudId);

        $informe=DB::table('informe')->where('informe.id','=',$solicitudId)
            ->select('informe.id','informe.numero','informe.id_usuario_generador','informe.usuario','informe.nombre_dirigido','informe.cargo_dirigido','informe.unidad_dirigido','informe.referencia','informe.tipo_informe','informe.fecha','informe.dato_informe','informe.id_oficina','informe.oficina','informe.cite','informe.fecha_finalizacion','informe.prefijo','informe.logo','informe.cite_informes','informe.cite_comunicaciones','informe.cite_memo','informe.gestion','informe.datos_convenio','informe.pie_pagina')
            -> first(); 
        
        $fecha=DB::table('informe')->where('informe.id','=',$solicitudId)
            ->select('informe.fecha')
            ->first();    

        $fecha1 = new DateTime($fecha->fecha);
        $diasSemana = ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'];
        $meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
        $nombreDia = $diasSemana[$fecha1->format('w')];
        $nombreMes = $meses[$fecha1->format('n') - 1];
        $dia = $fecha1->format('d');
        $fechaformateada = $nombreDia . ' ' . sprintf('%d', $dia) . ' de ' . $nombreMes . ' de ' . $fecha1->format('Y');    
        $todo = Informe::all();

        $generar_qr_informe = DB::table('informe')
            ->join('users','users.id','=','informe.id_usuario_generador')
            ->select('informe.id','users.nombre_completo','users.cargo','users.unidad','informe.estado','informe.tipo_informe','informe.fecha','informe.referencia','informe.cite','informe.usuario')
            ->where('informe.id','=',$solicitudId)
        ->get();
        //Generacion de la imagen del Qr
        $urlraiz = \URL::to('/');
        $encrypted_id = encrypt($solicitudId);
        

        $image_qr =QrCode::generate($urlraiz.'/api/verificacion/'.$encrypted_id);
        $imageString = base64_encode($image_qr);
        $dataURI = "data:image/png;base64," . $imageString;     
        $img = explode(',', $dataURI, 2)[1];
        $qr_image = 'data://text/plain;base64,' . $img;
        
            //configuracion pdf
            $vista = view('pdffinal', [
                'informe'        =>  $informe,
                'todo'           =>  $todo,
                'fechaformateada'=>  $fechaformateada,    
                'qr_image'       =>  $qr_image
               
                ]);
                $options = new Options(); 
                $options->set('isRemoteEnabled', TRUE);
                $dompdf = new Dompdf($options);
                $dompdf->loadHtml($vista);
                $dompdf->setPaper('letter', 'portrait');
                $dompdf->set_option('isPhpEnabled', true);
                //$dompdf->page_text(1,1, "{PAGE_NUM} of {PAGE_COUNT}", $font, 10, array(0,0,0));
                // page_text($w - 120, $h - 40, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
                $dompdf->render();
                
                // $dompdf->stream('autorizaciones.pdf');
                $dompdf->stream ('',array("Attachment" => false));
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

    public function pdffinalsello(Request $request){
        $solicitudId = $request->id_informe;    
        $solicitud = Informe::find($solicitudId);

        $informe=DB::table('informe')->where('informe.id','=',$solicitudId)
            ->select('informe.id','informe.numero','informe.id_usuario_generador','informe.usuario','informe.nombre_dirigido','informe.cargo_dirigido','informe.unidad_dirigido','informe.referencia','informe.tipo_informe','informe.fecha','informe.dato_informe','informe.id_oficina','informe.oficina','informe.cite','informe.fecha_finalizacion','informe.logo')
            -> first(); 

        $fecha=DB::table('informe')->where('informe.id','=',$solicitudId)
            ->select('informe.fecha')
            ->first();    
        setlocale(LC_ALL,'Spanish_Bolivia');
        $fechaformateada = strftime("%A %d de %B de %Y", strtotime( $fecha->fecha ));
        setlocale(LC_ALL,"");
        $fechaformateada = utf8_encode($fechaformateada);
        $todo = Informe::all();

        $generar_qr_informe = DB::table('informe')
            ->join('users','users.id','=','informe.id_usuario_generador')
            ->select('informe.id','users.nombre_completo','users.cargo','users.unidad','informe.estado','informe.tipo_informe','informe.fecha','informe.referencia','informe.cite','informe.usuario')
            ->where('informe.id','=',$solicitudId)
        ->get();
        //Generacion de la imagen del Qr
        $urlraiz = \URL::to('/');
        $encrypted_id = encrypt($solicitudId);


        $image_qr =QrCode::generate($urlraiz.'/api/verificacion/'.$encrypted_id);
        $imageString = base64_encode($image_qr);
        $dataURI = "data:image/png;base64," . $imageString;     
        $img = explode(',', $dataURI, 2)[1];
        $qr_image = 'data://text/plain;base64,' . $img;

            //configuracion pdf
            $vista = view('pdffinalsello', [
                'informe'        =>  $informe,
                'todo'           =>  $todo,
            //    'fechaformateada'=>  $fechaformateada,    
                'qr_image'       =>  $qr_image

                ]);
                $options = new Options(); 
                $options->set('isRemoteEnabled', TRUE);
                $dompdf = new Dompdf($options);
                $dompdf->loadHtml($vista);
                $dompdf->setPaper('letter', 'portrait');
                $dompdf->set_option('isPhpEnabled', true);
                //$dompdf->page_text(1,1, "{PAGE_NUM} of {PAGE_COUNT}", $font, 10, array(0,0,0));
                // page_text($w - 120, $h - 40, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
                $dompdf->render();

                // $dompdf->stream('autorizaciones.pdf');
                $dompdf->stream ('',array("Attachment" => false));
    }
}
