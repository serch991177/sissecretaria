<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\TipoInforme;
use App\Models\Informe;
use App\Models\User;
use App\Models\Oficinas;
use RealRashid\SweetAlert\Facades\Alert;
use Dompdf\Dompdf;
use Dompdf\Options;
use GuzzleHttp\Client;
use DateTime;
use Illuminate\Support\Facades\Validator;


use SimpleSoftwareIO\QrCode\Facades\QrCode;


class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informe = Informe::all();
        /**Funcion para recuperar solo los datos del usuario creado */
        $iduser= Auth::id();    
        $dato=DB::table('informe')
        ->where('informe.id_usuario_generador',''.$iduser.'')
        ->select()
        ->get();
       
        /**Fin funcion para recuperar solo  los datos del usuario creado*/

        return view('pages.billing')->with('dato',$dato);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipoinforme = TipoInforme::all();
        $iduser= Auth::id();
        $nombre_completo= DB::table('users')
        ->select('users.name','users.apellido_paterno','users.apellido_materno','users.id','users.cargo','users.unidad','users.firma','users.nombre_completo')
        ->where('users.id', '=', $iduser)
        ->first();

        //$theUrl     = config('app.guzzle_test_url');
        //$users   = Http ::get($theUrl);
        //$nombres_funcionarios = $users->object();

       //dd(gettype($nombres_funcionarios));
        //dd($probando_variable);
        //dd($nombres_funcionarios);

        //dd($nombre_completo);
        return view('informe')->with(['tipoinforme'=>$tipoinforme, 'nombre_completo'=>$nombre_completo]);
    }

    /**
     * Store a newly created resource in storage.
     */ 
    public function store(Request $request)
    {    
        $year = date("Y", strtotime(now()));
        $categoryId=Informe::orderByDesc('id')->first();
        $autoIncId=$categoryId->numero+1;
        $validator = Validator::make($request->all(),[
            'usuario'=>'required',    
            'dato_informe'=>'required',
        ]);
        if($validator->fails()){
            return response()->json(['state' => false,'errors' => $validator->errors()]);
        }
        //me
        $category= new Informe;
        $category->id_usuario_generador = $request->input('id_usuario_generador');
        $array_vacio = array();
        $arrays_usuarios = $request->input('usuario');
        $arrays_cargos= $request->input('cargo');
        $arrays_unidad=$request->input('unidad');
        $arrays_firmas=$request->input('firma');
        for ($i=0;$i<count($arrays_usuarios); $i++)
        {
            $json_tranformas=[  
            
                'nombre'=>$arrays_usuarios[$i],
                'cargo'=>$arrays_cargos[$i],
                'unidad'=>$arrays_unidad[$i],
                'firma'=>$arrays_firmas[$i],
                
            ];
            array_push($array_vacio,$json_tranformas);
        }
        $json_transformado = json_encode($array_vacio);

        

        $category->dato_informe = $request->input('dato_informe');
        
        $category->numero=$autoIncId;
        $category->usuario=$json_transformado;
        
        $category->fecha_creacion= now();
        $category->gestion = $year;
        $category->save();
        return response()->json(['success'=>true]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $req)
    {
        $solicitudId=$req->id;       
        $solicitud = Informe::find($solicitudId);
        $tipoinforme = TipoInforme::all();

        //$theUrl     = config('app.guzzle_test_url');
        //$users   = Http ::get($theUrl);
        //$nombres_funcionarios = $users->object();
        
        //Alert::success('Oficina Creada Correctamente'); 
        //dd($solicitud);
        //, 'nombres_funcionarios'=>$nombres_funcionarios
        return view('editarinforme')->with(['solicitud'=>$solicitud, 'tipoinforme'=>$tipoinforme]);
        //return view('editarinforme', compact('solicitud'));
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
    public function update(Request $request)
    {
        $id = $request->id;
        $category= Informe::find($id);
        $category->dato_informe = $request->input('dato_informe');
        //$category->usuario=$json_transformado;
        $category->update();
        return response()->json(['success'=>true]); 
    }



    public function getinformeid($id){
       
        $decrypted = decrypt($id);
        $solicitud = DB::table('informe')
            ->join('users','users.id','=','informe.id_usuario_generador')
            ->select('informe.id','users.nombre_completo','users.cargo','users.unidad','informe.estado','informe.tipo_informe','informe.fecha','informe.referencia','informe.cite','informe.usuario','informe.fecha_finalizacion','informe.cite_informes','informe.cite_comunicaciones','informe.cite_memo')
            ->where('informe.id','=',$decrypted)
        ->get();
        if(is_null($solicitud)){
            return response()->json(['Mensaje'=>'Informe no encontrado'],404);
        }
        return view('verificacion')->with('solicitud',$solicitud);
        //return response()->json($solicitud,200);
    }

    public function pdf(Request $request){
        $solicitudId = $request->id;    
        $solicitud = Informe::find($solicitudId);
        //dd($solicitud);
        $informe=DB::table('informe')->where('informe.id','=',$solicitudId)
            ->select('informe.id','informe.numero','informe.id_usuario_generador','informe.usuario','informe.dato_informe','informe.id_oficina','informe.oficina','informe.fecha_finalizacion','informe.prefijo')
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
        $vista = view('pdfsecre', [
            'informe'        =>  $informe,
            'todo'           =>  $todo,
            'fechaformateada'=>  $fechaformateada,   
            'qr_image'       =>  $qr_image,
            ]);
         
        /*$options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $options->set('isHTML5ParserEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($vista);
        $dompdf->setPaper('letter', 'portrait');
        $dompdf->render();
        $dompdf->set_option('isPhpEnabled', true);
        $dompdf->stream ('',array("Attachment" => false));
        $dompdf->page_text(1,1, "{PAGE_NUM} of {PAGE_COUNT}", $font, 10, array(0,0,0));                                          
        
        //$pdf = PDF::loadView('pdf');
        return $pdf->stream('', array("Attachment" => false));*/

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

    public function enviarrevision(Request $req){
        $solicitudId=$req->id;       
        $solicitud = Informe::find($solicitudId);
        $oficinas = Oficinas::all();
        $usuarios = User::all();
        //Alert::success('Oficina Creada Correctamente'); 
        //dd($solicitud);
        $iduser= Auth::id();
        $nombre_completo= DB::table('users')
        ->select('users.nombre_completo','users.id','users.cargo','users.unidad','users.firma')
        ->where('users.id', '=', $iduser)
        ->first();
        //dd($nombre_completo);
        return view('enviar_revision')->with(['solicitud'=>$solicitud, 'oficinas'=>$oficinas, 'usuarios'=>$usuarios, 'nombre_completo'=>$nombre_completo]);
    }

    public function guardararchivo(Request $request){
        $solicitudId=$request->id;    
        $solicitud = Informe::find($solicitudId);
     
        return view('cargararchivo')->with(['solicitud'=>$solicitud]);
    }

    public function actualizararchivo(Request $request){
        $id = $request->id;
        $category= Informe::find($id);
        if($imagen = $request->file('archivo_del_informe')) {
            $rutaGuardarImg = 'archivos/';
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $category['archivo_del_informe'] = "$imagenProducto";  
        }
        else{
            unset($category['archivo_del_informe']);
        }

        $category->update();
        Alert::success('Archivo Actualizado Correctamente'); 
        return redirect('/billing');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function pdfsellos(Request $request){
        $solicitudId = $request->id;    
        $solicitud = Informe::find($solicitudId);
        //dd($solicitud);
        $informe=DB::table('informe')->where('informe.id','=',$solicitudId)
            ->select('informe.id','informe.numero','informe.id_usuario_generador','informe.usuario','informe.nombre_dirigido','informe.cargo_dirigido','informe.unidad_dirigido','informe.referencia','informe.tipo_informe','informe.fecha','informe.dato_informe','informe.id_oficina','informe.oficina','informe.fecha_finalizacion','informe.logo')
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
        $vista = view('pdfsellos', [
            'informe'        =>  $informe,
            'todo'           =>  $todo,
            'fechaformateada'=>  $fechaformateada,   
            'qr_image'       =>  $qr_image,
            ]);



        $options = new Options(); 
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($vista);
        $dompdf->setPaper('letter', 'portrait');
        $dompdf->set_option('isPhpEnabled', true);
        $dompdf->render();

        $dompdf->stream ('',array("Attachment" => false));
    }
}
