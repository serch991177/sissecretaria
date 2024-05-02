<x-layout bodyClass="g-sidenav-show  bg-gray-200">
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

        <x-navbars.sidebar activePage="Seguimiento Informes"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Seguimiento Informes"></x-navbars.navs.auth>
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
                                    <h6 class="text-white text-capitalize ps-3">Seguimiento de Informes</h6>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="" style="text-align:right"> 
                                    <!--<form action="" >   
                                        <a href="{{route('informe')}}" class="btn btn-md  text-white" title="Crear Nueva Oficina"><i class="fas fa-plus-circle text-dark fa-2x"></i></a>
                                    </form>-->
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <!-- date table
                                    <table id="example" class="table dt-responsive table-bordered data-table dataTable no-footer dtr-inline collapsed " role="grid" >
                                            <thead>
                                                <tr>
                                                    <th>Nro.</th>
                                                    <th>Funcionario Generador</th>
                                                    <th>Funcionario Destino</th>
                                                    
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>  
                                                        <td></td>                                                                         
                                                        
                                                    </tr>
                                            </tbody>
                                    </table>
                                     end date table-->      
                                    
                                    <!--Div para hacer el tracking-->
                                    <div class="container-fluid my-5  d-flex  justify-content-center">
                                        <div class="card card-1">
                                            <div class="card-body">
                                                <!--Cabezera del tracking-->
                                                <div class="row justify-content-between mb-3">
                                                    <div class="col-auto"> <h6 class="color-1 mb-0 change-color">Seguimiento del Informe</h6> </div>
                                                    <div class="col-auto  "> <small>Numero del Informe : {{$informe->numero}}</small> </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col">
                                                        <div class="row justify-content-between">
                                                            <div class="flex-sm-col text-right col"><p class="mb-1"> <b>Dirigido A</b></p> </div>
                                                            @if($informe->nombre_dirigido)
                                                                @php($arraydenombresdirigidos = json_decode($informe->nombre_dirigido,true))
                                                                @php($nombres= implode(",",$arraydenombresdirigidos))
                                                                <div class="flex-sm-col col-auto"><p class="mb-1">{{$nombres}}</p></div>
                                                            @else
                                                                <div class="flex-sm-col col-auto"><p class="mb-1"></p></div>
                                                            @endif
                                                        </div>
                                                        <div class="row justify-content-between">
                                                            <div class="flex-sm-col text-right col"><p class="mb-1"><b>Tipo de Informe</b></p></div>
                                                            <div class="flex-sm-col col-auto"><p class="mb-1">{{$informe->tipo_informe}}</p></div>
                                                        </div>
                                                        <div class="row justify-content-between">
                                                            <div class="flex-sm-col text-right col"><p class="mb-1"><b>Referencia</b></p></div>
                                                            <div class="flex-sm-col col-auto"><p class="mb-1">{{$informe->referencia}}</p></div>
                                                        </div>
                                                        <div class="row justify-content-between">
                                                            <div class="flex-sm-col text-right col"><p class="mb-1"><b>Fecha de creacion del informe</b></p></div>
                                                            <div class="flex-sm-col col-auto"><p class="mb-1">{{$informe->fecha_creacion}}</p></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                                <!--Fin cabezera del tracking-->
    

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="card ">
                                                            <div class="card-body">
                                                            @foreach($seguimiento as $seguimientos)
                                                                <div class="row">
                                                                    <div class="row justify-content-between">
                                                                        <div class="flex-sm-col text-right col"><p class="mb-1"> <b>Origen</b></p> </div>
                                                                        <div class="flex-sm-col col-auto"><p class="mb-1">{{$seguimientos->funcionario_generador}}</p></div>
                                                                    </div>
                                                                    <div class="row justify-content-between">
                                                                        <div class="flex-sm-col text-right col"><p class="mb-1"> <b>Destino</b></p> </div>
                                                                        <div class="flex-sm-col col-auto"><p class="mb-1">{{$seguimientos->funcionario_destino}}</p></div>
                                                                    </div>
                                                                    <hr class="my-3">
                                                                    <div class="row justify-content-between">
                                                                        <div class="flex-sm-col text-right col"><p class="mb-1"> <b>Estado</b></p> </div>
                                                                        <div class="flex-sm-col col-auto"><p class="mb-1">{{$seguimientos->estado_seguimiento}}</p></div>
                                                                    </div>
                                                                    <div class="row justify-content-between">
                                                                        <div class="flex-sm-col text-right col"><p class="mb-1"> <b>Fecha de derivacion</b></p> </div>
                                                                        <div class="flex-sm-col col-auto"><p class="mb-1">{{$seguimientos->fecha_derivacion}}</p></div>
                                                                    </div>
                                                                </div>                                                                   
                                                                <br>               
                                                                <br> 
                                                            @endforeach
                                                            </div>

                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!--Fin div para hacer el trackings-->                              
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