<x-layout bodyClass="g-sidenav-show  bg-gray-200">
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
        <x-navbars.sidebar activePage="Informe"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Informe"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">Formulario de generacion de informe</h6>
                                    <!--<p class="text-white text-capitalize  ps-3">Oficinas</p>-->                            
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <!--card de creacion de oficinas-->
                                @php($creador = $nombre_completo->name.' '.$nombre_completo->apellido_paterno.' '.$nombre_completo->apellido_materno)
                                <form action="{{ route('guardar_informe') }}" id="formulario_guardar" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card">
                                        
                                        <div class="card-body">
                                            <div class="row">
                                                <input type="hidden" value="{{$nombre_completo->id}}" name="id_usuario_generador" id="id_usuario_generador">
                                                <input type="hidden" value="{{$nombre_completo->nombre_completo}}" name="usuario[]" id="usuario">
                                                <input type="hidden" value="{{$nombre_completo->cargo}}" name="cargo[]" id="cargo">
                                                <input type="hidden" value="{{$nombre_completo->unidad}}" name="unidad[]" id="unidad">
                                                <input type="hidden" value="{{$nombre_completo->firma}}" name="firma[]" id="firma">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="card" >
                                            <div class="card-header card-header-info">
                                                <h1 class="card-title text-center">DATOS DEL INFORME</h1>
                                                <h4 class="card-title text-center"><span class="text-danger">(*)</span>Campos Obligatorios</h4>
                                            </div>
                                            <div class="card-body">
                                                <!-- Formulario de funcionario-->
                                                <div class="row">                        
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="input-group-static is-valid mb-4">
                                                                <label for="dato_informe">Contenido: <span class="text-danger">(*)</span></label>
                                                                <textarea class="ckeditor" name="dato_informe" id="dato_informe" rows="10" cols="80">{{old('dato_informe')}}</textarea>
                                                                <!--<input type="text" name="dato_informe" id="dato_informe" class="form-control"  value="{{old('dato_informe')}}">-->
                                                            </div>                                                       
                                                        </div> 
                                                    </div>
                                                    <p class="text-danger inputerror" id="dato_informe_error"></p>
                                                    @error('dato_informe')
                                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                                    @enderror 
                                                </div>
                                                <!-- Fin Formulario de funcionario-->
                                                
                                                
                                                <!--Fin table-->
                                                
                                                


                                                <script>
                                                    CKEDITOR.replace('pie_pagina', {toolbar: [],width: 1500, height: 50 });
                                                </script>
                                            

                                                
                                               
                                                
                                                <!--boton para guardar funcionario-->
                                                <div class="row" >                                                                         
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3">
                                                        <input type="submit" id="btn_guardar_informe" value="Guardar Informe" class="btn btn-success">
                                                    </div>

                                                    <div class="col-12 col-sm-6 col-md-4 mt-3">
                                                        <a type="button" class="btn btn-danger" href="{{ route('billing') }}">Volver Atras</a>
                                                    </div>
                                                </div>
                                                <!--Fin boton guardar funcionario-->
                                                </div>
                                                </div>                    
                                            </div>
                                    </div>
                                </form> 
                                <script>
                                    function cambiar_informe(){
                                        var selectElement = document.getElementById("tipo_informe").value;
                                        if(selectElement == "Convenio"){
                                            document.getElementById("div_nombre_dirigido").style.display='none'
                                            document.getElementById("div_cargo_dirigido").style.display='none'
                                            document.getElementById("div_unidad_dirigido").style.display='none'
                                            document.getElementById("div_fecha_informe").style.display=''
                                            document.getElementById("div_prefijo_dirigido").style.display='none' 
                                            document.getElementById("div-logo").style.display= ''
                                            document.getElementById("boton_agregar_funcionario").style.display='none'
                                            document.getElementById("div_nuevo_funcionario").style.display='none'
                                            document.getElementById("btn_guardar_informe").style.display='';
                                            document.getElementById("div_datos_persona_convenio").style.display='';
                                            document.getElementById("div_table_ci").style.display="";
                                            var div = document.getElementById("div_nuevo_funcionario");
                                            div.innerHTML = "";
                                        }else{
                                            document.getElementById("div_nombre_dirigido").style.display=''
                                            document.getElementById("div_cargo_dirigido").style.display=''
                                            document.getElementById("div_unidad_dirigido").style.display=''
                                            document.getElementById("div_fecha_informe").style.display=''
                                            document.getElementById("div_prefijo_dirigido").style.display='' 
                                            document.getElementById("div-logo").style.display= 'none'
                                            document.getElementById("boton_agregar_funcionario").style.display=''
                                            document.getElementById("div_nuevo_funcionario").style.display=''
                                            document.getElementById("btn_guardar_informe").style.display='none'
                                            document.getElementById("div_datos_persona_convenio").style.display='none'
                                            document.getElementById("div_table_ci").style.display='none'
                                            var div = document.getElementById("div_nuevo_funcionario");
                                            div.innerHTML = "";
                                        }
                                    }
                                </script>
                                <!--Verificacion del div de nuevos funcionarios-->
                                <script>
                                    document.getElementById('btn_guardar_informe').addEventListener('click',function(event){
                                        event.preventDefault();
                                            //document.getElementById('formulario_guardar').submit();
                                            var formData = new FormData();
                                            formData.append('dato_informe', CKEDITOR.instances['dato_informe'].getData());
                                            formData.append('id_usuario_generador',document.getElementById("id_usuario_generador").value);
                                            var usuario = document.getElementsByName("usuario[]");
                                            for (var i = 0; i < usuario.length; i++) {
                                                formData.append('usuario[]', usuario[i].value);
                                            }
                                            var cargo = document.getElementsByName("cargo[]");
                                            for (var i = 0; i < cargo.length; i++) {
                                                formData.append('cargo[]', cargo[i].value);
                                            }
                                            var unidad = document.getElementsByName("unidad[]");
                                            for (var i = 0; i < unidad.length; i++) {
                                                formData.append('unidad[]', unidad[i].value);
                                            }
                                            var firma = document.getElementsByName("firma[]");
                                            for (var i = 0; i < firma.length; i++) {
                                                formData.append('firma[]', firma[i].value);
                                            }
                                            //console.log(formData);
                                            // Realizar la solicitud AJAX
                                            $.ajax({
                                                type: "POST",
                                                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                                                url: "{{ route('guardar_informe') }}",
                                                data: formData,
                                                processData: false, // No procesar los datos
                                                contentType: false, // No configurar el tipo de contenido
                                                success: function(data) {
                                                    if(data.success == true){
                                                        Swal.fire({title: 'Informe Creado Correctamente', icon: 'success', timer:6000,showCloseButton: true, focusConfirm: false}).then(function() {
                                                            window.location = "/billing";
                                                        });
                                                    }
                                                    if(data.state == false){
                                                        swal.fire({position: "top-end",icon:"error",title:"Por favor Complete todos los datos requeridos",showConfirmButton:false,timer:1500});
                                                        var errors = data.errors;
                                                        const fieldsToCheck = ["referencia","tipo_informe","fecha","dato_informe","prioridad"];
                                                        fieldsToCheck.forEach(field => {
                                                            if (!errors[field]) {
                                                                $("#" + field + "_error").text("");
                                                            } else {
                                                                $("#" + field + "_error").text(errors[field][0]);
                                                            }
                                                        });
                                                    }
                                                    /*else{
                                                        Swal.fire({position: "top-end",icon: "error",title: "Error al Actualizar",showConfirmButton: false,timer: 1500});
                                                    }*/
                                                }
                                            });
                                        
                                    });
                                </script>
                                <!--Fin verificacion del div de nuevos funcionarios-->
                                <!-- fin cardformulario de informe-->        
                            </div>
                    </div>
                </div>
                <x-footers.auth></x-footers.auth>
            </div>
            
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
<!--fin data table-->
<!--Script llenar datos de los funcionarios-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!--Fin de Script del llenado de los funcionarios-->

        </main>
        <x-plugins></x-plugins>
</x-layout>
