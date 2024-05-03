<x-layout bodyClass="g-sidenav-show  bg-gray-200">
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

        <x-navbars.sidebar activePage="Informes"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Documentos"></x-navbars.navs.auth>
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
                                    <form action="" >   
                                        <a href="{{route('informe')}}" class="btn btn-md  text-white" title="Crear Nueva Oficina"><i class="fas fa-plus-circle text-dark fa-2x"></i></a>
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
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($dato as $datos)                                                                           
                                                <tr>
                                                    <td>{{$datos->numero}}</td>
                                                    <td>{{$datos->fecha_creacion}}</td>
                                                    <td>
                                                        <form action="{{route('editar_informe')}}" method="post" >
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$datos->id}}">
                                                            <button class="btn btn-warning" title="Ver / Editar informe"><i class="fa fa-file-text-o"></i></button>
                                                        </form>
                                                        
                                                        <form action="{{route('descargarpdf')}}" method="post" target="_blank">
                                                            @csrf 
                                                            <input type="hidden" name="id" value="{{$datos->id}}">
                                                            <button class="btn btn-primary" title="Imprimir Informe"><i class="fa fa-print" aria-hidden="true"></i></button>
                                                        </form>
                                                        
                                                    </td>
                                                </tr> 
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