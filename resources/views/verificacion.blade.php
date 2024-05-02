
<html lang="es">
<head>
  <title>Alcaldía de Cochabamba</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    .contSeguimiento {
    margin-bottom: 10px;
    }
    .contenedorPdf {
    height: 500px;
    }
    @media (max-width: 767px) {
    .contenedorPdf {
        height: 150px;
    }
    }
</style>
<body>
  
  <div class="container">
    <div class="jumbotron text-center">
      <div class="row justify-content-center">
        <div class="col-6 col-xs-4 col-sm-3 col-md-3">
           <img src="/img/escudo_letras_negras.png" alt="Alcaldia de Cochabamba" width="100%">        
        </div>
      </div>
     
      <p class="mt-5">Documento elaborador por: </p>
      @foreach($solicitud as $solicitudes)
      @php($cargo_nombre = $solicitudes->cargo.' '.$solicitudes->nombre_completo)
      <h4>{{$cargo_nombre}}</h4>
     
     
    </div>
    <div class="row">
      <div class="col-12">
        
                              <div class="alert alert-primary" role="alert">
              <h3>Finalizado</h3>
                <h5>{{$solicitudes->tipo_informe}}</h5>
                <div class="row">
                  <div class="col-sm-4 col-xs-12">
                    Referencia: {{$solicitudes->referencia}}
                  </div>
                </div>
                <div class="row">
                <div class="col-sm-8 col-xs-12">
                  Fecha de elaboracion: {{$solicitudes->fecha}}
                </div>
                <div class="col-sm-8 col-xs-12">
                    Fecha de finalizacion: {{$solicitudes->fecha_finalizacion}}
                </div>
                @php($year = date("Y", strtotime(now())))
                @if($solicitudes->tipo_informe == "Convenio")
                  <div class="col-sm-4 col-xs-12">
                    Cite: CONV.INST - SG N.º{{$solicitudes->cite}}/{{$year}}
                  </div>
                @endif
                @if($solicitudes->tipo_informe == "Comunicacion Internas")
                  <div class="col-sm-4 col-xs-12">
                    Cite: DRII-CI-{{$solicitudes->cite_comunicaciones}}-{{$year}}
                  </div>
                @endif
                @if($solicitudes->tipo_informe == "Informe")
                  <div class="col-sm-4 col-xs-12">
                    Cite: DRII-IN-{{$solicitudes->cite_informes}}-{{$year}}
                  </div>
                @endif
                @if($solicitudes->tipo_informe == "Memorandums")
                  <div class="col-sm-4 col-xs-12">
                    Cite: DRII-M-{{$solicitudes->cite_memo}}-{{$year}}
                  </div>
                @endif
              </div>
              @endforeach
                <h3>Revisores</h3>
                <ul class="list-group mb-4">
                    @foreach($solicitud as $solicituds)
                    @php($json = (json_decode($solicituds->usuario, true)))
                    @php($json_usuarios=json_decode($json))
                    @foreach($json_usuarios as $json_user)
                   
                    
                    <li class="list-group-item ">
                      {{$json_user->cargo}}<br>
                      <span class="badge bg-info rounded-pill">{{$json_user->nombre}}</span>
                    </li>
                    @endforeach
                    @endforeach
                </ul>
                           
            </div>
          
                  
              </div>
      <div class="col-12">
                                          </div>      
    </div>
  </div>
</body>
</html>
