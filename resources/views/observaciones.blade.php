<x-layout bodyClass="g-sidenav-show  bg-gray-200">
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

        <x-navbars.sidebar activePage="Observaciones"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Observaciones"></x-navbars.navs.auth>
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
                                    <h6 class="text-white text-capitalize ps-3">Informes Observados</h6>
                                </div>
                            </div>
                            
                            <div class="row" >
                                <div class="" style="text-align:right"> 
                                    <form action="" >   
                                       <!-- <a href="{{route('informe')}}" class="btn btn-md  text-white" title="Crear Nueva Oficina"><i class="fas fa-plus-circle text-dark fa-2x"></i></a>-->
                                    </form>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <!-- date table-->
                                    <table id="example" class="data-table dataTable no-footer dtr-inline collapsed"  >
                                            <thead>
                                                <tr>
                                                    <th>Nro.</th>
                                                    <th>Fecha</th>
                                                    <th>Asunto</th>
                                                    <th>Dirigido a</th>
                                                    <th>Estado</th>
                                                    <td>Generado por</td>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($usuario_generador as $usuario_generadores)
                                            @if($usuario_generadores->estado=="Observado" && $usuario_generadores->estado_observacion=="Observado" )    
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
                                                    <td style="color:red">{{$usuario_generadores->estado}}</td>
                                                    <td>{{$creador}}</td>                                               
                                                    <td>
                                                        <form action="{{route('enviar_observacion_subsanada')}}" method="post" >
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$usuario_generadores->id_informe_observado}}">
                                                            <button class="btn btn-info" title="Revisar Informe"><i class="fa fa-file-text-o"></i></button>
                                                        </form>
                                                                
                                                        <!--<button type="button"  class="btn btn-success" title="Revisar Informe" onclick="confirmToSaveBarsit();"><i class="fa fa-share-square-o"></i></button>-->
                                                        
                                                        <!--<form action="{{route('enviar_observacion_subsanada')}} " method="post" >
                                                            @csrf
                                                            <input type="" name="id" value="{{$usuario_generadores->id_informe_observado}}">
                                                            <button class="btn btn-success" title="Derivar Informe" ><i class="fa fa-share-square-o"></i></button>
                                                            <input type="submit" id="btnSend">
                                                        </form>-->
                                                        
                                                        <!--script para el sweet alert antes de derivar 
                                                        <script src="https://unpkg.com/sweetalert2@7.3.0/dist/sweetalert2.all.js"></script>
                                                        <script>
                                                            function confirmToSaveBarsit() {
                                                                    swal({
                                                                        title: '¿Desea Derivar para revision ?',
                                                                        text: "Tras derivar ya no podra " +
                                                                        "realizar modificaciones",
                                                                        type: 'question',
                                                                        showCancelButton: true,
                                                                        confirmButtonColor: '#3085d6',
                                                                        cancelButtonColor: '#d33',
                                                                        cancelButtonText: 'Cancelar',
                                                                        confirmButtonText: 'Sí, enviar!'
                                                                    }).then((result) => {
                                                                        if (result.value) {
                                                                            $('#btnSend').click();
                                                                        }
                                                                    })
                                                                }
                                                        </script>-->
                                                        <!--Fin script del sweet alert de derivar-->



                                                        <form action="{{route('descargarpdf')}}" method="post" target="_blank">
                                                            @csrf 
                                                            <input type="hidden" name="id" value="{{$usuario_generadores->id_informe_observado}}">
                                                            <button class="btn btn-primary" title="Imprimir Informe"><i class="fa fa-print" aria-hidden="true"></i></button>
                                                        </form>
                                                        
                                                    </td>
                                                </tr>
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
        responsive: true
    } );
</script>
<!-- fin inicializacion de data table-->

