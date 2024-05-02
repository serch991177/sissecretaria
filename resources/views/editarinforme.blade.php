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
                                    <h6 class="text-white text-capitalize ps-3">Formulario de edicion  de informe</h6>
                                    <!--<p class="text-white text-capitalize  ps-3">Oficinas</p>-->                            
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <!--card de creacion de oficinas-->
                                <form action="{{ route('actualizar_informe') }}" method="post" enctype="multipart/form-data"> 
                                     @csrf
                                    <div class="card">
                                        <div class="card-header card-header-info">
                                            <h1 class="card-title text-center">DATOS CABECERA</h1>
                                            <h4 class="card-title text-center"><span class="text-danger">(*)</span>Campos Obligatorios</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <input type="hidden" value="{{$solicitud->id}}" name="id" id="id">
                                                @php($json = json_decode($solicitud->usuario , false))
                                                @foreach($json as $jsons)
                                                <input type="hidden" value="{{$jsons->nombre}}" name="usuario[]" id="usuario">
                                                <input type="hidden" value="{{$jsons->cargo}}" name="cargo[]" id="cargo">
                                                <input type="hidden" value="{{$jsons->unidad}}" name="unidad[]" id="unidad">
                                                <input type="hidden" value="{{$jsons->firma}}" name="firma[]" id="firma">
                                                @endforeach
                                                <input type="hidden" value="{{$solicitud->estado}}" name="estado" id="estado">

                                                <div class="col-12">
                                                    <div class="form-group">
                                                            <div class="input-group input-group-static is-valid mb-4">
                                                                <label for="prioridad">Prioridad :<span class="text-danger">(*)</span></label>
                                                                <select class="form-control" name="prioridad" id="prioridad" >
                                                                    <option value="{{$solicitud->prioridad}}">{{$solicitud->prioridad}}</option>
                                                                    <option value="NORMAL">NORMAL</option>
                                                                    <option value="IMPORTANTE">IMPORTANTE</option>
                                                                    <option value="URGENTE">URGENTE</option>
                                                                </select>
                                                            </div>                                                       
                                                    </div>
                                                    @error('prioridad')
                                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                                    @enderror 
                                                </div>

                                                <div id="div_prefijo_dirigido" class="col-12">
                                                    <div class="form-group">
                                                            <div class="input-group input-group-static is-valid mb-4">
                                                                <label for="prefijo">Prefijo :<span class="text-danger">(*)</span></label>
                                                                <input type="text" name="prefijo" id="prefijo" class="form-control"  value="{{$solicitud->prefijo}}">
                                                            </div>                                                       
                                                    </div>
                                                    @error('prefijo')
                                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                                    @enderror
                                                </div>

                                                <div id="div_nombre_dirigido" class="col-12">
                                                    <div class="form-group">
                                                            <div class="input-group input-group-static is-valid mb-4">
                                                                <label for="dirigido_a">Dirigido a: <span class="text-danger">(*)</span></label>
                                                                <input type="text" list="nombre_dirigido" name="nombre_dirigido" id="nombre_dirigidos" class="form-control"  value="{{$solicitud->nombre_dirigido}}" >
                                                                <datalist id="nombre_dirigido">
                                                                @foreach($nombres_funcionarios->data as $nombres_funcionario)
                                                                @php($nombre_funcionario = $nombres_funcionario->nombres.' '.$nombres_funcionario->ap_paterno.' '.$nombres_funcionario->ap_materno )
                                                                    <option data-unidad="{{$nombres_funcionario->unidad}}" data-cargo="{{$nombres_funcionario->cargo}}" value="{{$nombre_funcionario}}">
                                                                @endforeach
                                                                </datalist>
                                                            </div>                                                       
                                                    </div>
                                                </div>

                                                <div id="div_cargo_dirigido" class="col-12">
                                                    <div class="form-group">
                                                            <div class="input-group input-group-static is-valid mb-4">
                                                                <label for="cargo">Cargo :<span class="text-danger">(*)</span></label>
                                                                <input type="text" name="cargo_dirigido" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="cargo_dirigido" class="form-control"  value="{{$solicitud->cargo_dirigido}}" >
                                                            </div>                                                       
                                                    </div>
                                                </div>

                                                <div id="div_unidad_dirigido" class="col-12">
                                                    <div class="form-group">
                                                            <div class="input-group input-group-static is-valid mb-4">
                                                                <label for="unidad">Unidad :<span class="text-danger">(*)</span></label>
                                                                <input type="text" name="unidad_dirigido" id="unidad_dirigido" class="form-control"  value="{{$solicitud->unidad_dirigido}}" >
                                                            </div>                                                       
                                                    </div>
                                                </div>
                                                @if($solicitud->tipo_informe == "Convenio")
                                                @else
                                                    <button type="button"  class="btn btn-success" name="boton_agregar_funcionario" id="boton_agregar_funcionario" >Agregar Funcionario</button>
                                                @endif
                                                <!--Cambios-->
                                                @if($solicitud->prefijo)
                                                    <div class="col-12" id="div_nuevo_funcionario" style="border:solid; ">
                                                        @php($array_prefijo=(json_decode($solicitud->prefijo, true)))
                                                        @php($array_nombre_dirigido=(json_decode($solicitud->nombre_dirigido, true)))
                                                        @php($array_cargo_dirigido=(json_decode($solicitud->cargo_dirigido, true)))
                                                        @php($array_unidad_dirigido=(json_decode($solicitud->unidad_dirigido, true)))
                                                        @for($i=0;$i<count($array_prefijo); $i++)
                                                        <div id="row">
                                                            <h6 style="text-align: center;">Datos del funcionario Seleccionado</h6>
                                                            <div style="float: left;">
                                                                <label>Prefijo: </label>
                                                                <input name="prefijo_guardar[]" type="text" id="prefijo_guardar" size="40" value="{{$array_prefijo[$i]}}">
                                                            </div>
                                                            <div style="float: right;">
                                                                <label>Dirigido a: </label>
                                                                <input name="dirigido_guardar[]" type="text" id="dirigido_guardar" size="50" value="{{$array_nombre_dirigido[$i]}}" oninput="this.value = this.value.toUpperCase()">
                                                            </div>
                                                            <div style="float: left;">
                                                                <label>Cargo: </label>
                                                                <input name="cargo_guardar[]" type="text" id="cargo_guardar" size="40" value="{{$array_cargo_dirigido[$i]}}" oninput="this.value = this.value.toUpperCase()">
                                                            </div>
                                                            <div style="float: right;">
                                                                <label>Unidad: </label>
                                                                <input name="unidad_guardar[]" type="text" id="unidad_guardar" size="50" value="{{$array_unidad_dirigido[$i]}}" oninput="this.value = this.value.toUpperCase()">
                                                            </div>
                                                        </div>
                                                        <br><br><br>
                                                        @endfor

                                                    </div>
                                                @endif
                                                <!--Fin cambios-->
                                                <div class="col-12">
                                                    <div class="form-group">
                                                            <div class="input-group input-group-static is-valid mb-4">
                                                                <label for="referencia">Referencia :<span class="text-danger">(*)</span></label>
                                                                <input type="text" name="referencia" id="referencia" class="form-control"  value="{{$solicitud->referencia}}" required>
                                                            </div>                                                       
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                            <div class="input-group input-group-static is-valid mb-4">
                                                                <label for="tipo_informe">Tipo Informe :<span class="text-danger">(*)</span></label>
                                                                <select class="form-control" name="tipo_informe" id="tipo_informe" required>
                                                                    <option value="{{$solicitud->tipo_informe}}">{{$solicitud->tipo_informe}}</option>
                                                                    @foreach($tipoinforme as $tipoinformes)   
                                                                    <option value="{{$tipoinformes->nombre}}">{{$tipoinformes->nombre}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>                                                        
                                                    </div>
                                                </div>


                                                <div  id="div_fecha_informe" class="col-12 col-sm-6 col-md-4 mt-3">
                                                    <div class="form-group">
                                                            <div class="input-group input-group-static is-valid mb-4">
                                                                <label for="fecha">Fecha :<span class="text-danger">(*)</span></label>
                                                                <input type="date" name="fecha" id="fecha" class="form-control"  value="{{$solicitud->fecha}}" min="new Date();" >
                                                            </div>                                                       
                                                    </div>
                                                </div>
                                                
                                                            
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
                                                                    <textarea class="ckeditor" name="dato_informe" id="dato_informe" rows="10" cols="80" required>{{$solicitud->dato_informe}}</textarea>
                                                                    <!--<input type="text" name="dato_informe" id="dato_informe" class="form-control"  value="{{old('dato_informe')}}">-->
                                                                </div>                                                       
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="div_datos_persona_convenio" class="col-12">
                                                    <h1 class="card-title text-center">DATOS DE LA PERSONA DEL CONVENIO</h1>
                                                    @php($array_convenio = json_decode($solicitud->datos_convenio,true))
                                                    <div class="form-group">
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <label >Nombre Completo:<span class="text-danger"></span></label>
                                                            <input type="text" name="nombre_convenio" id="nombre_convenio" class="form-control" value="">
                                                        </div>                                                       
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <label >Cargo :<span class="text-danger"></span></label>
                                                            <input type="text" name="cargo_convenio" id="cargo_convenio" class="form-control"  value="">
                                                        </div>                                                       
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <label >Empresa :<span class="text-danger"></span></label>
                                                            <input type="text" name="empresa_convenio" id="empresa_convenio" class="form-control"  value="">
                                                        </div>                                                       
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-success" id="btnAgregarPersona">Agregar Persona</button>
                                                    </div>
                                                </div>
                                                <!--Table-->
                                                <div class="div_table_ci" id="div_table_ci">
                                                    <table id="example" class="table table-bordered  table-hover dataTable dt-responsive nowrap" role="grid" aria-describedby="example">
                                                        <thead>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Cargo</th>
                                                                <th>Empresa</th>
                                                                <th>Opciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbody-example">
                                                            @if(!empty($array_convenio))
                                                                @foreach($array_convenio as $persona)
                                                                    <tr>
                                                                        <td><input type="text" style="border:0" name="nombreconvenio[]" value="{{ $persona['nombre_convenio'] }}"></td>
                                                                        <td><input type="text" style="border:0" name="cargoconvenio[]" value="{{ $persona['cargo_convenio'] }}"></td>
                                                                        <td><input type="text" style="border:0" name="empresaconvenio[]" value="{{ $persona['empresa_convenio'] }}"></td>
                                                                        <td><button type="button" style="border:0" class="btn btn-danger" onclick="quitarPersona(this)">Quitar persona</button></td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--Fin table-->
                                                <!--script para llenar el formulario-->
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        // Función para agregar persona a la tabla
                                                        function agregarPersona() {
                                                            var nombre = document.getElementById('nombre_convenio').value;
                                                            var cargo = document.getElementById('cargo_convenio').value;
                                                            var empresa = document.getElementById('empresa_convenio').value;

                                                            // Verificar si los campos no están vacíos
                                                            if (nombre && cargo && empresa) {
                                                                // Obtener el cuerpo de la tabla
                                                                var tbody = document.getElementById('tbody-example');

                                                                // Crear una nueva fila
                                                                var newRow = tbody.insertRow();

                                                                // Insertar celdas en la nueva fila
                                                                var cellNombre = newRow.insertCell(0);
                                                                var cellCargo = newRow.insertCell(1);
                                                                var cellEmpresa = newRow.insertCell(2);
                                                                var cellOpciones = newRow.insertCell(3);

                                                                // Llenar las celdas con los valores
                                                                cellNombre.innerHTML = `<input type="text" style="border:0" name="nombreconvenio[]" value="${nombre}">`;
                                                                cellCargo.innerHTML =   `<input type="text" style="border:0" name="cargoconvenio[]" value="${cargo}">`;
                                                                cellEmpresa.innerHTML =  `<input type="text" style="border:0" name="empresaconvenio[]" value="${empresa}">`;
                                                                cellOpciones.innerHTML = '<button type="button" style="border:0"  class="btn btn-danger" onclick="quitarPersona(this)">Quitar persona</button>';

                                                                document.getElementById('nombre_convenio').value="";
                                                                document.getElementById('cargo_convenio').value="";
                                                                document.getElementById('empresa_convenio').value="";
                                                            }
                                                        }

                                                        // Agregar evento al botón
                                                        document.getElementById('btnAgregarPersona').addEventListener('click', agregarPersona);
                                                    });

                                                    // Función para quitar persona
                                                    function quitarPersona(button) {
                                                        var row = button.parentNode.parentNode;
                                                        row.parentNode.removeChild(row);
                                                    }
                                                </script>
                                                <!--fin script para llenar el formulario-->
                                                <!--Pie de pagina-->
                                                <div class="row">                        
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                                <div class=" input-group-static is-valid mb-4">
                                                                    <label for="dato_informe">Pie de pagina (agregue el pie de pagina con un salto de linea):<span class="text-danger"></span></label>
                                                                    <textarea class="ckeditor" name="pie_pagina" id="pie_pagina">{{$solicitud->pie_pagina}}</textarea>
                                                                </div>                                                       
                                                        </div> 
                                                    </div> 
                                                    <script>
                                                        CKEDITOR.replace('pie_pagina', {toolbar: [],width: 1500, height: 50 });
                                                    </script>
                                                </div>
                                                <!--Fin pie pagina-->
                                                    <!--Imagen a subir-->
                                                    <style>
                                                        .file-upload {
                                                        background-color: #ffffff;
                                                        width: 600px;
                                                        margin: 0 auto;
                                                        padding: 20px;
                                                        }

                                                        .file-upload-btn {
                                                        width: 100%;
                                                        margin: 0;
                                                        color: #fff;
                                                        background: #1FB264;
                                                        border: none;
                                                        padding: 10px;
                                                        border-radius: 4px;
                                                        border-bottom: 4px solid #15824B;
                                                        transition: all .2s ease;
                                                        outline: none;
                                                        text-transform: uppercase;
                                                        font-weight: 700;
                                                        }

                                                        .file-upload-btn:hover {
                                                        background: #1AA059;
                                                        color: #ffffff;
                                                        transition: all .2s ease;
                                                        cursor: pointer;
                                                        }

                                                        .file-upload-btn:active {
                                                        border: 0;
                                                        transition: all .2s ease;
                                                        }

                                                        .file-upload-content {
                                                             text-align: center;
                                                        }

                                                        .file-upload-input {
                                                        position: absolute;
                                                        margin: 0;
                                                        padding: 0;
                                                        width: 100%;
                                                        height: 100%;
                                                        outline: none;
                                                        opacity: 0;
                                                        cursor: pointer;
                                                        }

                                                        .image-upload-wrap {
                                                        margin-top: 20px;
                                                        border: 4px dashed #1FB264;
                                                        position: relative;
                                                        }

                                                        .image-dropping,
                                                        .image-upload-wrap:hover {
                                                        background-color: #1FB264;
                                                        border: 4px dashed #ffffff;
                                                        }

                                                        .image-title-wrap {
                                                        padding: 0 15px 15px 15px;
                                                        color: #222;
                                                        }

                                                        .drag-text {
                                                        text-align: center;
                                                        }

                                                        .drag-text h3 {
                                                        font-weight: 100;
                                                        text-transform: uppercase;
                                                        color: #15824B;
                                                        padding: 60px 0;
                                                        }

                                                        .file-upload-image {
                                                        max-height: 200px;
                                                        max-width: 200px;
                                                        margin: auto;
                                                        padding: 20px;
                                                        }

                                                        .remove-image {
                                                        width: 200px;
                                                        margin: 0;
                                                        color: #fff;
                                                        background: #cd4535;
                                                        border: none;
                                                        padding: 10px;
                                                        border-radius: 4px;
                                                        border-bottom: 4px solid #b02818;
                                                        transition: all .2s ease;
                                                        outline: none;
                                                        text-transform: uppercase;
                                                        font-weight: 700;
                                                        }

                                                        .remove-image:hover {
                                                        background: #c13b2a;
                                                        color: #ffffff;
                                                        transition: all .2s ease;
                                                        cursor: pointer;
                                                        }

                                                        .remove-image:active {
                                                        border: 0;
                                                        transition: all .2s ease;
                                                        }
                                                    </style>
                                                    <script>
                                                        function readURL(input) {

                                                            if (input.files && input.files[0]) {

                                                                var reader = new FileReader();

                                                                reader.onload = function(e) {
                                                                $('.image-upload-wrap').hide();

                                                                $('.file-upload-image').attr('src', e.target.result);
                                                                $('.file-upload-content').show();

                                                                $('.image-title').html(input.files[0].name);
                                                                };

                                                                reader.readAsDataURL(input.files[0]);

                                                            } else {
                                                                removeUpload();
                                                            }
                                                        }

                                                        function removeUpload() {
                                                            $('.file-upload-input').replaceWith($('.file-upload-input').clone());
                                                            $('.file-upload-content').hide();
                                                            $('.image-upload-wrap').show();
                                                        }
                                                        

                                                    </script>
                                                    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                                                    <div id="div_image_update" style="display:none">
                                                        <div class="file-upload" >
                                                            <div class="file-upload-content">
                                                                <img class="file-upload-image" src="/archivos/{{ $solicitud->logo }}" alt="Tu Imagen" />
                                                                <div class="image-title-wrap">
                                                                <button type="button" onclick="removeUpload()" class="remove-image">Remover <span class="image-title">Imagen Subida</span></button>
                                                                </div>
                                                            </div>
                                                        </div>                                                     
                                                            
                                                        <div class="image-upload-wrap"  style="display:none" id="mostrar_subida">
                                                                <input class="file-upload-input" type='file' name="logo" id="logo"  onchange="readURL(this);" accept="image/*" />
                                                                <div class="drag-text" >
                                                                <h3>Arrastre y suelte una imagen o haga click Aqui</h3>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <!--fin imagen subir-->
                                                <!-- Fin Formulario de funcionario-->
                                                <!--boton para guardar funcionario-->
                                                
                                                <!--Fin boton guardar funcionario-->
                                                </div>
                                                </div>                    
                                            </div>
                                    </div>
                                </form> 
                                <div class="row"> 
                                    <div class="col-md-2">
                                        <input type="button" value="Actualizar Informe" class="btn btn-success" onclick="actualizarinforme()">
                                    </div>                                                                        
                                    <div class="col-md-2" >
                                        <form action="{{route('descargarpdf')}}" method="post" target="_blank">
                                            @csrf 
                                            <input type="hidden" name="id" value="{{$solicitud->id}}">
                                            <button class="btn btn-primary" title="Imprimir Informe">Vista Previa</button>
                                        </form>
                                    </div>
                                    <!--cambiar el id de 7 a 2-->
                                    @if(count($json) == 1)
                                        @if(auth()->user()->id == 2)
                                            <div class="col-md-2">
                                                <button type="button" title="Finalizar tramite" class="btn btn-info id_editar" data-bs-toggle="modal" data-bs-target="#exampleModal" value="{{$solicitud->id}}">
                                                    Finalizar Tramite
                                                </button>           
                                            </div>  
                                        @else
                                            <div class="col-md-2">
                                                <form action="{{route('enviar_para_revision')}} " method="post" >
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$solicitud->id}}">
                                                    <button class="btn btn-warning" title="Enviar a revision">Enviar a Revision</button>
                                                </form>
                                            </div>
                                        @endif
                                    @else
                                        @if(auth()->user()->id == 2)
                                            <div class="col-md-2">
                                                <button type="button" title="Finalizar tramite" class="btn btn-info id_editar" data-bs-toggle="modal" data-bs-target="#exampleModal" value="{{$solicitud->id}}">
                                                    Finalizar Tramite
                                                </button>           
                                            </div>         
                                        @else
                                            <div class="col-md-2">
                                                <form action="{{route('enviar_revision')}} " method="post" >
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$solicitud->id}}">
                                                    <button class="btn btn-warning" title="Enviar a revision">Enviar para revision</button>
                                                </form>
                                            </div>
                                        @endif
                                    @endif
                                    <!--Fin cambiar el id de 7 a 2-->
                                    <!--Modal finalizar tramite-->
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
                                                <i class="material-symbols-outlined" style="font-size:150px">warning</i>
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
                                    <!--Fin modal finalizar tramite-->
                                    @if(count($json) > 1)
                                    <div class="col-md-2">
                                        <!--boton observar-->
                                        <button type="button" title="Observar tramite" class="btn btn-dark id_observar" data-bs-toggle="modal" data-bs-target="#exampleModalobservacion" value="{{$solicitud->id}}">
                                            Observar Tramite
                                        </button>   
                                        <!--modal observacion-->
                                        <div class="modal fade" id="exampleModalobservacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title col-11 text-center" id="exampleModalLabel">Observar Tramite</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    </div>
                                                    <form name="formulario_final" id="formulario_final" action="{{route('observar_tramite')}}" method="post" >
                                                    @csrf 
                                                        <div id="inputidobservar_div"></div>
                                                        <div class="text-center"><label for="">Ingrese la Observacion</label></div>                                                    
                                                        <div class="text-center">
                                                            <textarea name="observacion_text" id="observacion_text" cols="30" rows="5" require></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="button" class="btn bg-gradient-primary" onclick="observartramite()">Observar Tramite</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--fin modal observacion-->
                                        <!--funcion guardar y recuperar el id de la observacion-->
                                        <script>
                                            $(document).ready(function(){
                                                $(document).on('click', '.id_observar', function(){
                                                    var id=$(this).val();
                                                    console.log(id);
                                                    let inputid="";
                                                    inputid += `<input type="hidden"  name="id_recuperarobservacion" id="id_recuperarobservacion" value="${id}">`;
                                                    document.getElementById('inputidobservar_div').innerHTML = inputid;
                                                });
                                            });
                                            function observartramite(){
                                                var formData = new FormData();
                                                formData.append('id_recuperarobservacion', document.getElementById("id_recuperarobservacion").value);
                                                formData.append('observacion_text', document.getElementById("observacion_text").value);
                                                // Realizar la solicitud AJAX
                                                $.ajax({
                                                    type: "POST",
                                                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                                                    url: "{{ route('observar_tramite') }}",
                                                    data: formData,
                                                    processData: false, // No procesar los datos
                                                    contentType: false, // No configurar el tipo de contenido
                                                    success: function(data) {
                                                        if(data.success == true){
                                                            Swal.fire({position:"top-end",title: 'Observado Correctamente', icon: 'success', timer:3000,showCloseButton: true, focusConfirm: false}).then(function() {
                                                                window.location = "/revisar-informe";
                                                            });
                                                            Swal.fire({position: "top-end",icon: "success",title: "Informe Actualizado correctamente",showConfirmButton: false,timer: 1500});
                                                        }else{
                                                            Swal.fire({position: "top-end",icon: "error",title: "Por favor ingrese su observacion",showConfirmButton: false,timer: 1500});
                                                        }

                                                    }
                                                });
                                            }
                                        </script>
                                        <!--Fin cambios observacion-->
                                    </div>
                                    @endif
                                    <div class="col-md-2" >
                                        <a href="#" type="button" onclick="redireccionarPaginaAnterior()" class="btn btn-danger">Vover atras</a>
                                    </div>
                                </div>
                                <style>
                                    .my-select-styling{
                                        pointer-events:none;
                                        background-color: #f9f9f9;
                                    }
                                </style>
                                <script>
                                    var valor_tipo_estado= document.getElementById("tipo_informe").value;
                                    const tipoInformeSelect = document.getElementById("tipo_informe");
                                    const convenioOption = tipoInformeSelect.querySelector("option[value='Convenio']");
                                        if(valor_tipo_estado == "Convenio"){
                                            document.getElementById("div_nombre_dirigido").style.display='none'
                                            document.getElementById("div_cargo_dirigido").style.display='none'
                                            document.getElementById("div_unidad_dirigido").style.display='none'
                                            document.getElementById("div_fecha_informe").style.display='none'
                                            document.getElementById("div_prefijo_dirigido").style.display='none'
                                            document.getElementById("tipo_informe").classList.add('my-select-styling')
                                            document.getElementById("div_image_update").style.display=''
                                            document.getElementById("div_datos_persona_convenio").style.display=''
                                            document.getElementById("div_table_ci").style.display="";
                                        }else{
                                            document.getElementById("div_nombre_dirigido").style.display=''
                                            document.getElementById("div_cargo_dirigido").style.display=''
                                            document.getElementById("div_unidad_dirigido").style.display=''
                                            document.getElementById("div_fecha_informe").style.display=''
                                            document.getElementById("prefijo").value='';
                                            document.getElementById("nombre_dirigidos").value='';
                                            document.getElementById("cargo_dirigido").value='';
                                            document.getElementById("unidad_dirigido").value='';
                                            convenioOption.style.display = "none";
                                            document.getElementById("div_image_update").style.display='none'
                                            document.getElementById("div_datos_persona_convenio").style.display='none'
                                            document.getElementById("div_table_ci").style.display='none'
                                            //document.getElementById("tipo_informe").disabled= false
                                        }
                                </script>
        
                               <!--Funcion agregar mas de 1 usario-->
                                <script>
                                    var button = document.getElementById('boton_agregar_funcionario');
                                    var count=0;
                                    button.addEventListener('click', function() {
                                        var emptyCount=0;     
                                        if(document.getElementById('prefijo').value === ''){
                                            emptyCount++;
                                        }
                                        if(document.getElementById('nombre_dirigidos').value === ''){
                                            emptyCount++;
                                        }
                                        if(document.getElementById('cargo_dirigido').value === ''){
                                            emptyCount++;
                                        }
                                        if(document.getElementById('unidad_dirigido').value === ''){
                                            emptyCount++;
                                        }
                                        if(emptyCount == 0){
                                            var valordefinido = count++;
                                            /**creacion del contenedor */
                                            var contenedor = document.getElementById("div_nuevo_funcionario");
                                            /**Creacion  Div*/
                                            var nuevoElemento = document.createElement("div");
                                            nuevoElemento.id="row"+valordefinido;
                                            //Fin Div
                                            /**crear h6 */
                                            var tituloh6 = document.createElement("h6");
                                            tituloh6.textContent="Datos del funcionario Seleccionado";
                                            tituloh6.style.textAlign="center";
                                            /**Fin crear h6 */
                                            /**creacion div prefijo con label e input*/
                                            var childDivprefijo = document.createElement('div');
                                            childDivprefijo.style.float = 'left';
                                            var labelprefijo = document.createElement("label");
                                            labelprefijo.textContent="Prefijo: ";
                                            
                                            var inputprefijo = document.createElement("input");
                                            inputprefijo.name = "prefijo_guardar[]";
                                            inputprefijo.type="text";
                                            inputprefijo.id="prefijo_guardar"+valordefinido;
                                            inputprefijo.setAttribute('size', '40');
                                            /**Fin creacion div prefijo con label e input*/
                                            
                        
                                            /**creacion div prefijo con label e input*/
                                            var childDivdirigido = document.createElement('div');
                                            childDivdirigido.style.float = 'right';
                                            var labeldirigido = document.createElement("label");
                                            labeldirigido.textContent="Dirigido a: ";
                                            var inputdirigido = document.createElement("input");
                                            inputdirigido.name = "dirigido_guardar[]";
                                            inputdirigido.type="text";
                                            inputdirigido.id="dirigido_guardar"+valordefinido;
                                            inputdirigido.setAttribute('size', '50');
                                            inputdirigido.addEventListener('input', function() {this.value = this.value.toUpperCase();});
                                            /**fin creacion div prefijo con label e input*/
                                            /**creacion div cargo con label e input*/
                                            var childDivcargo = document.createElement('div');
                                            childDivcargo.style.float = 'left';
                                            var labelcargo = document.createElement("label");
                                            labelcargo.textContent="Cargo: ";
                                            var inputcargo = document.createElement("input");
                                            inputcargo.name = "cargo_guardar[]";
                                            inputcargo.type="text";
                                            inputcargo.id="cargo_guardar"+valordefinido;
                                            inputcargo.setAttribute('size', '40');
                                            inputcargo.addEventListener('input', function() {this.value = this.value.toUpperCase();});
                                            /**fin creacion div cargo con label e input */
                                            
                                            /**crear input unidad*/
                                            var childDivUnidad = document.createElement('div');
                                            childDivUnidad.style.float = 'right';
                                            var labelUnidad = document.createElement("label");
                                            labelUnidad.textContent="Unidad: ";
                                            var inputunidad = document.createElement("input");
                                            inputunidad.name = "unidad_guardar[]";
                                            inputunidad.type="text";
                                            inputunidad.id="unidad_guardar"+valordefinido;
                                            inputunidad.setAttribute('size', '50');
                                            inputunidad.addEventListener('input', function() {this.value = this.value.toUpperCase();});
                                            /**fin crear input unidad */
                                            /**Creacion div del boton*/
                                            var childDivboton = document.createElement('div');
                                            childDivboton.style.textAlign = "center"
                                            
                                            /**fin creacion div del boton */
                                            /**Creacion del boton eliminar*/
                                            var boton1=document.createElement("button");
                                            boton1.textContent = "Quitar Funcionario";
                                            boton1.type = "button";
                                            boton1.id=valordefinido;
                                            boton1.classList.add("btn");
                                            boton1.classList.add("btn-danger");
                                            boton1.onclick = function() {
                                                Swal.fire({
                                                    title: 'Estas Seguro?',
                                                    text: "No podras revertir esta accion!",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Si, Quitarlo!'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        var button_id = $(this).attr("id");  
                                                        $('#row'+button_id+'').remove();
                                                        Swal.fire(
                                                        'Quitado!',
                                                        'El funcionario fue quitado correctamente!.',
                                                        'success'
                                                        )
                                                    }
                                                })
                                            };
                                            /**Fin Creacion del boton Eliminar*/
                                            /**creacion br*/ 
                                            var etiquetabr = document.createElement("br");
                                            //fin br
                                            /**Append div prefijo */
                                            childDivprefijo.appendChild(labelprefijo);
                                            childDivprefijo.appendChild(inputprefijo);
                                            /**Fin append div prefijo */
                                            /**Append div dirigido */
                                            childDivdirigido.appendChild(labeldirigido);
                                            childDivdirigido.appendChild(inputdirigido);
                                            /**Fin append div dirigido */
                                            /**Append div cargo */
                                            childDivcargo.appendChild(labelcargo);
                                            childDivcargo.appendChild(inputcargo);
                                            /**Fin append div cargo */
                                            /**Append div unidad*/
                                            childDivUnidad.appendChild(labelUnidad);
                                            childDivUnidad.appendChild(inputunidad);
                                            /**Fin append div unidad */
                                            /**Append div boton*/
                                            childDivboton.appendChild(boton1);
                                            /**Fin Append div boton*/
                                            /**Agregar los elementos al div*/
                                            nuevoElemento.appendChild(tituloh6);
                                            nuevoElemento.appendChild(childDivprefijo);
                                            nuevoElemento.appendChild(childDivdirigido);
                                            nuevoElemento.appendChild(childDivcargo);
                                            nuevoElemento.appendChild(childDivUnidad);
                                            nuevoElemento.appendChild(childDivboton);
                                            //**Fin agregar los elementos al div */
                                            //agregar el nuevo div al contenedor
                                            contenedor.appendChild(nuevoElemento);
                                            contenedor.appendChild(etiquetabr);
                                            //Fin agregar el nuevo div al contenedor
                                            //Asignacion de valores
                                            var valorprefijo = document.getElementById("prefijo").value;
                                            var valordirigido = document.getElementById("nombre_dirigidos").value;
                                            var valorcargo = document.getElementById("cargo_dirigido").value;
                                            var valorunidad = document.getElementById("unidad_dirigido").value;
                                            $('#prefijo_guardar'+valordefinido+'').val(valorprefijo);
                                            $('#dirigido_guardar'+valordefinido+'').val(valordirigido);
                                            $('#cargo_guardar'+valordefinido+'').val(valorcargo);
                                            $('#unidad_guardar'+valordefinido+'').val(valorunidad);
                                            document.getElementById("prefijo").value= "";
                                            document.getElementById("nombre_dirigidos").value= "";
                                            document.getElementById("cargo_dirigido").value= "";
                                            document.getElementById("unidad_dirigido").value= "";
                                            document.getElementById("btn_guardar_informe").style.display='';
                                        }else{
                                            Swal.fire({icon: 'error',title: 'Oops...',text: 'Por favor complete los campos requeridos!'})                                                
                                        }   
                                    });
                                </script>
                                <!--Fin funcion agregar mas de 1 usuario-->
                                <!-- fin cardformulario de oficinas-->        
                            </div>
                    </div>
                </div>
                <x-footers.auth></x-footers.auth>
            </div>
            
            
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<script>
    $("#nombre_dirigidos").on('change', function () {
        
        /**Recuperacion del cargo */
        var val=$('#nombre_dirigidos').val();
        var cargo = $('#nombre_dirigido').find('option[value="'+val+'"]').data('cargo');
        if(cargo == undefined){
            console.log("se cumple cargo");
            document.getElementById("cargo_dirigido").value= ""    
        }else{
        document.getElementById("cargo_dirigido").value = cargo
        }
        /**Fin recuperacion del cargo */
        /**Recuperacion de la unidad */
        var unidad = $('#nombre_dirigido').find('option[value="'+val+'"]').data('unidad');
        if(unidad == undefined){
            console.log("se cumple unidad");
        document.getElementById("unidad_dirigido").value = ""
        }else{
        document.getElementById("unidad_dirigido").value = unidad
        }
        /**Fin Recuperacion de la unidad */

    });
</script>
<!--Fin de Script del llenado de los funcionarios-->
<!--redireccionar atras-->
<script>
    function redireccionarPaginaAnterior() {
        history.back();
    }
</script>
<!--Funcion actualizar-->
<script>
    /*function actualizarinforme(){    
        var formData = new FormData();
        formData.append('logo', document.getElementById("logo").files[0]);
        console.log(formData)
        
        var id= document.getElementById("id").value;
        var usuario = document.getElementsByName("usuario[]");
        var usuario_values = [];
        for (var i = 0; i < usuario.length; i++) {
            usuario_values.push(usuario[i].value);
        }
        var cargo = document.getElementsByName("cargo[]");
        var cargo_values = [];
        for (var i = 0; i < cargo.length; i++) {
            cargo_values.push(cargo[i].value);
        }
        var unidad = document.getElementsByName("unidad[]");
        var unidad_values = [];
        for (var i = 0; i < unidad.length; i++) {
            unidad_values.push(unidad[i].value);
        }
        var firma = document.getElementsByName("firma[]");
        var firma_values = [];
        for (var i = 0; i < firma.length; i++) {
            firma_values.push(firma[i].value);
        }
        var prioridad = document.getElementById("prioridad").value;
        var referencia = document.getElementById("referencia").value;
        var tipo_informe = document.getElementById("tipo_informe").value;
        var dato_informe = CKEDITOR.instances['dato_informe'].getData();
        var pie_pagina = CKEDITOR.instances['pie_pagina'].getData();
        var logo = document.getElementById("logo").files[0]; 
        console.log(logo)
        var nombreconvenio = document.getElementsByName("nombreconvenio[]");
        var nombreconvenio_values = [];
        for (var i = 0; i < nombreconvenio.length; i++) {
            nombreconvenio_values.push(nombreconvenio[i].value);
        }
        var cargoconvenio = document.getElementsByName("cargoconvenio[]");
        var cargoconvenio_values = [];
        for(var i=0; i < cargoconvenio.length; i++){
            cargoconvenio_values.push(cargoconvenio[i].value);
        }

        var empresaconvenio = document.getElementsByName("empresaconvenio[]");
        var empresaconvenio_values = [];
        for(var i=0;i<empresaconvenio.length;i++){
            empresaconvenio_values.push(empresaconvenio[i].value);
        }
        //console.log(dataToSend)
        $.ajax({
            type:"POST",
            headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
            url: "{{route('actualizar_informe')}}",
            //async:false,
            data:formData,
            processData: false, // No procesar los datos
        contentType: false, // No configurar el tipo de contenido
            success:function(data)
            {
                console.log(data);
                
            }
        })
    }*/
    function actualizarinforme() {    
        var formData = new FormData();
        formData.append('id', document.getElementById("id").value);
        formData.append('prioridad', document.getElementById("prioridad").value);
        formData.append('referencia', document.getElementById("referencia").value);
        formData.append('tipo_informe', document.getElementById("tipo_informe").value);
        formData.append('dato_informe', CKEDITOR.instances['dato_informe'].getData());
        formData.append('pie_pagina', CKEDITOR.instances['pie_pagina'].getData());
        formData.append('logo', document.getElementById("logo").files[0]);
        formData.append('fecha', document.getElementById("fecha").value);
        formData.append('estado', document.getElementById("estado").value);


        var prefijo_guardar = document.getElementsByName("prefijo_guardar[]");
        for (var i = 0; i < prefijo_guardar.length; i++) {
            formData.append('prefijo_guardar[]', prefijo_guardar[i].value);
        }
        var dirigido_guardar = document.getElementsByName("dirigido_guardar[]");
        for (var i = 0; i < dirigido_guardar.length; i++) {
            formData.append('dirigido_guardar[]', dirigido_guardar[i].value);
        }
        var cargo_guardar = document.getElementsByName("cargo_guardar[]");
        for (var i = 0; i < cargo_guardar.length; i++) {
            formData.append('cargo_guardar[]', cargo_guardar[i].value);
        }
        var unidad_guardar = document.getElementsByName("unidad_guardar[]");
        for (var i = 0; i < unidad_guardar.length; i++) {
            formData.append('unidad_guardar[]', unidad_guardar[i].value);
        }


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

        var nombreconvenio = document.getElementsByName("nombreconvenio[]");
        for (var i = 0; i < nombreconvenio.length; i++) {
            formData.append('nombreconvenio[]', nombreconvenio[i].value);
        }

        var cargoconvenio = document.getElementsByName("cargoconvenio[]");
        for(var i=0; i < cargoconvenio.length; i++){
            formData.append('cargoconvenio[]', cargoconvenio[i].value);
        }

        var empresaconvenio = document.getElementsByName("empresaconvenio[]");
        for(var i=0; i<empresaconvenio.length; i++){
            formData.append('empresaconvenio[]', empresaconvenio[i].value);
        }

        // Realizar la solicitud AJAX
        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            url: "{{ route('actualizar_informe') }}",
            data: formData,
            processData: false, // No procesar los datos
            contentType: false, // No configurar el tipo de contenido
            success: function(data) {
                if(data.success == true){
                    Swal.fire({position: "top-end",icon: "success",title: "Informe Actualizado correctamente",showConfirmButton: false,timer: 1500});
                }else{
                    Swal.fire({position: "top-end",icon: "error",title: "Error al Actualizar",showConfirmButton: false,timer: 1500});
                }

            }
        });
    }

</script>

    


    </main>
    <x-plugins></x-plugins>
</x-layout>
