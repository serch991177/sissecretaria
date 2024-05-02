<x-layout bodyClass="g-sidenav-show  bg-gray-200">
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

        <x-navbars.sidebar activePage="Revisar Informe"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Revisar Documento"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <!--cdn css data table-->
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
            <!--fin cdn css data table-->
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">Listado Documentos</h6>
                                </div>
                            </div>
                            
                            <div class="row" >
                                <div class="" style="text-align:right"> 
                                    <!--<form action="" >  --> 
                                       <!-- <a href="{{route('informe')}}" class="btn btn-md  text-white" title="Crear Nueva Oficina"><i class="fas fa-plus-circle text-dark fa-2x"></i></a>-->
                                    <!--</form>-->
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <!-- date table-->
                                    <table id="example" class="data-table dataTable no-footer dtr-inline collapsed" >
                                            <thead>
                                                <tr>
                                                    <th>Nro.</th>
                                                    <th>Fecha</th>
                                                    <th>Asunto</th>
                                                    <th>Dirigido a</th>
                                                    <th>Prioridad</th>
                                                    <td>Generado por</td>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                            @foreach($usuario_generador as $usuario_generadores)
                                            @if($rol_usuario->revisor=="true" || $rol_usuario->finalizador=="true")
                                            @if($usuario_generadores->estado=="Derivado" && $usuario_generadores->estado_revisor=="Derivado" )    
                                            @php($creador = $usuario_generadores->name.' '.$usuario_generadores->apellido_paterno.' '.$usuario_generadores->apellido_materno)                                                                       
                                                <tr>
                                                    <td>{{$usuario_generadores->numero}}</td>
                                                    <td>{{$usuario_generadores->fecha}}</td>
                                                    <td>{{$usuario_generadores->referencia}}</td>
                                                    @if($usuario_generadores->nombre_dirigido)
                                                    @php($arraydenombresdirigidos = json_decode($usuario_generadores->nombre_dirigido, true))
                                                    @php($nombres=implode(' , ', $arraydenombresdirigidos))
                                                    <td>{{$nombres}}</td>
                                                    @else
                                                    <td></td>
                                                    @endif
                                                    @if($usuario_generadores->prioridad == "NORMAL")
                                                    <td><p class="text-center text-white" style="background-color:#00acd8">{{$usuario_generadores->prioridad}}</p></td>
                                                    @endif
                                                    @if($usuario_generadores->prioridad == "IMPORTANTE")
                                                    <td><p class="text-center text-white" style="background-color:#F2CB05">{{$usuario_generadores->prioridad}}</p></td>
                                                    @endif
                                                    @if($usuario_generadores->prioridad == "URGENTE")
                                                    <td><p class="text-center text-white" style="background-color:#F25781">{{$usuario_generadores->prioridad}}</p></td>
                                                    @endif
                                                       
                                                    
                                                    <td>{{$creador}}</td>                                               
                                                    <td>
                                                        <form action="{{route('editar_informe')}}" method="post" >
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$usuario_generadores->id_informe}}">
                                                            <button class="btn btn-info" title="Revisar Informe"><i class="fa fa-file-text-o"></i></button>
                                                        </form>
                                                        <form action="{{route('enviar_revision')}} " method="post" >
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$usuario_generadores->id_informe}}">
                                                            <button class="btn btn-success" title="Enviar a revision"><i class="fa fa-share-square-o" aria-hidden="true"></i></button>
                                                        </form>
                                                        <form action="{{route('descargarpdf')}}" method="post" target="_blank">
                                                            @csrf 
                                                            <input type="hidden" name="id" value="{{$usuario_generadores->id_informe}}">
                                                            <button class="btn btn-primary" title="Imprimir Informe"><i class="fa fa-print" aria-hidden="true"></i></button>
                                                        </form>
                                                        @if($usuario_generadores->tipo_informe == "Convenio")
                                                        {{--<form action="{{route('descargarpdfsellos')}}" method="post" target="_blank">
                                                            @csrf 
                                                            <input type="hidden" name="id" value="{{$usuario_generadores->id_informe}}">
                                                            <button class="btn btn-warning" title="Imprimir Informe"><i class="fa fa-print" aria-hidden="true"></i></button>
                                                        </form>--}}
                                                        @endif
                                                        @if( $rol_usuario->finalizador=="true")
                                                        <!-- Button trigger modal -->
                                                        <!--<button class="btn btn-warning" title="Finalizar tramite"><i class="fa fa-check-square-o" aria-hidden="true"></i></button>-->
                                                        <button type="button" title="Finalizar tramite" class="btn btn-warning id_editar" data-bs-toggle="modal" data-bs-target="#exampleModal" value="{{$usuario_generadores->id_informe}}">
                                                        <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title col-11 text-center" id="exampleModalLabel">Finalizar Tramite</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="py-3 text-center">
                                                            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
                                                            <style>
                                                            .material-symbols-outlined {
                                                            font-variation-settings:
                                                            'FILL' 0,
                                                            'wght' 400,
                                                            'GRAD' 0,
                                                            'opsz' 48
                                                            }
                                                            </style>
                                                            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
                                                            <i class="material-symbols-outlined" style="font-size:150px">
                                                            warning
                                                             </i>
                                                               
                                                                <h4 class="text-gradient text-danger mt-4">Atencion!</h4>
                                                                <span class="text-danger mt-4">Una vez finalizado el tramite no podra realizar ninguna modificacion.</span>
                                                            </div>
                                                            <form name="formulario_final" id="formulario_final" action="{{route('finalizar_tramite')}}" method="post" >
                                                                @csrf 
                                                                <div  id="inputid_div"></div>
                                                                
                                                               </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                    <button type="submit" class="btn bg-gradient-primary">Terminar Tramite</button>
                                                                </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        </div>
                                                        <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                                                        <script>
                                                            $(document).ready(function(){
                                                                $(document).on('click', '.id_editar', function(){
                                                                    var id=$(this).val();
                                                                    console.log(id);
                                                                    let inputid="";
                                                                    inputid += `<input type="hidden"  name="id_recuperar" id="id_recuperar" value="${id}">`;
                                                                    document.getElementById('inputid_div').innerHTML = inputid;
                                                                });
                                                            });
                                                        </script>
                                                        <!--<form name="formulario_final" id="formulario_final" action="{{route('finalizar_tramite')}}" method="post" >
                                                            @csrf 
                                                            <input type="" name="id" value="{{$usuario_generadores->id_informe}}">
                                                            <button class="btn btn-warning" title="Finalizar tramite"><i class="fa fa-check-square-o" aria-hidden="true"></i></button>
                                                            --><!--<button type="button" onclick="confirmToSaveBarsit();" value="{{$usuario_generadores->id_informe}}" class="btn btn-warning" title="Finalizar tramite"><i class="fa fa-check-square-o terminar_tramite" aria-hidden="true"></i></button>-->
                                                            <!--<button type="submit" id="btnSend" ></button>-->
                                                        <!--</form>-->
                                                        @endif
                                                        @if($usuario_generadores->archivo_del_informe == null || $usuario_generadores->archivo_del_informe == " " )
                                                            @else
                                                            <br>
                                                            <a href="{{'/archivos/'.$usuario_generadores->archivo_del_informe}}" class="btn btn-warning" title="Ver Archivo" target="_blank" ><i class="fas fa-eye" aria-hidden="true"></i></a>
                                                            @endif
                                                    </td>
                                                </tr>
                                            @endif   
                                            @endif 
                                            @endforeach
                                            </tbody>
                                    </table>
                                    <!-- end date table-->                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>
</x-layout>
<!--cdn javascript datatable-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<!--fin cdn javascript datatable-->
<!-- inicializacion de data table-->
<script>
    $('#example').DataTable( {
        responsive: true,
        ordering: false 
    } );
</script>
<!-- fin inicializacion de data table-->