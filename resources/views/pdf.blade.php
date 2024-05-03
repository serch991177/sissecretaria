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
      .logo {width: 10%;text-align: center;border: 0px;}
      @page { margin: 108px 80px; font-size:11px !important; line-height: 14px;  }
      header {position: fixed;top: -108px;left: 0px;right: 0px;height: 108px;padding: .5em;text-align: center;}
      footer {/*overflow: hidden;*/position: fixed;bottom: -0.3cm;left: 0cm;right: 0cm;height: 1cm;            }
      body{line-height: 1.15;font-family: 'Verdana';}
    </style>
  </head>
  <body>
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
      <!--bottom: 1.1cm;-->
    </header>
    
    <footer style="bottom: -1.1cm;left: 0cm;right: 0cm;height: 1cm;color: black ;text-align: left;line-height: 10px;">
      <div class="linea2" style="border-top: 3px solid #33bbff; height: 1px; max-width: 800px; padding: 0; margin: -7px auto 0 auto;"></div>
      <div style="left: 0cm; right: 0cm; height: 1cm; color: black ; text-align: left; line-height: 10px;" >
        <style>
          table{table-layout: fixed;width: 555px;}
          th, td {border: 1px solid;width: 100px;word-wrap: break-word;}
        </style>
        <table  cellspacing="0" border="1">
            <tr>
                @php($arr=(json_decode($informe->usuario, true)))
                @php($json_convertido = json_decode($arr)) 
                @foreach($json_convertido as $json_convertidos)
                <th >{{$json_convertidos->cargo}}</th>
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
        <img  src="{{$qr_image}}" width="31%" /> 
        <!--<img  src="https://upload.wikimedia.org/wikipedia/commons/4/42/Qrcode_Corona_warn_app.png?20210510130336" width="31%" />-->
        <br><br>
        <div id="pie_pagina" >
          <!--<span style="font-size: 1.3pc;">Pág. </span><span  style="font-size: 1.3pc;" class="page"></span>      --> 
        </div>
          
            
        </div>
    </footer>
    
    <main>   
      <div style="text-align: justify;"><span style="font-size: 11pt; ">{!! $informe->dato_informe !!}</span></div>
    </main>   
    
    <!--Conteo del numero de pagina-->
    <script type="text/php">
      if ( isset($pdf) ) {
        $x = 505;
        $y = 760;
        $text = "Pág. {PAGE_NUM} de {PAGE_COUNT}";
        $font = $fontMetrics->get_font("verdana", "bold");
        $size = 10;
        $pdf->page_text($x, $y, $text, $font, $size,array(0,0,0));
      }
    </script>
    <!-- Fin conteo del numero de pagina-->
  </body>
</html>
