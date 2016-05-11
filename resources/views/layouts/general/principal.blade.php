<!DOCTYPE html>
<html lang="es">

<head>


  <meta charset="utf-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name='csrf-param' content='authenticity_token'>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Nombre Aplicacion</title>
  <!-- Bootstrap Core CSS -->
  {!!Html::style('css/bootstrap.min.css')!!}  
  <!-- MetisMenu CSS -->
  {!!Html::style('css/metisMenu.min.css')!!}
  <!-- Timeline CSS -->
  {!!Html::style('css/timeline.css')!!} 
  <!-- Custom CSS -->
  {!!Html::style('css/sb-admin-2.css')!!}
  <!-- Custom Fonts -->
  {!!Html::style('css/font-awesome.min.css')!!}
  <!-- Kendo css-->
  {!!Html::style('css/kendo/kendo.common.min.css')!!}
  {!!Html::style('css/kendo/kendo.bootstrap.min.css')!!}
  <!-- msgbox css-->
  {!!Html::style('css/msgbox/jquery.msgbox.css')!!}
  <!-- Bootstrap Core CSS -->
  {!!Html::style('css/generalcss.css')!!}  


  <!-- jQuery -->
  {!!Html::script('js/jquery.min.js')!!}
  <!-- Bootstrap Core JavaScript -->
  {!!Html::script('js/bootstrap.min.js')!!}
  <!-- Metis Menu Plugin JavaScript -->
  {!!Html::script('js/metisMenu.min.js')!!}
  <!-- Morris Charts JavaScript -->
  {!!Html::script('js/raphael-min.js')!!}
  <!-- Custom Theme JavaScript -->
  {!!Html::script('js/sb-admin-2.js')!!}
  <!-- msgbox js-->
  {!!Html::script('js/msgbox/jquery.msgbox.js')!!}

  <!--kendojs -->
  {!!Html::script('js/kendo/kendo.all.min.js')!!}
  {!!Html::script('js/kendo/cultures/kendo.culture.es-ES.min.js')!!}
  {!!Html::script('js/kendo/lang/kendo.es-ES.js')!!}


  <script type="text/javascript">
  kendo.culture("es-ES");
  </script>



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

      </head>

      <body>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 busqueda" style="padding-top: 1%">
          <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

          </div>

          <!-- Insertado del boton para buscar, optencion latitud y longitud -->
          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

            {!!Form::open(['action' => 'mainController@SucuFiltrada','class'=>'search-form'])!!}
                <div class="form-group has-feedback">
                  <label for="txtBuscar" class="sr-only">Search</label>
                  {!!Form::text('txtBuscar',null, ['id'=>'txtBuscar','class'=>'form-control', 'placeholder' => 'Buscar'])!!}
                  {!!Form::hidden('latitud',null, ['id'=>'latitud'])!!}
                  {!!Form::hidden('longitud',null, ['id'=>'longitud'])!!}
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
            {!!Form::close()!!}

          </div
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="MenuTop">
          <div class="hidden-xs hidden-sm col-md-2 col-lg-2">
          </div>
          <nav  class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <ul class="menu text-center" >
              <li><a href="#">Elemento 1</a></li>
              <li><a href="#">Elemento 2</a></li>
              <li><a href="#">Elemento 3</a></li>
              <li><a href="#">Elemento 4</a></li>
              <li><a href="#">Elemento 5</a></li>
            </ul>
          </nav>
           <div class="hidden-xs hidden-sm col-md-2 col-lg-2">
          </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 galeri">
          <div class="hidden-xs hidden-sm col-md-2 col-lg-2">
          </div>
          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 ejemplo">

          </div>
          <div class="hidden-xs hidden-sm col-md-2 col-lg-2">
          </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contenido">
          <div class="hidden-xs hidden-sm col-md-2 col-lg-2">
          </div>
          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 primaria">
             @yield('content') 
          </div>
          <div class="hidden-xs hidden-sm col-md-2 col-lg-2">
          </div>
        </div>

       


        <!-- Modal Bootstrap-->
        <div id='modalBs' class='modal fade bs-example-modal-lg'>
          <div class="modal-dialog">
            <div class="modal-content">
            </div>
          </div>
        </div>


        {!!Html::script('js/inicio.js')!!}  


        @yield('scripts')

      </body>

      </html>