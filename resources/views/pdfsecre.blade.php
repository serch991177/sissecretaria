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
    <header>
      @php($image_path1 = public_path() . '/img/globo.png')
      @php($imageData = base64_encode(file_get_contents($image_path1)))
      @php($srcglobo = 'data:' . mime_content_type($image_path1) . ';base64,' . $imageData)
      <div style="text-align:center ; position:relative; top:-20px; left:-295px; font-size:30px; width:550px; height:80px;"><img   src="{{$srcglobo}}" height="100px" class="img-fluid"></div>
      @php($image_path2 = public_path() . '/img/alcaldia.png')
      @php($imageData2 = base64_encode(file_get_contents($image_path2)))
      @php($srclogoalcaldia = 'data:' . mime_content_type($image_path2) . ';base64,' . $imageData2)
      <div style="text-align:center ; position:relative; top:-70px; left:-15px; font-size:30px; width:550px; height:80px;"><img   src="{{$srclogoalcaldia}}" height="50px" class="img-fluid"></div>
      @php($image_path3 = public_path() . '/img/study.png')
      @php($imageData3 = base64_encode(file_get_contents($image_path3)))
      @php($srcstudy = 'data:' . mime_content_type($image_path3) . ';base64,' . $imageData3)
      <div style="text-align:center ; position:relative; top:-140px; left:300px; font-size:30px; width:550px; height:80px;"><img   src="{{$srcstudy}}" height="50px" class="img-fluid"></div>
    </header>

    <footer style="bottom: -0.8cm;left: 0cm;right: 0cm;height: 1cm;color: black ;text-align: left;line-height: 10px;">
      <div class="linea2" style="border-top: 3px solid #33bbff; height: 1px; max-width: 800px; padding: 0; margin: -7px auto 0 auto;"></div>
      <div style="height: 1cm; color: black ; text-align: right; line-height: 10px;position:relative; right:-240px;" >
        <style>
          #table_footer{table-layout: fixed; width: 280px;}
          .thfooterA, .tdfooterA {border: 1px solid;width: 100px;word-wrap: break-word;}
        </style>
        <table  id="table_footer" cellspacing="0" border="1" style="">
          <tr>
            @php($arr=(json_decode($informe->usuario, true)))
            @php($json_convertido = json_decode($arr)) 
            @foreach($json_convertido as $json_convertidos)
            <th class="thfooterA">{{ucwords(mb_strtolower($json_convertidos->cargo,"UTF-8"))}}</th>
            @endforeach
          </tr>
          <tr>
            @php($arr=(json_decode($informe->usuario, true)))
            @php($json_convertido = json_decode($arr)) 
            @foreach($json_convertido as $json_convertidos)
            @php($image_pathfooter = public_path() . '/imagenes/'.$json_convertidos->firma)
            @php($imageDatafooter = base64_encode(file_get_contents($image_pathfooter)))
            @php($srcfooter = 'data:' . mime_content_type($image_pathfooter) . ';base64,' . $imageDatafooter)
            <td align="center" class="tdfooterA"><img src="{{$srcfooter}}" width="50" height="50" alt="Firma"></br>{{ucwords(mb_strtolower($json_convertidos->nombre,"UTF-8"))}}</td>
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
      <div style="position:relative; right:-1px; top: -120px; width: 35% !important;">
        <p style="font-size:8px;line-height: 0.1cm;">www.somosinnovacion.cochabamba.bo</p>
        <p style="font-size:8px;line-height: 0.1cm;">somosinnovacion@cochabamba.bo</p>
        @php($image_path4 = public_path() . '/img/log_whatssap.png')
        @php($imageData4 = base64_encode(file_get_contents($image_path4)))
        @php($srcwhatssap = 'data:' . mime_content_type($image_path4) . ';base64,' . $imageData4)
        <p style="font-size:8px;line-height: 0.1cm;"><img src="{{$srcwhatssap}}" height="12px" alt=""> +591 61688103</p>
        <!--<p style="font-size:8px;line-height: 0.1cm;">Telf.: 4258030  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;www.cochabamba.gob.bo</p>-->
      </div>
    </footer>

    <!--marca de agua del membrete-->
    <div style="position: fixed;bottom:-3cm; left: -3cm; width:20cm; height:14cm; z-index:-1000;">
      @php($image_path3 = public_path() . '/img/membretefondo.jpg')
      @php($imageData3 = base64_encode(file_get_contents($image_path3)))
      @php($src3 = 'data:' . mime_content_type($image_path3) . ';base64,' . $imageData3)
      <img src="{{$src3}}" height="100%" width="100%">
    </div>
    
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