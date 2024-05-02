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
                                        <div class="card-header card-header-info">
                                            <h1 class="card-title text-center">DATOS CABECERA</h1>
                                            <h4 class="card-title text-center"><span class="text-danger">(*)</span>Campos Obligatorios</h4>
                                        </div>
                                        <div class="card-body">
                                                <div class="row">
                                                    <input type="hidden" value="{{$nombre_completo->id}}" name="id_usuario_generador" id="id_usuario_generador">
                                                    <input type="hidden" value="{{$nombre_completo->nombre_completo}}" name="usuario[]" id="usuario">
                                                    <input type="hidden" value="{{$nombre_completo->cargo}}" name="cargo[]" id="cargo">
                                                    <input type="hidden" value="{{$nombre_completo->unidad}}" name="unidad[]" id="unidad">
                                                    <input type="hidden" value="{{$nombre_completo->firma}}" name="firma[]" id="firma">

                                                    <input type="hidden" value="Pendiente" name="estado" id="estado">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="input-group input-group-static is-valid mb-4">
                                                                <label for="tipo_informe">Tipo Informe :<span class="text-danger">(*)</span></label>
                                                                <select class="form-control" name="tipo_informe" id="tipo_informe" onchange="cambiar_informe()">
                                                                    <option value="{{old('tipo_informe')}}">* Seleccione una opción *</option>
                                                                    @foreach($tipoinforme as $tipoinformes)
                                                                    <option value="{{$tipoinformes->nombre}}">{{$tipoinformes->nombre}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>                                                       
                                                        </div>
                                                        <p class="text-danger inputerror" id="tipo_informe_error"></p>
                                                        @error('tipo_informe')
                                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                                        @enderror 
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="input-group input-group-static is-valid mb-4">
                                                                <label for="prioridad">Prioridad :<span class="text-danger">(*)</span></label>
                                                                <select class="form-control" name="prioridad" id="prioridad" >
                                                                    <option value="{{old('prioridad')}}">* Seleccione una opción *</option>
                                                                    <option value="NORMAL">NORMAL</option>
                                                                    <option value="IMPORTANTE">IMPORTANTE</option>
                                                                    <option value="URGENTE">URGENTE</option>
                                                                </select>
                                                            </div>                                                       
                                                        </div>
                                                        <p class="text-danger inputerror" id="prioridad_error"></p>
                                                        @error('prioridad')
                                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                                        @enderror 
                                                    </div>
                                                    
                                                    <div id="div_prefijo_dirigido" class="col-12">
                                                        <div class="form-group">
                                                                <div class="input-group input-group-static is-valid mb-4">
                                                                    <label for="prefijo">Prefijo :<span class="text-danger">(*)</span></label>
                                                                    <input type="text" name="prefijo" id="prefijo" class="form-control"  value="{{old('prefijo')}}">
                                                                </div>                                                       
                                                        </div>
                                                        @error('prefijo')
                                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                    <div  id="div_nombre_dirigido" class="col-12">
                                                        <div class="form-group">
                                                                <div class="input-group input-group-static is-valid mb-4">
                                                                    <label for="dirigido_a">Dirigido a: <span class="text-danger">(*)</span></label>
                                                                    <input type="text" list="nombre_dirigido" name="nombre_dirigido" id="nombre_dirigidos" class="form-control"  value="{{old('nombre_dirigido')}}">
                                                                    <datalist id="nombre_dirigido">
                                                                    @foreach($nombres_funcionarios->data as $nombres_funcionario)
                                                                    @php($nombre_funcionario = $nombres_funcionario->nombres.' '.$nombres_funcionario->ap_paterno.' '.$nombres_funcionario->ap_materno )
                                                                        <option data-unidad="{{$nombres_funcionario->unidad}}" data-cargo="{{$nombres_funcionario->cargo}}" value="{{$nombre_funcionario}}">
                                                                    @endforeach
                                                                    </datalist>

                                                                </div>                                                       
                                                        </div>
                                                        @error('nombre_dirigido')
                                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                                        @enderror 
                                                    </div>
                                                    <div id="div_cargo_dirigido" class="col-12">
                                                        <div class="form-group">
                                                                <div class="input-group input-group-static is-valid mb-4">
                                                                    <label for="cargo">Cargo :<span class="text-danger">(*)</span></label>
                                                                    <input type="text" name="cargo_dirigido" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="cargo_dirigido" class="form-control"  value="{{old('cargo_dirigido')}}">
                                                                </div>                                                       
                                                        </div>
                                                        @error('cargo_dirigido')
                                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                                        @enderror 
                                                    </div>
                                                    <div id="div_unidad_dirigido" class="col-12">
                                                        <div class="form-group">
                                                                <div class="input-group input-group-static is-valid mb-4">
                                                                    <label for="unidad">Unidad :<span class="text-danger">(*)</span></label>
                                                                    <input type="text" name="unidad_dirigido" id="unidad_dirigido" class="form-control"  value="{{old('unidad_dirigido')}}">
                                                                </div>                                                       
                                                        </div>
                                                        @error('unidad_dirigido')
                                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                                        @enderror 
                                                    </div>
                                                    <!--Agregar mas de 1 funcionario-->
                                                    <button type="button"  class="btn btn-success" name="boton_agregar_funcionario" id="boton_agregar_funcionario">Agregar Funcionario</button>
                                                    <div class="col-12" id="div_nuevo_funcionario" style="border:solid;"></div>

                                                    <!--Fin Agregar mas de 1 funcionario-->
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="input-group input-group-static is-valid mb-4">
                                                                <label for="referencia">Referencia :<span class="text-danger">(*)</span></label>
                                                                <input type="text" name="referencia" id="referencia" class="form-control"  value="{{old('referencia')}}">
                                                            </div>                                                       
                                                        </div>
                                                        <p class="text-danger inputerror" id="referencia_error"></p>
                                                        @error('referencia')
                                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                                        @enderror 
                                                    </div>
                                                    <div  id="div_fecha_informe" class="col-12 col-sm-6 col-md-4 mt-3">
                                                        <div class="form-group">
                                                            <div class="input-group input-group-static is-valid mb-4">
                                                                <label for="fecha">Fecha :<span class="text-danger">(*)</span></label>
                                                                <input type="date" name="fecha" id="fecha" class="form-control"  value="{{old('fecha')}}" min="new Date();">
                                                            </div>                                                       
                                                        </div>
                                                        <p class="text-danger inputerror" id="fecha_error"></p>
                                                        @error('fecha')
                                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                                        @enderror 
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
                                                <!--datos de la persona convenio-->
                                                <div id="div_datos_persona_convenio" class="col-12">
                                                    <h1 class="card-title text-center">DATOS DE LA PERSONA DEL CONVENIO</h1>
                                                    <div class="form-group">
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <label >Nombre Completo:<span class="text-danger"></span></label>
                                                            <input type="text" name="nombre_convenio" id="nombre_convenio" class="form-control"  value="{{old('nombre_convenio')}}">
                                                        </div>                                                       
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <label >Cargo :<span class="text-danger"></span></label>
                                                            <input type="text" name="cargo_convenio" id="cargo_convenio" class="form-control"  value="{{old('cargo_convenio')}}">
                                                        </div>                                                       
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <label >Empresa :<span class="text-danger"></span></label>
                                                            <input type="text" name="empresa_convenio" id="empresa_convenio" class="form-control"  value="{{old('empresa_convenio')}}">
                                                        </div>                                                       
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-success" id="btnAgregarPersona">Agregar Persona</button>
                                                    </div>
                                                </div>
                                                <!--fin datos de la persona convenio-->
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
                                                                    <textarea class="ckeditor" name="pie_pagina" id="pie_pagina">{{old('pie_pagina')}}</textarea> 
                                                                </div>                                                       
                                                        </div> 
                                                    </div> 
                                                </div>


                                                <script>
                                                    CKEDITOR.replace('pie_pagina', {toolbar: [],width: 1500, height: 50 });
                                                </script>
                                            

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
                                                        display: none;
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
                                                    $('.image-upload-wrap').bind('dragover', function () {
                                                            $('.image-upload-wrap').addClass('image-dropping');
                                                        });
                                                        $('.image-upload-wrap').bind('dragleave', function () {
                                                            $('.image-upload-wrap').removeClass('image-dropping');
                                                    });

                                                </script>
                                                <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                                                    <div class="file-upload" id="div-logo">
                                                        <!--<button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )" accept=".doc, .docx,.pdf, .txt, .xlsx,.pptx">Agregar Imagen</button>-->
                                                        <div class="image-upload-wrap">
                                                            <input class="file-upload-input" type='file' name="logo" id="logo" value="{{old('logo')}}" onchange="readURL(this);" accept="image/*" />
                                                            <div class="drag-text">
                                                            <h3>Arrastre y suelte un logo o haga click Aqui</h3>
                                                            </div>
                                                        </div>
                                                        <div class="file-upload-content">
                                                            <img class="file-upload-image" src="#" alt="Tu Imagen" />
                                                            <div class="image-title-wrap">
                                                            <button type="button" onclick="removeUpload()" class="remove-image">Remover Archivo:<span class="image-title">Archivo Subido</span></button>
                                                            </div>
                                                        </div>
                                                        {{--@error('logo')
                                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                                        @enderror --}}
                                                    </div>
                                                <!-- fin imagen subir-->
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
                                <!--Funcion Agregar mas de 1 funcionario-->
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
                                            nuevoElemento.appendChild(etiquetabr);
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
                                <!--Fin funcion agregar mas de 1 funcionario-->
                                <!--Verificacion del div de nuevos funcionarios-->
                                <script>
                                    document.getElementById('btn_guardar_informe').addEventListener('click',function(event){
                                        event.preventDefault();
                                        var tipo_documento = document.getElementById("tipo_informe").value;
                                        var miDiv = document.getElementById('div_nuevo_funcionario');
                                        if(miDiv.innerHTML.trim()==="" && tipo_documento!="Convenio" ){
                                            swal.fire('ERROR','Por Favor como minimo agregue un funcionario','error');
                                        }else{
                                            //document.getElementById('formulario_guardar').submit();
                                            var formData = new FormData();
                                            formData.append('prioridad', document.getElementById("prioridad").value);
                                            formData.append('referencia', document.getElementById("referencia").value);
                                            formData.append('tipo_informe', document.getElementById("tipo_informe").value);
                                            formData.append('dato_informe', CKEDITOR.instances['dato_informe'].getData());
                                            formData.append('pie_pagina', CKEDITOR.instances['pie_pagina'].getData());
                                            formData.append('logo', document.getElementById("logo").files[0]);
                                            formData.append('fecha', document.getElementById("fecha").value);
                                            formData.append('estado', document.getElementById("estado").value);
                                            formData.append('id_usuario_generador',document.getElementById("id_usuario_generador").value);
                                            
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
                                        }
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

        </main>
        <x-plugins></x-plugins>
</x-layout>
