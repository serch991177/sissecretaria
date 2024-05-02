<x-layout bodyClass="g-sidenav-show  bg-gray-200">
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
        <x-navbars.sidebar activePage="Adjuntar Archivo"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Adjuntar Archivo"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">Adjuntar Archivo</h6>
                                    <!--<p class="text-white text-capitalize  ps-3">Oficinas</p>-->                            
                                </div> 
                            </div>
                            <div class="card-body px-0 pb-2">
                                <!--card de creacion de oficinas-->
                                <form action="{{ route('actualizararchivo') }}" method="post" enctype="multipart/form-data">
                                     @csrf
                                    <div class="card">
                                        <div class="card-header card-header-info">
                                            <h1 class="card-title text-center">Archivo Adjuntado</h1>
                                           <h4 class="card-title text-center"><span class="text-danger"></span>Datos del Informe</h4>
                                        </div>
                                        <div class="card-body">
                                                <div class="row">
                                                    <input type="hidden" value="{{$solicitud->id}}" name="id">
                                                    <div class="col-12">    
                                                        <div class="form-group">
                                                                <div class="input-group input-group-static is-valid mb-4">
                                                                    <label for="numero_del_informe">Numero del informe: <span class="text-danger"></span></label>
                                                                    <input readonly type="text" name="numero_generador" id="numero_generador" class="form-control"  value="{{$solicitud->numero}}">
                                                                </div>                                                       
                                                        </div>
                                                    </div>  
                                                    
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                                <div class="input-group input-group-static is-valid mb-4">
                                                                    <label for="dirigido_a">Dirigido A: <span class="text-danger"></span></label>
                                                                    <input readonly type="text" name="dirigido_a" id="dirigido_a" class="form-control"  value="{{$solicitud->nombre_dirigido}}">
                                                                </div>                                                       
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                                <div class="input-group input-group-static is-valid mb-4">
                                                                    <label for="referencia">Referencia : <span class="text-danger"></span></label>
                                                                    <input readonly type="text" name="referencia" id="referencia" class="form-control"  value="{{$solicitud->referencia}}">
                                                                </div>                                                       
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                                <div class="input-group input-group-static is-valid mb-4">
                                                                    <label for="tipo_informe">Tipo de Informe : <span class="text-danger"></span></label>
                                                                    <input readonly type="text" name="tipo_informe" id="tipo_informe" class="form-control"  value="{{$solicitud->tipo_informe}}">
                                                                </div>                                                       
                                                        </div>
                                                    </div>

                                                        <style>
                                                            /*a:hover{
                                                                background-color:gold;
                                                            }*/
                                                        </style>
                                                            @if($solicitud->archivo_del_informe == null || $solicitud->archivo_del_informe == " " )
                                                                <center><h4>No Tiene ningun Documento Subido</h4></center> 
                                                            @else
                                                            <center><a href="{{'/archivos/'.$solicitud->archivo_del_informe}}" style="color:blue; text:center" target="_blank">Click Aqui, Para Ver el Documento Subido</a></center>
                                                            @endif
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
                                                            <div class="file-upload" id="div_imagen_subir">
                                                                <div class="image-upload-wrap" >
                                                                    <input class="file-upload-input" type='file' name="archivo_del_informe" id="archivo_del_informe" value="{{$solicitud->archivo_del_informe}}" onchange="readURL(this);" accept=".doc, .docx,.pdf, .txt, .xlsx,.pptx" />
                                                                    <div class="drag-text">
                                                                    <h3>Arrastre y suelte un archivo o haga click Aqui</h3>
                                                                    </div>
                                                                </div>
                                                                <div class="file-upload-content">
                                                                    <img src="/img/file.png" alt="Tu Archivo" width="20%"/>
                                                                    <div class="image-title-wrap">
                                                                    <button type="button" onclick="removeUpload()" class="remove-image">Remover Archivo:<span class="image-title">Archivo Subido</span></button>
                                                                    </div>
                                                                </div>
                                                                @error('archivo_del_informe')
                                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                                @enderror 
                                                            </div>
                                                            <script>
                                                                document.getElementById('div_imagen_subir').style.display = 'none';
                                                                function mostrarboton(){
                                                                    document.getElementById('div_imagen_subir').style.display = '';
                                                                }
                                                            </script>
                                                            <!-- fin imagen subir-->
                                                </div>
                                        </div>
                                    </div> 
                                    <div class="card" >
                                            <div class="card-body">
                                                <!--boton para enviar revision-->
                                                <div class="row" >                                                                         
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3">
                                                        <input type="submit" id="btn_hidden" value="Guardar Archivo" class="btn btn-success">
                                                    </div>
                                                    
                                                    <div class="col-12 col-sm-6 col-md-4 mt-3">
                                                        <input type="button" id="btn_archivo" onclick="mostrarboton()" value="Subir Archivo" class="btn btn-warning">
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


<!--fin data table-->
        </main>
        <x-plugins></x-plugins>
</x-layout>
