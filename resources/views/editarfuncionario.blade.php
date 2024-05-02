<x-layout bodyClass="g-sidenav-show  bg-gray-200">
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

        <x-navbars.sidebar activePage="Funcionario"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Funcionario"></x-navbars.navs.auth>
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
                                <form method="post" action="{{ route('actualizar_funcionario') }}" enctype="multipart/form-data">
                                     @csrf
                                     
                                    <div class="card">
                                            <div class="card-header card-header-info">
                                                    <h1 class="card-title text-center">DATOS DEL FUNCIONARIO</h1>
                                                    <h4 class="card-title text-center"><span class="text-danger">(*)</span>Campos Obligatorios</h4>
                                            </div>
                                            <div class="card-body">
                                                <!-- Formulario de funcionario-->
                                                <div class="row">           
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3"> 
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <label class="" for="carnet">Carnet:<span class="text-danger">(*)</span></label>
                                                            <input type="text" name="carnet" id="carnet" class="form-control"  value="{{$solicitud->carnet}}" required>
                                                        </div>
                                                    </div>             
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3"> 
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <label class="" for="name">Nombres:<span class="text-danger">(*)</span></label>
                                                            <input type="text" name="name" id="name" class="form-control"  value="{{$solicitud->name}}" required readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3"> 
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <label class="" for="paterno">Apellido Paterno:<span class="text-danger">(*)</span></label>
                                                            <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control"  value="{{$solicitud->apellido_paterno}}" required readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3"> 
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <label class="" for="materno">Apellido Materno:<span class="text-danger">(*)</span></label>
                                                            <input type="text" name="apellido_materno" id="apellido_materno" class="form-control"  value="{{$solicitud->apellido_materno}}" required readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3"> 
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <label class="" for="celular">Celular<span class="text-danger">(*)</span></label>
                                                            <input type="text" name="celular" id="celular" class="form-control" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false"  value="{{$solicitud->celular}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3"> 
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <label class="" for="telefono">Telefono:<span class="text-danger"></span></label>
                                                            <input type="text" name="telefono" id="telefono" class="form-control" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false"  value="{{$solicitud->telefono}}" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3"> 
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <label class="" for="cargo">Cargo<span class="text-danger">(*)</span></label>
                                                            <input type="text" name="cargo" id="cargo" class="form-control"  value="{{$solicitud->cargo}}" required readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3"> 
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <label class="" for="unidad">Unidad<span class="text-danger">(*)</span></label>
                                                            <input type="text" name="unidad" id="unidad" class="form-control"  value="{{$solicitud->unidad}}" required readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3"> 
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <label class="" for="oficina">Oficina<span class="text-danger">(*)</span></label>
                                                            <select class="form-control" name="id_oficina" id="id_oficina" required>
                                                                <option value="{{$solicitud->id_oficina}}">{{$solicitud->id_oficina}}</option>
                                                                @foreach($oficinas as $oficina)
                                                                @if($oficina->estado=="activo")
                                                                <option value="{{$oficina->nombre_oficina}}">{{$oficina->nombre_oficina}}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>                                                           
                                                            <!--<input type="text" name="id_oficina" id="id_oficina" class="form-control"  value="{{old('id_oficina')}}">-->
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3">
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <label class="" for="email">Correo Electronico:<span class="text-danger">(*)</span></label>
                                                            <input type="email" class="form-control" name="email" id="email" value="{{$solicitud->email}}" required>
                                                        </div>      
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3"> 
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <label class="" for="estado">Estado<span class="text-danger">(*)</span></label>
                                                            <select class="form-control" name="estado" id="estado" required>
                                                                <option value="{{$solicitud->estado}}">{{strtoupper($solicitud->estado)}}</option>
                                                                <option value="activo">ACTIVO</option>
                                                                <option value="inactivo">INACTIVO</option>
                                                            </select>
                                                        </div>
                                                    </div>

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

                                                    <div class="file-upload" >
                                                        
                                                        <div class="file-upload-content">
                                                            <img class="file-upload-image" src="/imagenes/{{ $solicitud->firma }}" alt="Tu Imagen" />
                                                            <div class="image-title-wrap">
                                                            <button type="button" onclick="removeUpload()" class="remove-image">Remover <span class="image-title">Imagen Subida</span></button>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        
                                                    </div>
                                                     
                                                        
                                                    <div class="image-upload-wrap"  style="display:none" id="mostrar_subida">
                                                            <input class="file-upload-input" type='file' name="firma" id="firma"  onchange="readURL(this);" accept="image/*" />
                                                            <div class="drag-text" >
                                                            <h3>Arrastre y suelte una imagen o haga click Aqui</h3>
                                                            </div>
                                                        </div>
                                                        <!--fin imagen subir-->
                                                    <!--<div class="col-12 col-sm-6 col-md-4 mt-3">
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <label class="" for="password">Contraseña:<span class="text-danger">(*)</span></label>
                                                            <input type="password" name="password" id="password" class="form-control" value="{{$solicitud->password}}">
                                                        </div>
                                                        @error('password')
                                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                                        @enderror 
                                                    </div>-->
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3">
                                                        
                                                        
                                                        
                                                        
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3">
                                                        <div class="input-group input-group-static is-valid mb-4">
                                                            <input type="hidden" class="form-control" name="id" id="id" value="{{$solicitud->id}}" >
                                                        </div>                                              
                                                    </div>
                                                    <input type="hidden" value="{{$solicitud->nombre_completo}}" name="nombre_completo" id="nombre_completo">                       
                                                    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                                                    <script>
                                                        $(document).on('blur  ', '#carnet', function(){
                                                            var nombre=document.getElementById("name").value;
                                                            const nombre_sin=nombre.trim();
                                                            var paterno=document.getElementById("apellido_paterno").value;
                                                            const paterno_sin=paterno.trim();
                                                            var materno=document.getElementById("apellido_materno").value;
                                                            const materno_sin=materno.trim();
                                                            const nombrecompleto = nombre_sin+" "+paterno_sin+" "+materno_sin;
                                                            document.getElementById("nombre_completo").value = nombrecompleto
                                                        });
                                                        $(document).on('blur  ', '#name', function(){
                                                            var nombre=document.getElementById("name").value;
                                                            const nombre_sin=nombre.trim();
                                                            var paterno=document.getElementById("apellido_paterno").value;
                                                            const paterno_sin=paterno.trim();
                                                            var materno=document.getElementById("apellido_materno").value;
                                                            const materno_sin=materno.trim();
                                                            const nombrecompleto = nombre_sin+" "+paterno_sin+" "+materno_sin;
                                                            document.getElementById("nombre_completo").value = nombrecompleto
                                                        });
                                                        $(document).on('blur  ', '#apellido_paterno', function(){
                                                            var nombre=document.getElementById("name").value;
                                                            const nombre_sin=nombre.trim();
                                                            var paterno=document.getElementById("apellido_paterno").value;
                                                            const paterno_sin=paterno.trim();
                                                            var materno=document.getElementById("apellido_materno").value;
                                                            const materno_sin=materno.trim();
                                                            const nombrecompleto = nombre_sin+" "+paterno_sin+" "+materno_sin;
                                                            document.getElementById("nombre_completo").value = nombrecompleto
                                                        });
                                                        $(document).on('blur  ', '#apellido_materno', function(){
                                                            var nombre=document.getElementById("name").value;
                                                            const nombre_sin=nombre.trim();
                                                            var paterno=document.getElementById("apellido_paterno").value;
                                                            const paterno_sin=paterno.trim();
                                                            var materno=document.getElementById("apellido_materno").value;
                                                            const materno_sin=materno.trim();
                                                            const nombrecompleto = nombre_sin+" "+paterno_sin+" "+materno_sin;
                                                            document.getElementById("nombre_completo").value = nombrecompleto
                                                        });

                                                    </script>
                                                </div>
                                                <!-- Fin Formulario de funcionario-->
                                                <!--boton para guardar funcionario-->
                                                <div class="row" >                                                                         
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3">
                                                        <input type="submit" value="Actualizar Funcionario" class="btn btn-success">
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3">
                                                        <a type="button" class="btn btn-danger" href="{{ route('user-management') }}">Volver Atras</a>
                                                    </div>
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
<!-- recuperacion de valores del switch-->
<script>
    /*var switchgenerador = document.getElementById('generadorC');
    if (switchgenerador.checked)
        {
            document.getElementById('generador').value= "true";
        }else{
            document.getElementById('generador').value='false';
        }
    switchgenerador.addEventListener("change", validagenerador, false);
    function validagenerador(){
        var checkedgenerador = switchgenerador.checked;
        if(checkedgenerador){
            document.getElementById('generador').value= "true";
        }else{
            document.getElementById('generador').value='false';
        }
    }*/
</script>

<script>
  /*  var switchrevisor = document.getElementById('revisorC');
    if (switchrevisor.checked)
        {
            document.getElementById('revisor').value= "true";
        }else{
            document.getElementById('revisor').value='false';
        }
    switchrevisor.addEventListener("change", validarevisor, false);
    function validarevisor(){
        var checkedrevisor = switchrevisor.checked;
        if(checkedrevisor){
            document.getElementById('revisor').value= "true";
        }else{
            document.getElementById('revisor').value='false';
        }
    }*/
</script>
<!--Prueba-->
<script>
   /* var switchfinalizador = document.getElementById('finalizadorC');
    if (switchfinalizador.checked)
        {
            document.getElementById('finalizador').value= "true";
        }else{
            document.getElementById('finalizador').value='false';
        }
    switchfinalizador.addEventListener("change", validarfinalizador, false);
    function validarfinalizador(){
        var checkedfinalizador = switchfinalizador.checked;
        if(checkedfinalizador){
            document.getElementById('finalizador').value= "true";
        }else{
            document.getElementById('finalizador').value='false';
        }
    }*/
</script>
<!--fin recuperacion de valores del switch-->

<!--data table-->
<script>
    /*$(document).ready(function () {
        $('#example').DataTable();
    });*/
    $('#example').DataTable( {
        responsive: true
    } );
</script>
<!--fin data table-->
<!--Consumo de api para recuperar informacion por carnet-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).on('blur  ', '#carnet', function(){
       verificarcarnetfuncionario();
    })
    function verificarcarnetfuncionario(){
        var carnet = document.getElementById("carnet").value;
        //console.log("El numero de carnet es " + carnet)
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        var raw = JSON.stringify({
        "ci": carnet
        });

        var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
        };

        fetch("https://multiservdev.cochabamba.bo/api/v1/rrhh/get-data-func-by-ci", requestOptions)
        .then(response => response.json())
        .then(recuperar_usuario => mostrarfuncionario(recuperar_usuario))
        .catch(error => Swal.fire({icon: 'error',title: 'Oops...',text: 'Carnet de identidad es requerido!',}));
        const mostrarfuncionario = (recuperar_usuario)=>{
            
            if(recuperar_usuario.length  === 0 ){
                document.getElementById("name").value = ""
                document.getElementById("apellido_paterno").value = ""
                document.getElementById("apellido_materno").value = ""
                document.getElementById("cargo").value = ""
                document.getElementById("unidad").value = ""

                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Funcionario no encontrado!'
                })
            }else{
                document.getElementById("name").value = recuperar_usuario[0].nombres
                document.getElementById("apellido_paterno").value = recuperar_usuario[0].paterno
                document.getElementById("apellido_materno").value = recuperar_usuario[0].materno
                document.getElementById("cargo").value = recuperar_usuario[0].descripcion
                document.getElementById("unidad").value = recuperar_usuario[0].codigo

                //console.log(recuperar_usuario[0])    
            }
        }
    }
</script>
<!--Fin consumo de api para recuperar informacion por carnet-->
        </main>
        <x-plugins></x-plugins>
</x-layout>
