<x-layout bodyClass="g-sidenav-show  bg-gray-200">
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
        <x-navbars.sidebar activePage="Enviar Revision"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Enviar Revision"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">Enviar Para Revision</h6>
                                    <!--<p class="text-white text-capitalize  ps-3">Oficinas</p>-->                            
                                </div> 
                            </div>
                            <div class="card-body px-0 pb-2">
                                <!--card de creacion de oficinas-->
                                <form action="{{ route('guardar_actualizar_revisor') }}" method="post">
                                     @csrf
                                     @php($json = json_decode($solicitud->usuario , false))
                                     @foreach($json as $jsons)
                                     <input type="hidden" value="{{$jsons->nombre}}" name="usuario[]" id="usuario">
                                     <input type="hidden" value="{{$jsons->cargo}}" name="cargo[]" id="cargo">
                                     <input type="hidden" value="{{$jsons->unidad}}" name="unidad[]" id="unidad">
                                     <input type="hidden" value="{{$jsons->firma}}" name="firma[]" id="firma">
                                     @endforeach
                                     <input type="hidden" value="Derivado" name="estado_revisor" id="estado_revisor">
                                     <input type="hidden" value ="{{$solicitud->id}}" name="id_informe" >
                                     <input type="hidden" value="{{auth()->user()->id}}" name="id_users_informe[]">
                                     <input type="hidden" value="{{$solicitud->fecha}}" name="fecha_generador">
                                     <input type="hidden" value="{{$solicitud->nombre_dirigido}}" name="dirigido_nombre">
                                     <input type="hidden" value="{{$solicitud->cargo_dirigido}}" name="dirigido_cargo">
                                     <input type="hidden" value="{{$solicitud->unidad_dirigido}}" name="dirigido_unidad">
                                     <input type="hidden" value="{{$nombre_completo->nombre_completo}}" name="nombre_del_generador">
                                     <input type="hidden" value="{{$nombre_completo->cargo}}" name="cargo_del_generador">
                                     <input type="hidden" value="{{$nombre_completo->unidad}}" name="unidad_del_generador">

                                    <div class="card">
                                        <div class="card-header card-header-info">
                                                    <h1 class="card-title text-center">ENVIAR PARA REVISION</h1>
                                                    <h4 class="card-title text-center"><span class="text-danger">(*)</span>Campos Obligatorios</h4>
                                        </div>
                                        <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                                <div class="input-group input-group-static is-valid mb-4">
                                                                    <label for="dirigido_a"> Numero : <span class="text-danger">(*)</span></label>
                                                                    <input readonly type="text" name="numero_generador" id="numero_generador" class="form-control"  value="{{$solicitud->numero}}">
                                                                </div>                                                       
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                                <div class="input-group input-group-static is-valid mb-4">
                                                                    <label for="cargo">Asunto :<span class="text-danger">(*)</span></label>
                                                                    <input  readonly type="text" name="referencia_generada" id="referencia_generada" class="form-control"  value="{{$solicitud->referencia}}">
                                                                </div>                                                       
                                                        </div>
                                                    </div>
                                                   
                                                    <!--<div class="col-12">
                                                        <div class="form-group">
                                                            <div class="input-group input-group-static is-valid mb-4">
                                                                <label for="usuario">Funcionario :<span class="text-danger">(*)</span></label>
                                                                <input list="browsers" name="usuario[]" id="browser" class="form-control" onChange="verificarResp()" autocomplete="off">
                                                                    <datalist id="browsers">
                                                                        @foreach($usuarios as $usuario)  
                                                                            @if($usuario->estado=="activo" && $usuario->revisor =="true") 
                                                                                <option value="{{$usuario->nombre_completo}}">
                                                                            @endif
                                                                        @endforeach     
                                                                    </datalist>
                                                            </div>
                                                        </div>
                                                    </div>-->

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                                <div class="input-group input-group-static is-valid mb-4">
                                                                    <label for="oficina">Oficina :<span class="text-danger">(*)</span></label>
                                                                    <select class="form-control" name="oficina" id="oficina" onChange="verificarResp2()" required>
                                                                        <option value="">**Seleccione una Oficina**</option>
                                                                         @foreach($oficinas as $oficina)  
                                                                         @if($oficina->estado=="activo")  
                                                                        <option value="{{$oficina->nombre_oficina}}">{{$oficina->nombre_oficina}}</option>
                                                                        @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>                                                        
                                                        </div>
                                                        
                                                    </div>
                                                    

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                                <div class="input-group input-group-static is-valid mb-4">
                                                                    <label for="funcionario">Funcionario :<span class="text-danger">(*)</span></label>
                                                                    <select class="form-control" name="funcionario" id="funcionario" onChange="verificarResp()" required>
                                                                        <option value="">**Seleccione una Oficina**</option>
                                                                        @foreach($usuarios as $usuario)  
                                                                        @if($usuario->estado=="activo" && $usuario->revisor =="true" ) 
                                                                        <!--<option value="{{$usuario->nombre_completo}}">{{$usuario->nombre_completo}}</option>-->
                                                                        @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>                                                        
                                                        </div>
                                                      
                                                    </div>



                                                    
                                                   
                                                    
                                                    <input type="hidden" name="id_usuario_revisor" id="id_usuario_revisor">
                                                    <input type="hidden" name="usuario[]" id="nombre_funcionario">
                                                    <input type="hidden" name="cargo[]" id="cargo_funcionario">
                                                    <input type="hidden" name="unidad[]" id="unidad_funcionario">
                                                    <input type="hidden" name="firma[]" id="firma_funcionario">


                                                    <input type="hidden" name="nombre_funcionario_revisor" id="nombre_funcionario_revisor">
                                                </div>
                                        </div>
                                    </div> 
                                    <div class="card" >
                                            <div class="card-body">
                                                <!--boton para enviar revision-->
                                                <div class="row" >                                                                         
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3">
                                                        <input type="submit" id="btn_hidden" value="Enviar Para Revision" class="btn btn-success">
                                                    </div>

                                                    <div class="col-12 col-sm-6 col-md-4 mt-3">
                                                        <a type="button" class="btn btn-danger" href="{{ route('billing') }}">Volver Atras</a>
                                                    </div>
                                                </div>
                                                <!--Fin boton enviar revision-->
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
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<!--script data table-->
<script>
    /*$(document).ready(function () {
        $('#example').DataTable();
    });*/
    $('#example').DataTable( {
        responsive: true
    } );
</script>
<script>
    function verificarResp(){
        $.ajax({
                    type:"POST",
                    headers: {
                        'Content-Type':'application/json',
                        'X-CSRF-TOKEN':'{{ csrf_token() }}',
                            },
                    url: "{{ route('recuperar_revisor') }}",
                    async: false,
                    data: JSON.stringify({
                                'ciresp':  $('#funcionario').val(),
                                    }),
                            success: function(data)
                            {
                                        if(data.status==true)
                                        {
                                        $('#id_usuario_revisor').val(data.data.id);
                                        $('#nombre_funcionario_revisor').val(data.data.nombre_completo);
                                        $('#nombre_funcionario').val(data.data.nombre_completo);
                                        $('#cargo_funcionario').val(data.data.cargo);
                                        $('#unidad_funcionario').val(data.data.unidad);
                                        $('#firma_funcionario').val(data.data.firma);
                                        $('#btn_hidden').show();
                                        }
                            }
            });
    }
    /*$(document).on('blur  ', '#browser', function(){
        verificarResp();
    })*/
</script>
<!--funcion para recuperar solo los nombres de una oficina-->
<script>
    function verificarResp2(){
        $.ajax({
                    type:"POST",
                    headers: {
                        'Content-Type':'application/json',
                        'X-CSRF-TOKEN':'{{ csrf_token() }}',
                            },
                    url: "{{ route('recuperar_nombre') }}",
                    async: false,
                    data: JSON.stringify({
                                'ciresp':  $('#oficina').val(),
                                    }),
                            success: function(data)
                            {
                                if(data.status==true)
                                {
                                    var len=data.data.length;
                                    $("#funcionario").empty();
                                    $("#funcionario").append("<option value=''>**Seleccione una Oficina**</option>");                                    
                                    for(var i=0;i<len;i++){
                                        if(data.data[i].revisor == true || data.data[i].finalizador == true){
                                            var name = data.data[i]['nombre_completo'];
                                            $("#funcionario").append("<option value='"+name+"'>"+name+"</option>");
                                            //$('#').val(data.data.nombre_completo);
                                        }
                                    }
                                }
                            }
            });
    }
    /*$(document).on('blur  ', '#browser', function(){
        verificarResp();
    })*/
</script>
<!--Fin funcion para recuperar solo lo nombres de una oficina-->
<script>
    document.getElementById("btn_hidden").style.display='none'
    
</script>
<!--fin data table-->
        </main>
        <x-plugins></x-plugins>
</x-layout>
