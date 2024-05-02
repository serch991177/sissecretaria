<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Informe</title>
    <style>
        html {
	        /* Arriba | Derecha | Abajo | Izquierda */
          margin: 3cm 2cm 3cm 3cm;
        }
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
        .logo {
            width: 10%;
            text-align: center;
            border: 0px;   
        }
        @page { margin: 108px 80px; font-size:11px !important; line-height: 14px;  }
        header {
            position: fixed;
            top: -108px;
            left: 0px;
            right: 0px;
            height: 108px;
            padding: .5em;
            text-align: center;
        }
        footer {
          /*overflow: hidden;*/
          position: fixed;
          bottom: -0.3cm;
          left: 0cm;
          right: 0cm;
          height: 1cm;            
        }
        
        /*#pie_pagina .page::before {*/
          /*content: counter(page);*/
          /*content: counter(page) "of "  counter(page);*/
          /*counter-increment: page-counter 1;
          content: counter(page-counter) " of "   counter(total-pages);*/
        /*}*/
       

    </style>
    
    </head>
    <body>

    
     
        
        <!--Header para los informes tipo cartas externas-->
        @if($informe->tipo_informe == "Cartas Externas" || $informe->tipo_informe == "Comunicacion Internas" || $informe->tipo_informe == "Informe" || $informe->tipo_informe == "Informe Tecnico" || $informe->tipo_informe == "Informe Legal"|| $informe->tipo_informe == "Instructivos")
        <header >
          <div  class="logo"  style="width: 20% !important; float:left;">
            @php($image_path1 = public_path() . '/img/escudo.png')
            @php($imageData = base64_encode(file_get_contents($image_path1)))
            @php($src = 'data:' . mime_content_type($image_path1) . ';base64,' . $imageData)
            <img  align="left" src="{{$src}}" height="100px" class="img-fluid">
          </div>
          <div style="width: 50% !important; float:right;">    
            @php($image_path2 = public_path() . '/img/cocha.png')
            @php($imageData2 = base64_encode(file_get_contents($image_path2)))
            @php($src2 = 'data:' . mime_content_type($image_path2) . ';base64,' . $imageData2)
            <img align="right"  src="{{$src2}}" height="60px" class="img-fluid"/> 
          </div>
          <div class="linea" style="border-top: 3px solid #33bbff; height: 20px; max-width: 2000px; padding: 0; margin: 100px auto 0 auto;"></div>
        </header>
        @endif
        <!--Fin Header para los informes tipos cartas externas-->

        <!-- Header para el informe Memorandum-->
        @if($informe->tipo_informe == "Memorandums" )
        <header >
          <div  class="logo"  style="width: 20% !important; float:left;">
            @php($image_path1 = public_path() . '/img/escudo.png')
            @php($imageData = base64_encode(file_get_contents($image_path1)))
            @php($src = 'data:' . mime_content_type($image_path1) . ';base64,' . $imageData)
            <img  align="left" src="{{$src}}" height="100px" class="img-fluid">
          </div>
          <div style="width: 50% !important; padding:left:180px">    
            @php($image_path2 = public_path() . '/img/memo.png')
            @php($imageData2 = base64_encode(file_get_contents($image_path2)))
            @php($src2 = 'data:' . mime_content_type($image_path2) . ';base64,' . $imageData2)
            <img align="right"  src="{{$src2}}" height="80px" width="320px" class="img-fluid"/> 
          </div>
          <div class="linea" style="border-top: 3px solid #33bbff; height: 20px; max-width: 2000px; padding: 0; margin: 100px auto 0 auto;"></div>
        </header>
        @endif
        <!--Fin Header para el informe Memorandum-->

        <!-- Header para el informe auto administrativos-->
          @if($informe->tipo_informe == "Autos Administrativos")
          <header style="position: fixed; top: -174px; left: 0px; right: 0px; height: 108px;padding: .5em; text-align: center;">
            <div style="width: 20% !important; float:left; width: 10%; text-align: center; border: 0px;  padding-top:54px;">
              @php($image_path1 = public_path() . '/img/escudo.png')
              @php($imageData = base64_encode(file_get_contents($image_path1)))
              @php($src = 'data:' . mime_content_type($image_path1) . ';base64,' . $imageData)
              <img  align="left" src="{{$src}}" height="70px" class="img-fluid">
            </div>
            <div style="width: 50% !important; float:right; padding-top:58px">    
              @php($image_path2 = public_path() . '/img/cocha.png')
              @php($imageData2 = base64_encode(file_get_contents($image_path2)))
              @php($src2 = 'data:' . mime_content_type($image_path2) . ';base64,' . $imageData2)
              <img align="right"  src="{{$src2}}" height="60px" class="img-fluid"/>
            </div>
            <div style="padding-top: 100px; width:100%">
              <h1 >AUTO ADMINISTRATIVO S.A.A.Z</h1>
              <h1 style="padding-right:50px">N° XX/2024</h1>
            </div>
            <div class="linea" style="border-top: 3px solid #33bbff; height: 20px; max-width: 2000px; padding: 0; margin: -8px auto 0 auto;"></div>
          </header>
          @endif
        <!--Fin header para el informe auto administrativos-->
        @if($informe->tipo_informe == "Resoluciones Administrativas" || $informe->tipo_informe == "Resoluciones Administrativas Sancionatorias" || $informe->tipo_informe == "Resoluciones Administrativas Municipales" || $informe->tipo_informe == "Resoluciones De Recurso De Revocatoria")
        <header>
          <div  class="logo"  style="width: 20% !important; float:left;">
            @php($image_path1 = public_path() . '/img/escudo.png')
            @php($imageData = base64_encode(file_get_contents($image_path1)))
            @php($src = 'data:' . mime_content_type($image_path1) . ';base64,' . $imageData)
            <img  align="left" src="{{$src}}" height="70px" class="img-fluid">
          </div>
          @if($informe->tipo_informe == "Resoluciones Administrativas")
          <div style="float:right; padding-top: 20px;  padding-right: 0px;   width:89%; ">
              <h1>&nbsp;&nbsp;RESOLUCIÓN ADMINISTRATIVA</h1>
              <h1>&nbsp;&nbsp;S.A.A.Z-N°XX/2024</h1>
          </div>
          @endif
          @if($informe->tipo_informe == "Resoluciones Administrativas Sancionatorias")
          <div style="float:right; padding-top: 20px;  padding-right: 0px;   width:89%; ">
              <h1>RESOLUCIÓN ADMINISTRATIVA SANCIONATORIA</h1>
              <h1>&nbsp;&nbsp;S.A.A.Z-RAS- N°XX/2024</h1>
          </div>
          @endif
          @if($informe->tipo_informe == "Resoluciones Administrativas Municipales")
          <div style="float:right; padding-top: 20px;  padding-right: 0px;   width:89%; ">
              <h1>&nbsp;&nbsp;RESOLUCIÓN ADMINISTRATIVA MUNICIPAL</h1>
              <h1>&nbsp;&nbsp;S.A.A.Z-N°XX/2024</h1>
          </div>
          @endif
          @if($informe->tipo_informe == "Resoluciones De Recurso De Revocatoria")
          <div style="float:right; padding-top: 20px;  padding-right: 0px;   width:89%; ">
              <h1>&nbsp;&nbsp;RESOLUCIÓN DE RECURSOS DE REVOCATORIA</h1>
              <h1>&nbsp;&nbsp;S.A.A.Z N°XX/2024</h1>
          </div>
          @endif
          <div class="linea" style="border-top: 3px solid #33bbff; height: 20px; max-width: 2000px; padding: 0; margin: 95px auto 0 auto;"></div>
        </header>
        @endif
        <!--Header para el informe resoluciones administrativa-->
        <!--Header para convenios-->
        @if($informe->tipo_informe == "Convenio")
        <header >
          <div  class="logo"  style="width: 20% !important; float:left;">
            @php($image_path1 = public_path() . '/img/escudo.png')
            @php($imageData = base64_encode(file_get_contents($image_path1)))
            @php($src = 'data:' . mime_content_type($image_path1) . ';base64,' . $imageData)
            <img  align="left" src="{{$src}}" height="100px" class="img-fluid">
          </div>
          @if($informe->logo)
          <div style="width: 50% !important; float:right;">    
            @php($image_path2 = public_path() . '/archivos/'.$informe->logo)
            @php($imageData2 = base64_encode(file_get_contents($image_path2)))
            @php($src2 = 'data:' . mime_content_type($image_path2) . ';base64,' . $imageData2)
            <img align="right"  src="{{$src2}}" height="100px" class="img-fluid"/> 
          </div>
          @endif
        </header>
        @endif

        <!--Fin header para el informe resoluciones administrativas-->


        <!--footer style="padding:1em;"-->
        <!-- Define header and footer blocks before your content -->

        
          
        <!--Footer para los tipo de convenio-->
        @if($informe->tipo_informe == "Convenio" )
        <footer style="bottom: -0.6cm;left: 0cm;right: 0cm;height: 1cm;color: black ;text-align: left;line-height: 10px;">
                <div style="left: 0cm; right: 0cm; height: 1cm; color: black ; text-align: left; line-height: 10px;" >
                <style>
                  table{
                      table-layout: fixed;
                      width: 555px;
                      
                  }

                  th, td {
                      /*border: 1px solid;*/
                      width: 100px;
                      word-wrap: break-word;
                  }
                </style>
                <table cellspacing="0" border="1">
                
                    <tr>
                        @php($arr=(json_decode($informe->usuario, true)))
                        @php($json_convertido = json_decode($arr)) 
                        @foreach($json_convertido as $json_convertidos)
                        @php($image_pathfooter = public_path() . '/img/sello.jpg')
                        @php($imageDatafooter = base64_encode(file_get_contents($image_pathfooter)))
                        @php($srcfooter = 'data:' . mime_content_type($image_pathfooter) . ';base64,' . $imageDatafooter)
                        <td align="center"><img src="{{ $srcfooter }}" width="70" height="70" alt="Firma"></td>
                        @endforeach
                    </tr>
                </table>
                </div>
                <div style="position:relative; right:-560px; top: -40px; width: 35% !important;">
                <img src="{{$qr_image}}" width="31%" alt="">
                  <!--<img  src="https://upload.wikimedia.org/wikipedia/commons/4/42/Qrcode_Corona_warn_app.png?20210510130336" width="31%" />-->
                  <br><br>
                  
                  <div id="pie_pagina" >
                

                    <!--<span style="font-size: 1.3pc;">Pág. </span><span  style="font-size: 1.3pc;" class="page"></span>      --> 
                  </div>
                  
                    
                </div>
        </footer>
        @else
            <!--Footer para todos los documentos-->
              <footer style="bottom: -0.6cm;left: 0cm;right: 0cm;height: 1cm;color: black ;text-align: left;line-height: 10px;">
                <div class="linea2" style="border-top: 3px solid #33bbff; height: 1px; max-width: 800px; padding: 0; margin: -7px auto 0 auto;"></div>
                <div style="left: 0cm; right: 0cm; height: 1cm; color: black ; text-align: left; line-height: 10px;" >
                <style>
                  table{
                      table-layout: fixed;
                      width: 555px;
                      
                  }

                  th, td {
                      border: 1px solid;
                      width: 100px;
                      word-wrap: break-word;
                  }
                </style>
                <table  cellspacing="0" border="1">
                    <tr>
                        @php($arr=(json_decode($informe->usuario, true)))
                        @php($json_convertido = json_decode($arr)) 
                        @foreach($json_convertido as $json_convertidos)
                        <th >{{ucwords(mb_strtolower($json_convertidos->cargo,"UTF-8"))}}</th>
                        @endforeach
                    </tr>
                    <tr>
                    @php($arr=(json_decode($informe->usuario, true)))
                        @php($json_convertido = json_decode($arr)) 
                        @foreach($json_convertido as $json_convertidos)
                        @php($image_pathfooter = public_path() . '/imagenes/'.$json_convertidos->firma)
                        @php($imageDatafooter = base64_encode(file_get_contents($image_pathfooter)))
                        @php($srcfooter = 'data:' . mime_content_type($image_pathfooter) . ';base64,' . $imageDatafooter)
                        <td align="center"><img src="{{$srcfooter}}" width="50" height="50" alt="Firma"></br>{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</td>
                        @endforeach
                    </tr>
                </table>
                </div>
                <div style="position:relative; right:-560px; top: -40px; width: 35% !important;">
                  <!--<img  src="https://upload.wikimedia.org/wikipedia/commons/4/42/Qrcode_Corona_warn_app.png?20210510130336" width="31%" />-->
                  <br><br>
                  
                  <div id="pie_pagina" >
                

                    <!--<span style="font-size: 1.3pc;">Pág. </span><span  style="font-size: 1.3pc;" class="page"></span>      --> 
                  </div>
                  
                    
                </div>
              </footer>
            <!-- Fin footer para todos los documentos-->
        @endif
        <!--Fin footer para los tipo de convenio-->
        



       

        <!-- main para los tipos de informe de cartas externas-->
        @if($informe->tipo_informe == "Cartas Externas")
        <main>
            <br>
            <!--<span style="font-size:1pc;">Cochabamba, 1 de Marzo de 2024 </span>-->
            <span style="font-size:1pc;">Cochabamba, {{$fechaformateada}}</span>
            <h2 style="line-height: 0cm;">XX-XX-XX</h2><br><br>
            <span style="font-size:1pc; line-height: 0.5cm;">Señor (a) es</span><br>
            <span style="font-size:1pc; line-height: 0.5cm;">{{ucwords(mb_strtolower($informe->nombre_dirigido,"UTF-8"))}}</span><br>
            <span style="font-size:1pc; line-height: 0.5cm;"><strong>{{mb_strtoupper($informe->cargo_dirigido,"UTF-8")}}</strong></span><br>
            <span style="font-size:1pc; line-height: 0.5cm;"><strong>{{mb_strtoupper($informe->unidad_dirigido,"UTF-8")}}</strong></span><br>            
            <!--<span style="font-size:1pc; line-height: 0.5cm;">De:</span><br>
            @php($arr=(json_decode($informe->usuario, true)))
            @php($json_convertido = json_decode($arr)) 
            @foreach($json_convertido as $json_convertidos) 
            <span style="font-size:1pc; line-height: 0.5cm;">{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span><br>
            <span style="font-size:1pc; line-height: 0.5cm;"><strong>{{ucwords(mb_strtolower($json_convertidos->cargo,"UTF-8"))}}</strong></span><br>
            <span style="font-size:1pc; line-height: 0.5cm;"><strong>{{ucwords(mb_strtolower($json_convertidos->unidad,"UTF-8"))}}</strong></span><br>
            @endforeach-->
            <span style="font-size:1pc; line-height: 0.5cm;">Presente.</span><br>
            <span style="font-size:1pc; line-height: 1cm;" >Ref.:&nbsp;&nbsp;&nbsp;<strong><u>{{mb_strtoupper($informe->referencia,"UTF-8")}}.</u></strong></span>
            <div style="text-align: justify;"><span style="font-size: 11pt; font-family: Arial, Helvetica, sans-serif;">{!! $informe->dato_informe !!}</span></div>

            
        </main>
        @endif   
        <!--Fin Main para los tipos de informe de cartas externas-->

        <!--main para los tipos de informe de comunicacion interna-->
        @if($informe->tipo_informe == "Comunicacion Internas")
        <main>
            <br>
            <span style="font-size:17px; line-height: 1cm;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><u>COMUNICACIÓN INTERNA Nº: XX-CI-ZZ</u></strong></span><br>
            <span style="font-size:1pc; line-height: 0.5cm;"><strong>A:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>{{ucwords(mb_strtolower($informe->nombre_dirigido,"UTF-8"))}}</span><br>
            <div style="width: 76.5%; float: right; right: -250px;"><span style="font-size:1pc; line-height: 0.5cm;"><strong></strong><strong>{{mb_strtoupper($informe->cargo_dirigido,"UTF-8")}} - {{mb_strtoupper($informe->unidad_dirigido,"UTF-8")}}</strong></span></div><br><br><br>
            <span style="font-size:1pc; line-height: 0.5cm;"><strong>De:</strong></span><br>
            @php($arr=(json_decode($informe->usuario, true)))
            @php($json_convertido = json_decode($arr)) 
            @foreach($json_convertido as $json_convertidos) 
            <span style="font-size:1pc; line-height: 0.5cm;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span><br>
            <div style="width: 76.5%; float: right; right: -250px;"><span style="font-size:1pc; line-height: 0.5cm;"><strong>{{ucwords(mb_strtoupper($json_convertidos->cargo,"UTF-8"))}} - {{ucwords(mb_strtoupper($json_convertidos->unidad,"UTF-8"))}}</strong></span></div><br><br>
            @endforeach
            <div ><span style="font-size:1pc; line-height: 1cm;" ><strong>Ref.:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><strong>{{mb_strtoupper($informe->referencia,"UTF-8")}}.</strong></span></div><br>
            <span style="font-size:1pc; line-height:1cm;"><strong>Fecha:</strong> <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cochabamba, {{$fechaformateada}}</strong></span>
            <div class="lineacomunicacioninterna" style="border-top: 3px solid #000000; height: 5px; max-width: 2000px; padding: 0; margin: 5px auto 0 auto;"></div>

            <div style="text-align: justify;"><span style="font-size: 11pt; font-family: Arial, Helvetica, sans-serif;">{!! $informe->dato_informe !!}</span></div>
        </main>
        @endif   
        <!--Fin main para los tipos de informe de comunicacion interna-->
        
        <!--main para los tipo de informe de memorandum-->
        @if($informe->tipo_informe == "Memorandums")
        <main>
            <br>
            <span style="font-size:1pc;">Cochabamba, {{$fechaformateada}}</span><br><br>
            <h2 style="line-height: 0cm;">Nº: XX-XX-XX</h2>
            <style>
              .tablamemorandum{
                  width: 625px;
                  
              }
            </style>
            <!--<table class="tablamemorandum">
              <tr>
                <td><span style="font-size:1pc; line-height: 0.5cm;">Señor (a) es</span><br><br>


                </td>
              </tr>
            
            </table>-->
              <style>
                main .contDestinatario {
                    margin-top: 0cm;
                    // margin-bottom: 20px;
                    color: black;
                    font-size: 15px; //11px;
                    font-family: Verdana, sans-serif;
                    border: 1px solid black;
                    border-radius: 15px;
                    padding: 10px;
                }
                main .contDestinatario .textPrefijo {
                    // margin-bottom: 0.1cm;
                    font-size: 15px;
                }
                main .contDestinatario .contInf .izquierdo {
                    padding-right: 30px;
                    text-align: justify;
                    // background-color: red;    
                }
                main .contDestinatario .contInf .derecho {
                    padding-left: 30px;
                    text-align: justify;
                    // background-color: blue;
                }
                main .contDestinatario .contInf .infoDest{
                    margin-top: 8px;
                }
                main .contDestinatario p{
                  margin: 0px;
                  padding: 0px;
                  font-size: 15px;// 12px;
                  text-align: justify;
                }
                main .contDestinatario .txtTitle {
                    font-size: 14.2px; //10px; // Destinatarios profeción y cargo
                }
                main .contDestinatario h3{
                    margin: 0px;
                    padding: 0px;
                }
                main .contDestinatario .txtTitulo {
                    color: black;
                    font-size: 15px;
                    padding-bottom: 0px;
                    padding-top: 0px;
                    // margin-bottom: 3px;
                }
                main .txtUpercaseBold {
                  //text-transform: uppercase;
                  font-weight: bold;
                }
              </style>
            <!-- contenedor destinatario main-->
            <div class="contDestinatario">
                <div class="textPrefijo">Señor (a) es</div>
                <div class="contInf">
                <!--Codigo para separar derecha a izquierda el recorrido del array-->  
                {{--@php($arr=(json_decode($informe->usuario, true)))
                @php($json_convertido = json_decode($arr)) 
                @php($arraydividido= array_chunk($json_convertido, ceil(count($json_convertido)/2)))
                @php($derecha = $arraydividido[0])
                @php($izquierda = $arraydividido[1])--}}
                <!--Fin codigo para separar derecha a izquierda el recorrido del array-->
                <div class="izquierdo">                                    
                  <div  class="infoDest">
                      <p>{{ucwords(mb_strtolower($informe->nombre_dirigido,"UTF-8"))}}</p>
                      <p class="txtUpercaseBold txtTitle">{{ucwords(mb_strtoupper($informe->cargo_dirigido,"UTF-8"))}} - {{ucwords(mb_strtoupper($informe->unidad_dirigido,"UTF-8"))}}</p>
                  </div>
                </div>
                  <!--<table width="100%"  border="1">
                      <tr>
                          <td width="50%" style="vertical-align:text-top !important">
                              <div class="izquierdo">                                    
                                  <div class="infoDest">
                                      <p>Sergio Rodrigo Andia Fernandez</p>
                                      <p class="txtUpercaseBold txtTitle">CBA</p>
                                  </div>
                              </div>
                          </td>
                          <td width="50%" style="vertical-align:text-top !important">
                              <div class="derecho">                                    
                                  <div class="infoDest">
                                      <p>Sergio Rodrigo Andia Fernandez</p>
                                      <p class="txtUpercaseBold txtTitle">GAMC</p>
                                  </div>
                              </div>
                          </td>
                      <tr>
                  </table>-->
                </div>            
            </div>
            
            <span style="font-size:1pc; line-height: 1cm;" >Ref.:&nbsp;&nbsp;&nbsp;<strong><u>{{mb_strtoupper($informe->referencia,"UTF-8")}}</u></strong></span>
            <div style="text-align: justify;"><span style="font-size: 11pt; font-family: Arial, Helvetica, sans-serif;">{!! $informe->dato_informe !!}</span></div>
        </main>
        @endif
        <!--Fin main para los tipos de informe de memorandum -->

        <!--Main para los tipo de informes "informe"-->
        @if($informe->tipo_informe == "Informe" || $informe->tipo_informe == "Informe Tecnico" || $informe->tipo_informe == "Informe Legal")
        <main>
            <br>
            <span style="font-size:17px; line-height: 1cm;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>{{mb_strtoupper($informe->tipo_informe,"UTF-8")}} </strong></span><br>
            <div style="float:right; font-size:17px; line-height: 1cm;"><strong>Nº: XX-CI-ZZ</strong> </div><br><br><br>
            <span style="font-size:1pc; line-height: 0.5cm;"><strong>A:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>{{ucwords(mb_strtolower($informe->nombre_dirigido,"UTF-8"))}}</span><br>
            <!--border-style: solid;-->
            <div style="width: 76.5%; float: right; right: -250px;"><span style="font-size:1pc; line-height: 0.5cm;"><strong></strong><strong>{{mb_strtoupper($informe->cargo_dirigido,"UTF-8")}} - {{mb_strtoupper($informe->unidad_dirigido,"UTF-8")}}</strong></span></div><br><br><br>
            <span style="font-size:1pc; line-height: 0.5cm;"><strong>De:</strong></span><br>
            @php($arr=(json_decode($informe->usuario, true)))
            @php($json_convertido = json_decode($arr)) 
            @foreach($json_convertido as $json_convertidos) 
            <span style="font-size:1pc; line-height: 0.5cm;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span><br>
            <div style="width: 76.5%; float: right; right: -250px; "><span style="font-size:1pc; line-height: 0.5cm;"><strong>{{ucwords(mb_strtoupper($json_convertidos->cargo,"UTF-8"))}} - {{ucwords(mb_strtoupper($json_convertidos->unidad,"UTF-8"))}}</strong></span></div><br><br>            
            @endforeach
            <style>
              .alinearizq {
                float: left;
              }
              .alinearder {
                float: right;
              }
            </style>
            <br><br>
            <div id="cuadrotexto">
              <span style="font-size:1pc; line-height: 0.5cm;"><strong>Ref.:</strong></span>
              <div style="border-style:solid;" style="width: 76.5%; float: right;"><span style="font-size:1pc; line-height: 0.5cm;"><strong></strong><strong>{{mb_strtoupper($informe->referencia,"UTF-8")}}</strong></span></div><br><br><br>
              <!--<span style="font-size:1pc; line-height: 1cm; " ><strong>Ref.:</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <span style="font-size:1pc; line-height: 1cm; " ><strong>{{mb_strtoupper($informe->referencia,"UTF-8")}}</strong></span>-->
            </div>
            <div style="clear: both;"></div>
            <span style="font-size:1pc; line-height:0.5cm;"><strong>Fecha:</strong> <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cochabamba, {{$fechaformateada}}</strong></span>
            <div class="lineacomunicacioninterna" style="border-top: 3px solid #000000; height: 1px; max-width: 2000px; padding: 0; margin: 5px auto 0 auto;"></div>

            <div style="text-align: justify;"><span style="font-size: 11pt; font-family: Arial, Helvetica, sans-serif;">{!! $informe->dato_informe !!}</span></div>

            
        </main>
        @endif  
        <!--Fin main para los tipos de informes "informe"-->

        <!-- main para los tipo de informes intructivos-->
        @if($informe->tipo_informe == "Instructivos")
        <main>
          <br>
          <span style="font-size:17px; line-height: 1cm;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>INSTRUCTIVO Nº: XXX-I-ZZZ</strong></span><br>
          <span style="font-size:1pc; line-height:1cm;">Cochabamba, {{$fechaformateada}}</span><br><br>
          <span style="font-size:1pc; line-height: 0.5cm;">Señor (a) (es)</span><br><br>
          <span style="font-size:1pc; line-height: 0.5cm;">{{ucwords(mb_strtolower($informe->nombre_dirigido,"UTF-8"))}}</span><br>
          <span style="font-size:1pc; line-height: 0.5cm;"><strong>{{mb_strtoupper($informe->cargo_dirigido,"UTF-8")}} - {{mb_strtoupper($informe->unidad_dirigido,"UTF-8")}}</strong></span><br><br>
          @php($arr=(json_decode($informe->usuario, true)))
          @php($json_convertido = json_decode($arr)) 
          @foreach($json_convertido as $json_convertidos) 
          <span style="font-size:1pc; line-height: 0.5cm;">{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span><br>
          <span style="font-size:1pc; line-height: 0.5cm;"><strong>{{ucwords(mb_strtoupper($json_convertidos->cargo,"UTF-8"))}} - {{ucwords(mb_strtoupper($json_convertidos->unidad,"UTF-8"))}}</strong></span><br><br>
          @endforeach
          <div class="lineacomunicacioninterna" style="border-top: 1px solid #000000; height: 1px; max-width: 2000px; padding: 0; margin: -2px auto 0 auto;"></div>
          <span style="font-size:1pc; line-height: 1cm;" >Ref.:&nbsp;&nbsp;<strong><strong><u>{{ucwords(mb_strtolower($informe->referencia,"UTF-8"))}}.</u></strong></span><br>
          <div style="text-align: justify;"><span style="font-size: 11pt; font-family: Arial, Helvetica, sans-serif;">{!! $informe->dato_informe !!}</span></div>
        </main>
        @endif
        <!-- Fin main para los tipos de informes instructivos-->

        <!--main para los tipos de informes auto administrativos-->
        @if($informe->tipo_informe == "Autos Administrativos")
        <main>
          <div style="float:right; font-size:1pc; line-height: 0.8cm;" ><span>Cochabamba, {{$fechaformateada}}</span></div><br><br>
          <div style="text-align: justify;"><span style="font-size: 1pc; line-height: 0.4cm;; font-family: Arial, Helvetica, sans-serif;">{!! $informe->dato_informe !!}</span></div>
        
        </main>
        @endif
        <!-- fin main para los tipos de informes auto administrativos-->
        
        <!--main para los tipos de informes de resoluciones-->
        @if($informe->tipo_informe == "Resoluciones Administrativas" || $informe->tipo_informe == "Resoluciones Administrativas Sancionatorias" || $informe->tipo_informe == "Resoluciones Administrativas Municipales" || $informe->tipo_informe == "Resoluciones De Recurso De Revocatoria")
        <main>
          <div style="float:right; font-size:1pc;"><span>Cochabamba, {{$fechaformateada}}</span></div><br><br>
          <div style="text-align: justify;"><span style="font-size: 1pc; line-height: 0.4cm; font-family: Arial, Helvetica, sans-serif;">{!! $informe->dato_informe !!}</span></div>
        </main>
        @endif
        <!--Fin main para los tipos de informes de resoluciones-->       
          
        <!--main para los tipos de informe de convenio-->

        <!--Fin main para los tipos de informe de convenio-->
        @if($informe->tipo_informe == "Convenio" )
        <main>
          @php($year = date("Y", strtotime(now())))
          <div style="float:right; font-size:1pc;"><span>CONV. INST - SG Nº {{$informe->cite}}/{{$year}}</span></div><br><br>
          <div style="text-align: center;" ><span style="font-size: 1pc; line-height: 0.4cm; font-family: Arial, Helvetica, sans-serif;"><strong>{{$informe->referencia}}</strong></span></div>
          <div style="text-align: justify;"><span style="font-size: 1pc; line-height: 0.4cm; font-family: Arial, Helvetica, sans-serif;   ">{!! $informe->dato_informe !!}</span></div>
        </main>
        @endif
        <!--main para todos estaticos -->
        @if($informe->tipo_informe == "Estatico")
        <main>
            <br>
            <!--<span style="font-size:1pc;">Cochabamba, 1 de Marzo de 2024 </span>-->
            <span style="font-size:1pc;">Cochabamba, {{$fechaformateada}}</span>
 
            <h2 style="line-height: 0cm;">XX-XX-XX</h2><br><br>
            <span style="font-size:1pc; line-height: 0.5cm;">Señor (a) es</span><br>
            <span style="font-size:1pc; line-height: 0.5cm;">{{ucwords(mb_strtolower($informe->nombre_dirigido,"UTF-8"))}}</span><br>
            <span style="font-size:1pc; line-height: 0.5cm;"><strong>{{ucwords(mb_strtolower($informe->cargo_dirigido,"UTF-8"))}}</strong></span><br>
            <span style="font-size:1pc; line-height: 0.5cm;"><strong>{{ucwords(mb_strtolower($informe->unidad_dirigido,"UTF-8"))}}</strong></span><br>
            <span style="font-size:1pc; line-height: 0.5cm;">De:</span><br>
            @php($arr=(json_decode($informe->usuario, true)))
            @php($json_convertido = json_decode($arr)) 
            @foreach($json_convertido as $json_convertidos) 
            <span style="font-size:1pc; line-height: 0.5cm;">{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span><br>
            <span style="font-size:1pc; line-height: 0.5cm;"><strong>{{ucwords(mb_strtolower($json_convertidos->cargo,"UTF-8"))}}</strong></span><br>
            <span style="font-size:1pc; line-height: 0.5cm;"><strong>{{ucwords(mb_strtolower($json_convertidos->unidad,"UTF-8"))}}</strong></span><br>
            @endforeach
            <span style="font-size:1pc; line-height: 0.5cm;">Presente.</span><br>
            <span style="font-size:1pc; line-height: 1cm;" >Ref.:&nbsp;&nbsp;&nbsp;<strong><u>{{$informe->referencia}}</u></strong></span>
            <span style="font-size: 11pt">{!! $informe->dato_informe !!}</span>
        
        </main>
        @endif   
        <!--Fin Main para los tipos de informe de cartas externas-->   

        

        <!--Conteo del numero de pagina-->
        {{--@if($informe->tipo_informe == "Convenio" )
        <script type="text/php">
              if ( isset($pdf) ) {
                    $x = 270;
                    $y = 750;
                    $text = "Página. {PAGE_NUM} de {PAGE_COUNT}";
                    $font = $fontMetrics->get_font("verdana", "bold");
                    $size = 10;
                    $pdf->page_text($x, $y, $text, $font, $size,array(0,0,0));
              }
        </script>
        @else--}}
        <script type="text/php">
              if ( isset($pdf) ) {
                    $x = 510;
                    $y = 750;
                    $text = "Pág. {PAGE_NUM} de {PAGE_COUNT}";
                    $font = $fontMetrics->get_font("verdana", "bold");
                    $size = 10;
                    $pdf->page_text($x, $y, $text, $font, $size,array(0,0,0));
              }
        </script>
        {{--@endif--}}
        <!-- Fin conteo del numero de pagina-->

    </body>
    
</html>
