<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Informe</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Verdana&display=swap">
    <style>
      html {/* Arriba | Derecha | Abajo | Izquierda */margin: 3cm 2cm 3cm 3cm;}
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
      .logo {width: 10%;text-align: center;border: 0px; }
      @page { margin: 108px 80px; font-size:11px !important; line-height: 14px;  }
      header {position: fixed;top: -108px;left: 0px;right: 0px;height: 108px;padding: .5em;text-align: center;}
      footer {/*overflow: hidden;*/position: fixed;bottom: -0.3cm;left: 0cm;right: 0cm;height: 1cm;            }
      body{line-height: 1.15;font-family: 'Verdana';}
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
        <img  align="left" src="{{$src}}" height="90px" class="img-fluid">
      </div>
      <div style="width: 50% !important; float:right;">    
        @php($image_path2 = public_path() . '/img/cocha.png')
        @php($imageData2 = base64_encode(file_get_contents($image_path2)))
        @php($src2 = 'data:' . mime_content_type($image_path2) . ';base64,' . $imageData2)
        <img align="right"  src="{{$src2}}" height="60px" class="img-fluid"/> 
      </div>
      <div class="linea" style="border-top: 3px solid #33bbff; height: 20px; max-width: 2000px; padding: 0; margin: 90px auto 0 auto;"></div>
    </header>
    @endif
    <!--Fin Header para los informes tipos cartas externas-->

    <!-- Header para el informe Memorandum-->
    @if($informe->tipo_informe == "Memorandums" )
    <header>
      <div  class="logo"  style="width: 20% !important; float:left;">
        @php($image_path1 = public_path() . '/img/escudo.png')
        @php($imageData = base64_encode(file_get_contents($image_path1)))
        @php($src = 'data:' . mime_content_type($image_path1) . ';base64,' . $imageData)
        <img  align="left" src="{{$src}}" height="90px" class="img-fluid">
      </div>
      <div style="width: 50% !important; padding:left:180px">    
        @php($image_path2 = public_path() . '/img/memo.png')
        @php($imageData2 = base64_encode(file_get_contents($image_path2)))
        @php($src2 = 'data:' . mime_content_type($image_path2) . ';base64,' . $imageData2)
        <img align="right"  src="{{$src2}}" height="80px" width="320px" class="img-fluid"/> 
      </div>
      <div class="linea" style="border-top: 3px solid #33bbff; height: 20px; max-width: 2000px; padding: 0; margin: 90px auto 0 auto;"></div>
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
      <footer style="bottom: -0.8cm;left: 0cm;right: 0cm;height: 1cm;color: black ;text-align: left;line-height: 10px;">
              <div style="left: 0cm; right: 0cm; height: 1cm; color: black ; text-align: left; line-height: 10px;" >
              <style>
                .table-footer{
                  table-layout: fixed;
                  width: 555px;
                }
                .ta-footer {
                  border: 1px solid;
                  width: 100px;
                  word-wrap: break-word;
                }
              </style>
              <table class="table-footer" cellspacing="0" border="1">
                  <tr>
                      @php($arr=(json_decode($informe->usuario, true)))
                      @php($json_convertido = json_decode($arr)) 
                      @foreach($json_convertido as $json_convertidos)
                      <th class="ta-footer">{{ucwords(mb_strtolower($json_convertidos->cargo,"UTF-8"))}}</th>
                      @endforeach
                  </tr>
                  <tr>
                  @php($arr=(json_decode($informe->usuario, true)))
                      @php($json_convertido = json_decode($arr)) 
                      @foreach($json_convertido as $json_convertidos)
                      @php($image_pathfooter = public_path() . '/imagenes/'.$json_convertidos->firma)
                      @php($imageDatafooter = base64_encode(file_get_contents($image_pathfooter)))
                      @php($srcfooter = 'data:' . mime_content_type($image_pathfooter) . ';base64,' . $imageDatafooter)
                      <td class="ta-footer" align="center"><img src="{{$srcfooter}}" width="50" height="50" alt="Firma"></br>{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</td>
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
    @else
        <!--Footer para todos los documentos-->
          <footer style="bottom: -1.1cm;left: 0cm;right: 0cm;height: 1cm;color: black ;text-align: left;line-height: 10px;">
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
      
    <!-- Wrap the content of your PDF inside a main tag --> 
    <div style="position: fixed; bottom:   0cm; left:     0.2cm; width:    18cm; height:   18cm; z-index:  -1000;">
      @php($image_path3 = public_path() . '/img/borrador.png')
      @php($imageData3 = base64_encode(file_get_contents($image_path3)))
      @php($src3 = 'data:' . mime_content_type($image_path3) . ';base64,' . $imageData3)
      <img src="{{$src3}}" height="100%" width="100%">
    </div>
    <!--Fin de marca de agua-->

    <!-- main para los tipos de informe de cartas externas-->
    @if($informe->tipo_informe == "Cartas Externas")
    <main>
      <br>
      <!--<span style="font-size:1pc;">Cochabamba, 1 de Marzo de 2024 </span>-->
      <span style="font-size:1pc;">Cochabamba, {{$fechaformateada}}</span>
      <h2 style="line-height: 0cm;">XX-XX-XX</h2><br><br>
      <span style="font-size:1pc; line-height: 0.5cm;">Señor (a) es</span><br>
      <span style="font-size:1pc; line-height: 0.5cm;">{{$informe->prefijo}} {{ucwords(mb_strtolower($informe->nombre_dirigido,"UTF-8"))}}</span><br>
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
      <div style="text-align: justify;"><span style="font-size: 11pt; ">{!! $informe->dato_informe !!}</span></div>
    </main>
    @endif   
    <!--Fin Main para los tipos de informe de cartas externas-->

    <!--main para los tipos de informe de comunicacion interna-->
    @if($informe->tipo_informe == "Comunicacion Internas")
    <main>
      <!--Titulo Comunicaciones internas-->
      <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <span style="font-size:15px; line-height: 0.2cm;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><u>COMUNICACIÓN INTERNA Nº: XX-CI-ZZ</u></strong></span>
      </div>
      <!--Usuario dirigido A: border-style: solid;-->
      <div style="display: flex; align-items: center;">
        <div style="float:left; margin-top: 10px;" ><span style="font-size:0.8pc;"><strong>A:</strong></span> </div>
      </div>  
      @php($array_prefijo=(json_decode($informe->prefijo, true)))
      @php($array_nombre_dirigido=(json_decode($informe->nombre_dirigido, true)))
      @php($array_cargo_dirigido=(json_decode($informe->cargo_dirigido, true)))
      @php($array_unidad_dirigido=(json_decode($informe->unidad_dirigido, true)))
        @for($i=0;$i<count($array_prefijo); $i++)
        <div style="position: relative; top: -3px;">
          <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.6cm;">{{$array_prefijo[$i]}} {{ucwords(mb_strtolower($array_nombre_dirigido[$i],"UTF-8"))}}</span></div><br><br> 
          <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.3cm;"><strong></strong><strong>{{ucwords(mb_strtoupper($array_cargo_dirigido[$i],"UTF-8"))}} {{ucwords(mb_strtoupper($array_unidad_dirigido[$i],"UTF-8"))}}</strong></span></div><br>
        </div>  
        @endfor
      <!--Usuarios involucrados De: border-style: solid;-->
      @php($condicion_cumplida= false)
      @php($is_marusic=false)
      @php($direct_alone=false)
      @foreach($array_nombre_dirigido as $array_nombre_dirigidos)
        @if(!$condicion_cumplida && $array_nombre_dirigidos === "ALFREDO ALBERTO MARUSIC QUIROGA")
          @php($condicion_cumplida = true)
          @php($is_marusic = true)
        @elseif(!$condicion_cumplida && $array_nombre_dirigidos === "MANFRED ARMANDO ANTONIO REYES VILLA BACIGALUPI")
          <div><span style="font-size:0.8pc; line-height: 0.6cm;"><strong>Via:</strong></span></div>
          <div style="position: relative; top: -28px;">
            <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.6cm;">Abg. Alfredo Alberto Marusic Quiroga</span></div><br><br>
            <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.2cm;"><strong>SECRETARIO GENERAL</strong></span></div>
          </div>
          @php($condicion_cumplida = true)
        @endif            
      @endforeach
      @foreach($array_cargo_dirigido as $array_cargo_dirigidos)
            @if(!$condicion_cumplida && ($array_cargo_dirigidos === "SECRETARIO A.I." || $array_cargo_dirigidos === "SECRETARIO" || $array_cargo_dirigidos === "SECRETARIO MUNICIPAL" || $array_cargo_dirigidos === "SECRETARIA A.I." || $array_cargo_dirigidos === "SECRETARIA" || $array_cargo_dirigidos === "SECRETARIA MUNICIPAL" || $array_cargo_dirigidos === "ALCALDESA"))
            <div><span style="font-size:0.8pc; line-height: 0.6cm;"><strong>Via:</strong></span></div>
            <div style="position: relative; top: -28px;">
              <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.6cm;">Abg. Alfredo Alberto Marusic Quiroga</span></div><br><br>
              <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.2cm;"><strong>SECRETARIO GENERAL</strong></span></div>
            </div>
            @php($condicion_cumplida=true)
            @endif
      @endforeach
      @if($condicion_cumplida)
        @if($is_marusic)
          @php($arr=(json_decode($informe->usuario, true)))
          @php($json_convertido = json_decode($arr)) 
          @php($datosInvertidos = array_reverse($json_convertido))
          @foreach($datosInvertidos as $json_convertidos)
          @if($json_convertidos->cargo == "DIRECTOR" || $json_convertidos->cargo == "DIRECTORA")
            @if(count($datosInvertidos) == 1)
              @php($direct_alone = true)
              <div><span style="font-size:0.8pc; line-height: 0.6cm;"><strong>De:</strong></span></div>
              <div style="position: relative; top: -28px;">
                <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.6cm;">{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span></div><br><br>
                <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.2cm;"><strong>{{ucwords(mb_strtoupper($json_convertidos->cargo,"UTF-8"))}}  {{ucwords(mb_strtoupper($json_convertidos->unidad,"UTF-8"))}}</strong></span></div>
              </div>
            @else
              <div><span style="font-size:0.8pc; line-height: 0.6cm;"><strong>Via:</strong></span></div>
              <div style="position: relative; top: -28px;">
                <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.6cm;">{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span></div><br><br>
                <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.2cm;"><strong>{{ucwords(mb_strtoupper($json_convertidos->cargo,"UTF-8"))}}  {{ucwords(mb_strtoupper($json_convertidos->unidad,"UTF-8"))}}</strong></span></div>
              </div>
            @endif
            @if(count($datosInvertidos) == 1)
              <div><span style="font-size:0.8pc; line-height: 0.5cm;"><strong></strong></span></div>
            @else
              <div><span style="font-size:0.8pc; line-height: 0.5cm;"><strong>De:</strong></span></div>
            @endif
        @else
          <div style="position:relative; top: -27px;">
            <div style="width: 91.5%; text-align: left; margin-left: auto; "><span style="font-size: 0.8pc; line-height: 0.2cm;">{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span></div>
            <div style="width: 91.5%; text-align: left;margin-left: auto;">
              <span style="font-size: 0.8pc; line-height: 0.4cm;">
                <strong>{{ucwords(mb_strtoupper($json_convertidos->cargo,"UTF-8"))}}  {{ucwords(mb_strtoupper($json_convertidos->unidad,"UTF-8"))}}</strong>
              </span>
            </div>
          </div>
        @endif
          @if(!$loop->last)
            <br>
          @endif               
          @endforeach
        @else
            <!--Si el documento es hacia el alcalde o hacia un secretario va via marusic-->
            <div><span style="font-size:0.8pc; line-height: 0.1cm;"><strong>De:</strong></span></div>
            @php($arr=(json_decode($informe->usuario, true)))
            @php($json_convertido = json_decode($arr)) 
            @php($datosInvertidos = array_reverse($json_convertido))
            @foreach($datosInvertidos as $json_convertidos)
            <div style="position:relative; top: -18px;">
              <div style="width: 91.5%; text-align: left; margin-left: auto; "><span style="font-size: 0.8pc; line-height: 0.2cm;">{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span></div>
              <div style="width: 91.5%; text-align: left;margin-left: auto;">
                <span style="font-size: 0.8pc; line-height: 0.4cm;">
                  <strong>{{ucwords(mb_strtoupper($json_convertidos->cargo,"UTF-8"))}}  {{ucwords(mb_strtoupper($json_convertidos->unidad,"UTF-8"))}}</strong>
                </span>
              </div>
            </div>
            @if(!$loop->last)
              <br>
            @endif               
            @endforeach
        @endif  
      @else 
      <!--Si no es a ninguno la via deberia seria de un director o directora-->
      @php($arr=(json_decode($informe->usuario, true)))
      @php($json_convertido = json_decode($arr)) 
      @php($datosInvertidos = array_reverse($json_convertido))
      @if($json_convertidos->cargo == "DIRECTOR" || $json_convertidos->cargo == "DIRECTORA")
      @else
        <div><span style="font-size:0.8pc; line-height: 0.6cm;"><strong>  </strong></span></div>
        <div style="position: relative; top: -28px;">
          <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.6cm;"></span></div><br><br>
          <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.2cm;"><strong></strong></span></div>
        </div>
        <div><span style="font-size:0.8pc; line-height: 0.5cm;"><strong>De:</strong></span></div>
      @endif
      
      @foreach($datosInvertidos as $json_convertidos)
        @if($json_convertidos->cargo == "DIRECTOR" || $json_convertidos->cargo == "DIRECTORA")
          @if(count($datosInvertidos) == 1)
            @php($direct_alone = true)
            <div><span style="font-size:0.8pc; line-height: 0.6cm;"><strong>De:</strong></span></div>
            <div style="position: relative; top: -28px;">
              <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.6cm;">{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span></div><br><br>
              <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.2cm;"><strong>{{ucwords(mb_strtoupper($json_convertidos->cargo,"UTF-8"))}}  {{ucwords(mb_strtoupper($json_convertidos->unidad,"UTF-8"))}}</strong></span></div>
            </div>
          @else
            <div><span style="font-size:0.8pc; line-height: 0.6cm;"><strong>Via:</strong></span></div>
            <div style="position: relative; top: -28px;">
              <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.6cm;">{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span></div><br><br>
              <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.2cm;"><strong>{{ucwords(mb_strtoupper($json_convertidos->cargo,"UTF-8"))}}  {{ucwords(mb_strtoupper($json_convertidos->unidad,"UTF-8"))}}</strong></span></div>
            </div>
            <div><span style="font-size:0.8pc; line-height: 0.5cm;"><strong>De:</strong></span></div>
          @endif
        @else
          <div style="position:relative; top: -27px;">
            <div style="width: 91.5%; text-align: left; margin-left: auto; "><span style="font-size: 0.8pc; line-height: 0.2cm;">{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span></div>
            <div style="width: 91.5%; text-align: left;margin-left: auto;">
              <span style="font-size: 0.8pc; line-height: 0.4cm;">
                <strong>{{ucwords(mb_strtoupper($json_convertidos->cargo,"UTF-8"))}}  {{ucwords(mb_strtoupper($json_convertidos->unidad,"UTF-8"))}}</strong>
              </span>
            </div>
          </div>
        @endif
        {{--@else 
          <div style="position:relative; top: -10px;">
            <div style="width: 91.5%; text-align: left; margin-left: auto; "><span style="font-size: 0.8pc; line-height: 0.2cm;">{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span></div>
            <div style="width: 91.5%; text-align: left;margin-left: auto;">
              <span style="font-size: 0.8pc; line-height: 0.4cm;">
                <strong>{{ucwords(mb_strtoupper($json_convertidos->cargo,"UTF-8"))}}  {{ucwords(mb_strtoupper($json_convertidos->unidad,"UTF-8"))}}</strong>
              </span>
            </div>
          </div>
        @endif--}}
        @if(!$loop->last)
          <br>
        @endif               
      @endforeach
      @endif
      <!--Referncia-->
      @if(count($datosInvertidos) == 1 && $direct_alone)
        <div style="display: flex; align-items: center;">
          <div style="width: 10%;  margin-right: auto;"><span style="font-size: 0.8pc; line-height: 0.3cm;"><strong>Ref.:</strong></span></div>
          <div style="width: 91.5%; text-align: left; margin-left: auto;  solid; margin-top: -25px;"><span style="font-size: 0.8pc; line-height: 0cm;"><strong>{{mb_strtoupper($informe->referencia,"UTF-8")}}</strong></span></div>
        </div>
      @else
        <div style="display: flex; align-items: center;">
          <div style="width: 10%;  margin-right: auto;"><span style="font-size: 0.8pc; line-height: 0.3cm;"><strong>Ref.:</strong></span></div>
          <div style="width: 91.5%; text-align: left; margin-left: auto;  solid; margin-top: -25px;"><span style="font-size: 0.8pc; line-height: 0.3cm;"><strong>{{mb_strtoupper($informe->referencia,"UTF-8")}}</strong></span></div>
        </div>
      @endif
      <!--Fecha-->
      <div style="display: flex; align-items: center;">
        <div style="width: 10%;  margin-right: auto;"><span style="font-size: 0.8pc; line-height: 0.5cm;"><strong>Fecha:</strong></span></div>
        <div style="width: 91.5%; text-align: left; margin-left: auto;  solid; margin-top: -25px;"><span style="font-size: 0.8pc; line-height: 0.4cm;">Cochabamba, {{$fechaformateada}}</span></div>
      </div>
      <div class="lineacomunicacioninterna" style="border-top: 3px solid #000000; height: 5px; max-width: 2000px; padding: 0; margin: 5px auto 0 auto;"></div>
      <!--contenido del informe-->
      <div style="text-align: justify;"><span style="font-size: 11pt; ">{!! $informe->dato_informe !!}</span></div>
      <style>
        .print-footer {position: fixed;bottom: 0;left: 0;right: 0;font-size: 6pt;text-align: left;padding: 5px;white-space: nowrap;}
        .print-footer p {margin: 0; padding: 0; }
      </style>
      <!-- Pie de página para la última hoja -->
      <div class="print-footer">{!! $informe->pie_pagina !!}</div>
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
                @php($array_prefijo=(json_decode($informe->prefijo, true)))
                @php($array_nombre_dirigido=(json_decode($informe->nombre_dirigido, true)))
                @php($array_cargo_dirigido=(json_decode($informe->cargo_dirigido, true)))
                @php($array_unidad_dirigido=(json_decode($informe->unidad_dirigido, true)))
                @for($i=0;$i<count($array_prefijo); $i++)
                    <p>{{$array_prefijo[$i]}} {{ucwords(mb_strtolower($array_nombre_dirigido[$i],"UTF-8"))}}</p>
                    <p class="txtUpercaseBold txtTitle">{{ucwords(mb_strtoupper($array_cargo_dirigido[$i],"UTF-8"))}} - {{ucwords(mb_strtoupper($array_unidad_dirigido[$i],"UTF-8"))}}</p>
                    <br>
                @endfor
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
        <div style="text-align: justify;"><span style="font-size: 11pt; ">{!! $informe->dato_informe !!}</span></div>
        <style>
          .print-footer {position: fixed;bottom: 0;left: 0;right: 0;font-size: 6pt;text-align: left;padding: 5px;white-space: nowrap;}
          .print-footer p {margin: 0; padding: 0; }
        </style>
        <!-- Pie de página para la última hoja -->
        <div class="print-footer">{!! $informe->pie_pagina !!}</div>
    </main>
    @endif
    <!--Fin main para los tipos de informe de memorandum -->
    <!--Main para los tipo de informes "informe"-->
    @if($informe->tipo_informe == "Informe" || $informe->tipo_informe == "Informe Tecnico" || $informe->tipo_informe == "Informe Legal")
    <main>
        <!--Titulo Informes-->
        <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
          <span style="font-size:15px; line-height: 0.2cm;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>{{mb_strtoupper($informe->tipo_informe,"UTF-8")}}</strong></span>
        </div>
        <!--Cite del informe-->
        <div style="float:right; font-size:15px; line-height: 0.2cm;"><strong>Nº: XX-CI-ZZ</strong> </div><br>
        <!--Usuario dirigido A: border-style: solid;-->
        <div style="display: flex; align-items: center;">
          <div style="float:left; margin-top: 10px;" ><span style="font-size:0.8pc;"><strong>A:</strong></span> </div>
        </div>  
          @php($array_prefijo=(json_decode($informe->prefijo, true)))
          @php($array_nombre_dirigido=(json_decode($informe->nombre_dirigido, true)))
          @php($array_cargo_dirigido=(json_decode($informe->cargo_dirigido, true)))
          @php($array_unidad_dirigido=(json_decode($informe->unidad_dirigido, true)))
          @for($i=0;$i<count($array_prefijo); $i++)
            <div style="position: relative; top: -3px;">
              <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.6cm;">{{$array_prefijo[$i]}} {{ucwords(mb_strtolower($array_nombre_dirigido[$i],"UTF-8"))}}</span></div><br><br> 
              <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.3cm;"><strong></strong><strong>{{ucwords(mb_strtoupper($array_cargo_dirigido[$i],"UTF-8"))}} {{ucwords(mb_strtoupper($array_unidad_dirigido[$i],"UTF-8"))}}</strong></span></div><br>
            </div>  
          @endfor
        <!--Usuarios involucrados De: border-style: solid;-->
        @php($condicion_cumplida= false)
        @php($is_marusic=false)
        @php($direct_alone=false)
        @foreach($array_nombre_dirigido as $array_nombre_dirigidos)
          @if(!$condicion_cumplida && $array_nombre_dirigidos === "ALFREDO ALBERTO MARUSIC QUIROGA")
            @php($condicion_cumplida = true)
            @php($is_marusic = true)
          @elseif(!$condicion_cumplida && $array_nombre_dirigidos === "MANFRED ARMANDO ANTONIO REYES VILLA BACIGALUPI")
            <div><span style="font-size:0.8pc; line-height: 0.6cm;"><strong>Via:</strong></span></div>
            <div style="position: relative; top: -28px;">
              <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.6cm;">Abg. Alfredo Alberto Marusic Quiroga</span></div><br><br>
              <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.2cm;"><strong>SECRETARIO GENERAL</strong></span></div>
            </div>
            @php($condicion_cumplida = true)
          @endif            
        @endforeach
        @foreach($array_cargo_dirigido as $array_cargo_dirigidos)
          @if(!$condicion_cumplida && ($array_cargo_dirigidos === "SECRETARIO A.I." || $array_cargo_dirigidos === "SECRETARIO" || $array_cargo_dirigidos === "SECRETARIO MUNICIPAL" || $array_cargo_dirigidos === "SECRETARIA A.I." || $array_cargo_dirigidos === "SECRETARIA" || $array_cargo_dirigidos === "SECRETARIA MUNICIPAL" || $array_cargo_dirigidos === "ALCALDESA"))
            <div><span style="font-size:0.8pc; line-height: 0.6cm;"><strong>Via:</strong></span></div>
            <div style="position: relative; top: -28px;">
              <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.6cm;">Abg. Alfredo Alberto Marusic Quiroga</span></div><br><br>
              <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.2cm;"><strong>SECRETARIO GENERAL</strong></span></div>
            </div>
            @php($condicion_cumplida=true)
          @endif
        @endforeach
        @if($condicion_cumplida)
          @if($is_marusic)
            @php($arr=(json_decode($informe->usuario, true)))
            @php($json_convertido = json_decode($arr)) 
            @php($datosInvertidos = array_reverse($json_convertido))
            @foreach($datosInvertidos as $json_convertidos)
            @if($json_convertidos->cargo == "DIRECTOR" || $json_convertidos->cargo == "DIRECTORA")
              @if(count($datosInvertidos) == 1)
                @php($direct_alone = true)
                <div><span style="font-size:0.8pc; line-height: 0.6cm;"><strong>De:</strong></span></div>
                <div style="position: relative; top: -28px;">
                  <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.6cm;">{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span></div><br><br>
                  <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.2cm;"><strong>{{ucwords(mb_strtoupper($json_convertidos->cargo,"UTF-8"))}}  {{ucwords(mb_strtoupper($json_convertidos->unidad,"UTF-8"))}}</strong></span></div>
                </div>
              @else
                <div><span style="font-size:0.8pc; line-height: 0.6cm;"><strong>Via:</strong></span></div>
                <div style="position: relative; top: -28px;">
                  <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.6cm;">{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span></div><br><br>
                  <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.2cm;"><strong>{{ucwords(mb_strtoupper($json_convertidos->cargo,"UTF-8"))}}  {{ucwords(mb_strtoupper($json_convertidos->unidad,"UTF-8"))}}</strong></span></div>
                </div>
              @endif
              @if(count($datosInvertidos) == 1)
                <div><span style="font-size:0.8pc; line-height: 0.5cm;"><strong></strong></span></div>
              @else
                <div><span style="font-size:0.8pc; line-height: 0.5cm;"><strong>De:</strong></span></div>
              @endif
          @else
            <div style="position:relative; top: -27px;">
              <div style="width: 91.5%; text-align: left; margin-left: auto; "><span style="font-size: 0.8pc; line-height: 0.2cm;">{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span></div>
              <div style="width: 91.5%; text-align: left;margin-left: auto;">
                <span style="font-size: 0.8pc; line-height: 0.4cm;">
                  <strong>{{ucwords(mb_strtoupper($json_convertidos->cargo,"UTF-8"))}}  {{ucwords(mb_strtoupper($json_convertidos->unidad,"UTF-8"))}}</strong>
                </span>
              </div>
            </div>
          @endif
            @if(!$loop->last)
              <br>
            @endif               
            @endforeach
          @else
              <!--Si el documento es hacia el alcalde o hacia un secretario va via marusic-->
              <div><span style="font-size:0.8pc; line-height: 0.1cm;"><strong>De:</strong></span></div>
              @php($arr=(json_decode($informe->usuario, true)))
              @php($json_convertido = json_decode($arr)) 
              @php($datosInvertidos = array_reverse($json_convertido))
              @foreach($datosInvertidos as $json_convertidos)
              <div style="position:relative; top: -18px;">
                <div style="width: 91.5%; text-align: left; margin-left: auto; "><span style="font-size: 0.8pc; line-height: 0.2cm;">{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span></div>
                <div style="width: 91.5%; text-align: left;margin-left: auto;">
                  <span style="font-size: 0.8pc; line-height: 0.4cm;">
                    <strong>{{ucwords(mb_strtoupper($json_convertidos->cargo,"UTF-8"))}}  {{ucwords(mb_strtoupper($json_convertidos->unidad,"UTF-8"))}}</strong>
                  </span>
                </div>
              </div>
              @if(!$loop->last)
                <br>
              @endif               
              @endforeach
          @endif  
        @else 
          <!--Si no es a ninguno la via deberia seria de un director o directora-->
          @php($arr=(json_decode($informe->usuario, true)))
          @php($json_convertido = json_decode($arr)) 
          @php($datosInvertidos = array_reverse($json_convertido))
          @if($json_convertidos->cargo == "DIRECTOR" || $json_convertidos->cargo == "DIRECTORA")
          @else
            <div><span style="font-size:0.8pc; line-height: 0.6cm;"><strong>  </strong></span></div>
            <div style="position: relative; top: -28px;">
              <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.6cm;"></span></div><br><br>
              <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.2cm;"><strong></strong></span></div>
            </div>
            <div><span style="font-size:0.8pc; line-height: 0.5cm;"><strong>De:</strong></span></div>
          @endif
          
          @foreach($datosInvertidos as $json_convertidos)
            @if($json_convertidos->cargo == "DIRECTOR" || $json_convertidos->cargo == "DIRECTORA")
              @if(count($datosInvertidos) == 1)
                @php($direct_alone = true)
                <div><span style="font-size:0.8pc; line-height: 0.6cm;"><strong>De:</strong></span></div>
                <div style="position: relative; top: -28px;">
                  <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.6cm;">{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span></div><br><br>
                  <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.2cm;"><strong>{{ucwords(mb_strtoupper($json_convertidos->cargo,"UTF-8"))}}  {{ucwords(mb_strtoupper($json_convertidos->unidad,"UTF-8"))}}</strong></span></div>
                </div>
              @else
                <div><span style="font-size:0.8pc; line-height: 0.6cm;"><strong>Via:</strong></span></div>
                <div style="position: relative; top: -28px;">
                  <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.6cm;">{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span></div><br><br>
                  <div style="width: 91.5%; float: right; right: -250px;"><span style="font-size:0.8pc; line-height: 0.2cm;"><strong>{{ucwords(mb_strtoupper($json_convertidos->cargo,"UTF-8"))}}  {{ucwords(mb_strtoupper($json_convertidos->unidad,"UTF-8"))}}</strong></span></div>
                </div>
                <div><span style="font-size:0.8pc; line-height: 0.5cm;"><strong>De:</strong></span></div>
              @endif
            @else
              <div style="position:relative; top: -27px;">
                <div style="width: 91.5%; text-align: left; margin-left: auto; "><span style="font-size: 0.8pc; line-height: 0.2cm;">{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span></div>
                <div style="width: 91.5%; text-align: left;margin-left: auto;">
                  <span style="font-size: 0.8pc; line-height: 0.4cm;">
                    <strong>{{ucwords(mb_strtoupper($json_convertidos->cargo,"UTF-8"))}}  {{ucwords(mb_strtoupper($json_convertidos->unidad,"UTF-8"))}}</strong>
                  </span>
                </div>
              </div>
            @endif
            {{--@else 
              <div style="position:relative; top: -10px;">
                <div style="width: 91.5%; text-align: left; margin-left: auto; "><span style="font-size: 0.8pc; line-height: 0.2cm;">{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span></div>
                <div style="width: 91.5%; text-align: left;margin-left: auto;">
                  <span style="font-size: 0.8pc; line-height: 0.4cm;">
                    <strong>{{ucwords(mb_strtoupper($json_convertidos->cargo,"UTF-8"))}}  {{ucwords(mb_strtoupper($json_convertidos->unidad,"UTF-8"))}}</strong>
                  </span>
                </div>
              </div>
            @endif--}}
            @if(!$loop->last)
              <br>
            @endif               
          @endforeach
        @endif
        <!--Referencia-->
        @if(count($datosInvertidos) == 1 && $direct_alone)
          <div style="display: flex; align-items: center;">
            <div style="width: 10%;  margin-right: auto;"><span style="font-size: 0.8pc; line-height: 0.3cm;"><strong>Ref.:</strong></span></div>
            <div style="width: 91.5%; text-align: left; margin-left: auto;  solid; margin-top: -25px;"><span style="font-size: 0.8pc; line-height: 0cm;"><strong>{{mb_strtoupper($informe->referencia,"UTF-8")}}</strong></span></div>
          </div>
        @else
          <div style="display: flex; align-items: center;">
            <div style="width: 10%;  margin-right: auto;"><span style="font-size: 0.8pc; line-height: 0.3cm;"><strong>Ref.:</strong></span></div>
            <div style="width: 91.5%; text-align: left; margin-left: auto;  solid; margin-top: -25px;"><span style="font-size: 0.8pc; line-height: 0.3cm;"><strong>{{mb_strtoupper($informe->referencia,"UTF-8")}}</strong></span></div>
          </div>
        @endif
        <!--Fecha-->
        <div style="display: flex; align-items: center;">
          <div style="width: 10%;  margin-right: auto;"><span style="font-size: 0.8pc; line-height: 0.5cm;"><strong>Fecha:</strong></span></div>
          <div style="width: 91.5%; text-align: left; margin-left: auto;  solid; margin-top: -25px;"><span style="font-size: 0.8pc; line-height: 0.4cm;">Cochabamba, {{$fechaformateada}}</span></div>
        </div>
        <div class="lineacomunicacioninterna" style="border-top: 3px solid #000000; height: 1px; max-width: 2000px; padding: 0; margin: 5px auto 0 auto;"></div>
        <!--contenido del informe-->
        <div style="text-align: justify;"><span style="font-size: 11pt; ">{!! $informe->dato_informe !!}</span></div>
        <style>
          .print-footer {position: fixed;bottom: 0;left: 0;right: 0;font-size: 6pt;text-align: left;padding: 5px;white-space: nowrap;}
          .print-footer p {margin: 0; padding: 0; }
        </style>
        <!-- Pie de página para la última hoja -->
        <div class="print-footer">{!! $informe->pie_pagina !!}</div>        
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
      <span style="font-size:1pc; line-height: 0.5cm;">{{$informe->prefijo}} {{ucwords(mb_strtolower($informe->nombre_dirigido,"UTF-8"))}}</span><br>
      <span style="font-size:1pc; line-height: 0.5cm;"><strong>{{mb_strtoupper($informe->cargo_dirigido,"UTF-8")}}  {{mb_strtoupper($informe->unidad_dirigido,"UTF-8")}}</strong></span><br><br>
      {{--@php($arr=(json_decode($informe->usuario, true)))
      @php($json_convertido = json_decode($arr)) 
      @foreach($json_convertido as $json_convertidos) 
      <span style="font-size:1pc; line-height: 0.5cm;">{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</span><br>
      <span style="font-size:1pc; line-height: 0.5cm;"><strong>{{ucwords(mb_strtoupper($json_convertidos->cargo,"UTF-8"))}}  {{ucwords(mb_strtoupper($json_convertidos->unidad,"UTF-8"))}}</strong></span><br><br>
      @endforeach--}}
      <div class="lineacomunicacioninterna" style="border-top: 1px solid #000000; height: 1px; max-width: 2000px; padding: 0; margin: -2px auto 0 auto;"></div>
      <span style="font-size:1pc; line-height: 1cm;" >Ref.:&nbsp;&nbsp;<strong><strong><u>{{ucwords(mb_strtolower($informe->referencia,"UTF-8"))}}.</u></strong></span><br>
      <div style="text-align: justify;"><span style="font-size: 11pt; ">{!! $informe->dato_informe !!}</span></div>
    </main>
    @endif
    <!-- Fin main para los tipos de informes instructivos-->

    <!--main para los tipos de informes auto administrativos-->
    @if($informe->tipo_informe == "Autos Administrativos")
    <main>
      <div style="float:right; font-size:1pc; line-height: 0.8cm;" ><span>Cochabamba, {{$fechaformateada}}</span></div><br><br>
      <div style="text-align: justify;"><span style="font-size: 1pc; line-height: 0.4cm;">{!! $informe->dato_informe !!}</span></div>
    
    </main>
    @endif
    <!-- fin main para los tipos de informes auto administrativos-->
    
    <!--main para los tipos de informes de resoluciones-->
    @if($informe->tipo_informe == "Resoluciones Administrativas" || $informe->tipo_informe == "Resoluciones Administrativas Sancionatorias" || $informe->tipo_informe == "Resoluciones Administrativas Municipales" || $informe->tipo_informe == "Resoluciones De Recurso De Revocatoria")
    <main>
      <div style="float:right; font-size:1pc;"><span>Cochabamba, {{$fechaformateada}}</span></div><br><br>
      <div style="text-align: justify;"><span style="font-size: 1pc; line-height: 0.4cm; ">{!! $informe->dato_informe !!}</span></div>
    </main>
    @endif
    <!--Fin main para los tipos de informes de resoluciones-->       
          
    <!--main para los tipos de informe de convenio-->

    <!--Fin main para los tipos de informe de convenio-->
    @if($informe->tipo_informe == "Convenio" )
    <main>
      @php($year = date("Y", strtotime(now())))
      <div style="float:right; font-size:1pc;"><span>CONV.INST.N.º XXXX/{{$year}}</span></div><br><br>
      <div style="text-align: center;" ><span style="font-size: 1pc; line-height: 0.4cm; "><strong>{{$informe->referencia}}</strong></span></div>
      <div style="text-align: justify;"><span style="font-size: 1pc; line-height: 0.4cm; ">{!! $informe->dato_informe !!}</span></div>
      <br><br><br><br><br><br><br>
      <div style="left: 0cm; right: 0cm; height: 1cm; color: black ; text-align: center; line-height: 10px;" >
        <style>
          .table-sign{table-layout: fixed;width: 600px;}
          .td-sign {/*border: 1px solid;*/width: 100px;word-wrap: break-word;line-height:1;}
        </style>
        <table class="table-sign">
              @if(empty($informe->datos_convenio) || is_null($informe->datos_convenio))
                  <td class="td-sign" align="center"><br><br><strong></strong><br><br><strong></strong></td>
              @else
                  @php($array_convenio=(json_decode($informe->datos_convenio, true)))
                  @foreach($array_convenio as $index => $array_convenios)
                      @if($index % 2 == 0)
                          {{-- Iniciar una nueva fila en cada par de elementos --}}
                          </tr><tr>
                      @endif
                      <td class="td-sign" align="center" style="font-size:15px"> <br><br><br><br>
                        {{ ucwords(mb_strtolower($array_convenios['nombre_convenio'], "UTF-8")) }}<br>
                        <strong >{{ ucwords(mb_strtoupper($array_convenios['cargo_convenio'], "UTF-8")) }}</strong><br>
                        <strong >{{ ucwords(mb_strtoupper($array_convenios['empresa_convenio'], "UTF-8")) }}</strong>
                      </td>
                  @endforeach
              @endif
        </table>
      </div> 
      <style>
        .print-footer {position: fixed;bottom: 0;left: 0;right: 0;font-size: 6pt;text-align: left;padding: 8px;white-space: nowrap;}
        .print-footer p {margin: 0; padding: 0; }
      </style>
      <!-- Pie de página para la última hoja -->
      <div class="print-footer">{!! $informe->pie_pagina !!}</div>
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
