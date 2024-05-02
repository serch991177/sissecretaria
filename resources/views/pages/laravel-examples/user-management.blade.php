<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="Funcionarios"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Funcionarios"></x-navbars.navs.auth>
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
                                <h6 class="text-white mx-3"><strong>Lista De Funcionarios</strong></h6>
                            </div>
                        </div>
                        <div class=" me-3 my-3 text-end">
                            <form action="" >   
                                <a href="{{route('register')}}" class="btn btn-md  text-white" title="Crear Nuevo Funcionario"><i class="fas fa-plus-circle text-dark fa-2x"></i></a>
                            </form>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                     <!-- date table-->
                                     <table id="example" class="dt-responsive data-table dataTable no-footer dtr-inline collapsed " role="grid" >
                                            <thead>
                                                <tr>
                                                    <th>CI</th>
                                                    <th>Nombre Completo</th>
                                                    <th>Cargo</th>
                                                    <th>Oficina</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user as $users)    
                                            @php($creador = $users->name.' '.$users->apellido_paterno.' '.$users->apellido_materno)                                                                                                  
                                                <tr>
                                                    <td>{{$users->carnet}}</td>
                                                    <td>{{$creador}}</td>
                                                    <td>{{$users->cargo}}</td>
                                                    <td>{{$users->id_oficina}}</td>
                                                    <td>
                                                    <div class="form-group text-center">
                                                        <form action="{{route('editar_funcionario')}}" method="post" >
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$users->id}}">
                                                            <button class="btn btn-info" title="Ver / Editar"><i class="fa fa-file-text-o"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="form-group text-center">                                                    
                                                        <form method="post" action="{{route('editar_rol')}}">
                                                        @csrf
                                                            <input type="hidden" name="id" value="{{$users->id}}">
                                                            <button class="btn btn-success" title="Roles"><i class="fa fa-files-o" aria-hidden="true"></i></button>
                                                        </form>
                                                    </div>

                                                    <div class="form-group text-center">                                                    
                                                        <form method="post" action="{{route('format-password')}}" id="formulario_para_resetear">
                                                           @csrf
                                                            <input type="hidden" name="id" id="id_user" value="{{$users->id}}">
                                                            <input type="hidden" name="carnet_identidad" id="carnet_identidad" value="{{$users->carnet}}">
                                                            <button  type="button" id="btn_restaurar" class="btn btn-warning id_editar"   value="{{$users->id}}"  title="Resetear Contraseña"><i class="fa fa-unlock-alt" aria-hidden="true"></i></button>
                                                        </form>
                                                    </div>
                                                    

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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).on('click', '.id_editar', function(){
        var id_usuario=$(this).val();
        Swal.fire({
                title: 'Quieres restaurar la contraseña?',
                icon: 'warning',
                showDenyButton: true,
                confirmButtonText: 'Restaurar',
               
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            type:"POST",
                            headers: {
                                'Content-Type':'application/json',
                                'X-CSRF-TOKEN':'{{ csrf_token() }}',
                                    },
                            url: "{{ route('format-password') }}",
                            async: false,
                            data: JSON.stringify({
                                        'id_usuario':  id_usuario,
                                            }),
                                    success: function(data)
                                    {
                                        Swal.fire({
                                            position: 'top-end',
                                            icon: 'success',
                                            title: 'Contraseña Restaurada Correctamente',
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                    }
                        });
                    

                    }
                })
    });
</script>