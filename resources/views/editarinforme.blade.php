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
    
    function actualizarinforme() {    
        var formData = new FormData();
        formData.append('id', document.getElementById("id").value);
        formData.append('dato_informe', CKEDITOR.instances['dato_informe'].getData());
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
