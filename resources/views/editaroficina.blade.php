<x-layout bodyClass="g-sidenav-show  bg-gray-200">
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

        <x-navbars.sidebar activePage="Oficinas"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Oficinas"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">Actualizacion de datos</h6>
                                    <!--<p class="text-white text-capitalize  ps-3">Oficinas</p>-->                            
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <!--card de creacion de oficinas-->
                                <form action="{{ route('actualizar_oficina') }}" method="post">
                                     @csrf
                                     
                                    <div class="card">
                                            <div class="card-header card-header-info">
                                                    <h1 class="card-title text-center">DATOS DE LA OFICINA</h1>
                                                    <h4 class="card-title text-center"><span class="text-danger">(*)</span>Campos Obligatorios</h4>
                                            </div>
                                            <div class="card-body">
                                                <!-- Formulario de Oficina-->
                                                <div class="row">                        
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3"> 
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <label class="" for="numero">Numero:<span class="text-danger">(*)</span></label>
                                                            <input type="text" name="numero" id="numero" class="form-control" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false" value="{{$solicitud->numero}}" required>
                                                        </div>
                                                        @error('numero')
                                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                                        @enderror 
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3">
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <label class="" for="nombre">Nombre de la oficina:<span class="text-danger">(*)</span></label>
                                                            <input type="text" class="form-control" name="nombre_oficina" id="nombre_oficina" value="{{$solicitud->nombre_oficina}}" required>
                                                        </div>      
                                                        @error('nombre_oficina')
                                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                                        @enderror                                            
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3">
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <label class="" for="oficina_superior">Nombre de la oficina superior:<span class="text-danger">(*)</span></label>
                                                            <input type="text" name="nombre_oficina_superior" id="nombre_oficina_superior" class="form-control" value="{{$solicitud->nombre_oficina_superior}}" required>
                                                        </div>
                                                        @error('nombre_oficina_superior')
                                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                                        @enderror 
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3">
                                                        <label class="" for="numero">Estado:<span class="text-danger">(*)</span></label>
                                                        <div class="input-group input-group-static is-valid mb-4">    
                                                            <select class="form-control" name="estado" id="estado" required>
                                                                <option value="{{$solicitud->estado}}">{{ strtoupper($solicitud->estado)}}</option>
                                                                <option value="activo">ACTIVO</option>
                                                                <option value="inactivo">INACTIVO</option>
                                                            </select>                                                    
                                                        </div>
                                                        @error('estado')
                                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                                        @enderror 
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3">
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <!--<label class="" for="oficina_superior">ID<span class="text-danger">(*)</span></label>-->
                                                            <input type="hidden" name="id" id="id" class="form-control" value="{{$solicitud->id}}">
                                                        </div> 
                                                    </div>
                                                <!-- Fin Formulario de oficina-->
                                                <!--boton para guardar oficina-->
                                                <div class="row" >                                                                         
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3">
                                                        <input type="submit" value="Actualizar Oficina" class="btn btn-success">
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3">
                                                        <a type="button" class="btn btn-danger" href="{{ route('tables') }}">Volver Atras</a>
                                                    </div>
                                                </div>
                                                
                                                <!--Fin boton guardar oficina-->
                                                </div>
                                                </div>                    
                                                </div>
                                    </div>

                                </form> 
                                <!-- fin cardformulario de oficinas-->        
                            </div>
                    </div>
                </div>
                <x-footers.auth></x-footers.auth>
            </div>
            
            
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    /*$(document).ready(function () {
        $('#example').DataTable();
    });*/
    $('#example').DataTable( {
        responsive: true
    } );
</script>

        </main>
        <x-plugins></x-plugins>
</x-layout>
