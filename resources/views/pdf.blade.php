<?php
$image_path3 = public_path() . '/img/membrete.jpg';
$imageData2 = base64_encode(file_get_contents($image_path3));
$src_fondo = 'data:' . mime_content_type($image_path3) . ';base64,' . $imageData2;
//background-image: url({{ $src_fondo }})
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Informe</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Verdana&display=swap">
    <style>
      @page {margin: 0cm 0cm;font-family: 'Verdana', sans-serif;line-height: 0.5rem;}
      body{line-height: 1.15;font-family: 'Verdana';background-image: url({{ $src_fondo }});background-size: 103% 100%;background-repeat: no-repeat;background-attachment: fixed;}
      footer {/*overflow: hidden;*/position: fixed;bottom: -0.3cm;left: 0cm;right: 0cm;height: 1cm;}
      .contenido {margin: 5cm 2cm 3cm 3cm;top: 0;}    
      header {position: fixed;top: -108px;left: 0px;right: 0px;height: 108px;padding: .5em;text-align: center;}
      body{margin: 5cm 2cm 3cm 3cm }
      main{margin: 5cm 2cm 3cm 3cm}
    </style>
  </head>

  
  <body>
    <!--Header -->
    <header >
      <div class="linea" style="border-top: 5px solid #33bbff; height: 20px; max-width: 2000px; padding: 0; margin: 250px auto 0 auto;"></div>
    </header>
    <!-- Footer -->
    <footer style="bottom: 2.5cm;left: 0cm;right: 0cm;height: 1cm;color: black ;text-align: left;line-height: 10px;">
      <div class="linea2" style="border-top: 3px solid #33bbff; height: 1px; max-width: 800px; padding: 0; margin: -7px auto 0 auto;"></div>
      <div style="height: 1cm; color: black ; text-align: right; line-height: 10px;position:relative; right:-360px;" >
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
      
      <div style="position:relative; right:-670px; top: -40px; width: 35% !important;">
        <img  src="{{$qr_image}}" width="31%" /> 
        <!--<img  src="https://upload.wikimedia.org/wikipedia/commons/4/42/Qrcode_Corona_warn_app.png?20210510130336" width="31%" />-->
        <br><br>
        <div id="pie_pagina" >
      

          <!--<span style="font-size: 1.3pc;">Pág. </span><span  style="font-size: 1.3pc;" class="page"></span>      --> 
        </div>
      </div>
      <div style="position:relative; right:-10px; top: -140px; width: 35% !important;">
        <p style="font-size:8px;line-height: 0.1cm;">GOBIERNO AUTÓNOMO MUNICIPAL DE COCHABAMBA</p>
        <p style="font-size:8px;line-height: 0.1cm;">DIVISION DE GESTION ADMINISTRATIVA</p>
        <p style="font-size:8px;line-height: 0.1cm;">Dirección AV. AYUNI Y PUENTE RECOLETA</p>
        <p style="font-size:8px;line-height: 0.1cm;">Telf.: 4258030  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;www.cochabamba.gob.bo</p>
      </div>
    </footer>
    
    <main>
      <p><strong>Lorem Ipsum</strong>&nbsp;es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen. No s&oacute;lo sobrevivi&oacute; 500 a&ntilde;os, sino que tambien ingres&oacute; como texto de relleno en documentos electr&oacute;nicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creaci&oacute;n de las hojas &quot;Letraset&quot;, las cuales contenian pasajes de Lorem Ipsum, y m&aacute;s recientemente con software de autoedici&oacute;n, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>          
      <p><strong>Lorem Ipsum</strong>&nbsp;es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen. No s&oacute;lo sobrevivi&oacute; 500 a&ntilde;os, sino que tambien ingres&oacute; como texto de relleno en documentos electr&oacute;nicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creaci&oacute;n de las hojas &quot;Letraset&quot;, las cuales contenian pasajes de Lorem Ipsum, y m&aacute;s recientemente con software de autoedici&oacute;n, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>          
      <p><strong>Lorem Ipsum</strong>&nbsp;es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen. No s&oacute;lo sobrevivi&oacute; 500 a&ntilde;os, sino que tambien ingres&oacute; como texto de relleno en documentos electr&oacute;nicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creaci&oacute;n de las hojas &quot;Letraset&quot;, las cuales contenian pasajes de Lorem Ipsum, y m&aacute;s recientemente con software de autoedici&oacute;n, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>          
      <p><strong>Lorem Ipsum</strong>&nbsp;es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen. No s&oacute;lo sobrevivi&oacute; 500 a&ntilde;os, sino que tambien ingres&oacute; como texto de relleno en documentos electr&oacute;nicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creaci&oacute;n de las hojas &quot;Letraset&quot;, las cuales contenian pasajes de Lorem Ipsum, y m&aacute;s recientemente con software de autoedici&oacute;n, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>          
      <p><strong>Lorem Ipsum</strong>&nbsp;es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen. No s&oacute;lo sobrevivi&oacute; 500 a&ntilde;os, sino que tambien ingres&oacute; como texto de relleno en documentos electr&oacute;nicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creaci&oacute;n de las hojas &quot;Letraset&quot;, las cuales contenian pasajes de Lorem Ipsum, y m&aacute;s recientemente con software de autoedici&oacute;n, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>          
      <p><strong>Lorem Ipsum</strong>&nbsp;es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen. No s&oacute;lo sobrevivi&oacute; 500 a&ntilde;os, sino que tambien ingres&oacute; como texto de relleno en documentos electr&oacute;nicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creaci&oacute;n de las hojas &quot;Letraset&quot;, las cuales contenian pasajes de Lorem Ipsum, y m&aacute;s recientemente con software de autoedici&oacute;n, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>          
      <p><strong>Lorem Ipsum</strong>&nbsp;es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen. No s&oacute;lo sobrevivi&oacute; 500 a&ntilde;os, sino que tambien ingres&oacute; como texto de relleno en documentos electr&oacute;nicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creaci&oacute;n de las hojas &quot;Letraset&quot;, las cuales contenian pasajes de Lorem Ipsum, y m&aacute;s recientemente con software de autoedici&oacute;n, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>          
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