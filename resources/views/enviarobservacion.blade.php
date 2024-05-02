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
                                <form action="{{ route('guardar_actualizar_observacion') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card">
                                        <div class="card-header card-header-info">
                                            <h1 class="card-title text-center">DATOS CABECERA</h1>
                                            <h4 class="card-title text-center"><span class="text-danger">(*)</span>Campos Obligatorios</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <input type="hidden" value="{{$solicitud->id}}" name="id_informe" id="id_informe">
                                                @foreach($consulta_observado as $consulta_observados)
                                                <input type="hidden" value="{{$consulta_observados->id}}" name="id_observacion" id="id_observacion">
                                                @endforeach
                                                @php($json = json_decode($solicitud->usuario , false))
                                                @foreach($json as $jsons)
                                                <input type="hidden" value="{{$jsons->nombre}}" name="usuario[]" id="usuario">
                                                <input type="hidden" value="{{$jsons->cargo}}" name="cargo[]" id="cargo">
                                                <input type="hidden" value="{{$jsons->unidad}}" name="unidad[]" id="unidad">
                                                <input type="hidden" value="{{$jsons->firma}}" name="firma[]" id="firma">
                                                @endforeach
                                                <input type="hidden" value="Derivado" name="estado" id="estado">
                                                @if($solicitud->estado =="Observado")
                                                <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
                                                <style>
                                                    /* Custom style to set icon size */
                                                    .alert i[class^="bi-"]{
                                                        font-size: 1.5rem;
                                                        line-height: 1;
                                                    }
                                                </style>
                                                <div class="alert alert-danger alert-dismissible fade show">
                                                    <h4 class="alert-heading" style="color:white;"><i class="bi-exclamation-octagon-fill"></i> Oops! El presente documento tiene la siguiente observacion :</h4>
                                                    <p style="color:white">{{$solicitud->observacion}}</p>
                                                </div>
                                                @endif 
                                                <div id="div_prefijo_dirigido" class="col-12">
                                                    <div class="form-group">
                                                            <div class="input-group input-group-static is-valid mb-4">
                                                                <label for="prefijo">Prefijo :<span class="text-danger">(*)</span></label>
                                                                <input type="text" name="prefijo" id="prefijo" class="form-control"  {{--value="{{$solicitud->prefijo}}"--}} >
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
                                                                <input type="text" list="nombre_dirigido" name="nombre_dirigido" id="nombre_dirigidos" class="form-control"  {{--value="{{$solicitud->nombre_dirigido}}"--}} >
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
                                                                <input type="text" name="cargo_dirigido" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="cargo_dirigido" class="form-control"  {{--value="{{$solicitud->cargo_dirigido}}"--}} >
                                                            </div>                                                       
                                                    </div>
                                                </div>

                                                <div id="div_unidad_dirigido" class="col-12">
                                                    <div class="form-group">
                                                            <div class="input-group input-group-static is-valid mb-4">
                                                                <label for="unidad">Unidad :<span class="text-danger">(*)</span></label>
                                                                <input type="text" name="unidad_dirigido" id="unidad_dirigido" class="form-control"  {{--value="{{$solicitud->unidad_dirigido}}"--}} >
                                                            </div>                                                       
                                                    </div>
                                                </div>
                                                <!--Cambios-->
                                                @if($solicitud->tipo_informe == "Convenio")
                                                @else
                                                    <button type="button"  class="btn btn-success" name="boton_agregar_funcionario" id="boton_agregar_funcionario" >Agregar Funcionario</button>
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
                                                        }else{
                                                            Swal.fire({icon: 'error',title: 'Oops...',text: 'Por favor complete los campos requeridos!'})                                                
                                                        }   
                                                    });
                                                </script>
                                                <!--Fin funcion agregar mas de 1 usuario-->

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
                                                                <select class="form-control" name="tipo_informe" id="tipo_informe" style="pointer-events:none;background-color: #f9f9f9;" required>
                                                                    <option value="{{$solicitud->tipo_informe}}">{{$solicitud->tipo_informe}}</option>
                                                                    @foreach($tipoinforme as $tipoinformes)   
                                                                    <option value="{{$tipoinformes->nombre}}">{{$tipoinformes->nombre}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>                                                        
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-4 mt-3">
                                                    <div class="form-group">
                                                            <div class="input-group input-group-static is-valid mb-4">
                                                                <label for="fecha">Fecha :<span class="text-danger">(*)</span></label>
                                                                <input type="date" name="fecha" id="fecha" class="form-control"  value="{{$solicitud->fecha}}" min="new Date();" required>
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
                                            <!-- Fin Formulario de funcionario-->
                                            <!--pie de pagina-->
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="input-group-static is-valid mb-4">
                                                                <label for="">Pie de pagina (agregue el pie de pagina con un salto de linea): <span class="text-danger"></span></label>
                                                                <textarea class="ckeditor" name="pie_pagina" id="pie_pagina">{{$solicitud->pie_pagina}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        CKEDITOR.replace('pie_pagina',{toolbar:[],width:1500,height:50})
                                                    </script>
                                                </div>
                                            <!--fin pie de pagina-->

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



                                            <!--boton para guardar funcionario-->
                                            <div class="row" >                                                                         
                                                <div class="col-12 col-sm-6 col-md-4 mt-3">
                                                    <input type="button" value="Actualizar y Derivar Informe" onclick="confirmToSaveBarsit();" class="btn btn-success">
                                                </div>
                                                <button type="submit" id="btnSend" style="display:none"></button>
                                                <script src="https://unpkg.com/sweetalert2@7.3.0/dist/sweetalert2.all.js"></script>
                                                <script>
                                                    function confirmToSaveBarsit() {
                                                            swal.fire({
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
                                                </script>
                                                <!--<div class="col-12 col-sm-6 col-md-4 mt-3">
                                                    <a type="button" class="btn btn-danger" href="{{ route('billing') }}">Volver Atras</a>
                                                </div>-->
                                            </div>
                                            <!--Fin boton guardar funcionario-->
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<script>
    var valor_tipo_estado= document.getElementById("tipo_informe").value;
    const tipoInformeSelect = document.getElementById("tipo_informe");
    const convenioOption = tipoInformeSelect.querySelector("option[value='Convenio']");
    if(valor_tipo_estado == "Convenio"){
        document.getElementById("div_nombre_dirigido").style.display='none'
        document.getElementById("div_cargo_dirigido").style.display='none'
        document.getElementById("div_unidad_dirigido").style.display='none'
        //document.getElementById("div_fecha_informe").style.display='none'
        document.getElementById("div_prefijo_dirigido").style.display='none'
        document.getElementById("tipo_informe").classList.add('my-select-styling')
        document.getElementById("div_image_update").style.display=''
    }
</script>
    </main>
    <x-plugins></x-plugins>
</x-layout>
