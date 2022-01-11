<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Digitalab-SSIE</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/chartist/chartist.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/select2/select2.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/custom_navbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/datatables/datatables.min.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php echo base_url();?>images/logo-mini.png" />
    <style>
        .navbar-brand-wrapper,.navbar-menu-wrapper{
            height: 150px!important;
        }
        .content-wrapper{
            /*top: 150px;
            position: absolute;*/
            height: 100%;
            margin-top: 150px;
        }
        .nav-logo-unam{
            margin-left: 20px;
        }
        #titulo{
                margin-left: 50px;
                width: 800px;
                font-weight: 700;
            }
        .encabezado{
                font-weight: 700;
                margin: 50px;
            }
        .main-panel{
                margin-left: 240px;
            }
        @media only screen and (max-width: 1200px){
            #titulo{
                width: 500px;
            }
        }
        @media only screen and (max-width: 1100px){
            #titulo{
                width: 400px;
            }
        }
        @media only screen and (max-width: 800px){
            #titulo{
                width: 250px;
            }
        }
        @media only screen and (max-width: 700px){
            #titulo{
                width: 200px;
                font-size: 12px;
                margin-left: 10px;
            }
            .logo-unam{
                height: 100px;
            }
            .logo-dgbsdi{
                height: 80px;
            }
            .nav-logo-unam{
                margin-left: 10px;
            }
        }
        @media only screen and (max-width: 992px){            
            .sidebar{
                position: '';
            }
            .main-panel{
                margin-left: 0px;
            }
        }
        .nav-logo-dgbsdi{
            position: absolute;
            right: 20px;
            top: 35px;
        }
        .tabla-descripcion{
            width: 100%;
            white-space: normal;
            text-align: justify;
        }
        
        @media (max-width: 500px){
            #titulo{
                width: 350px;
                font-size: 11px;
                margin-left: 10px;
                position: absolute;
                top: 90px;
                left: 120px;
            }
            .logo-unam {
                height: 80px;
            }
            .nav-logo-unam {
                margin-left: 10px;
                position: absolute;
                top: 10px;
                left: 120px;
            }
            .nav-logo-dgbsdi {
                position: absolute;
                right: 10px;
                top: 20px;
            }
            .logo-dgbsdi {
                height: 60px;
                position: absolute;
                right: 1px;
            }
            .navbar .navbar-menu-wrapper {
                width: auto;
                padding-left: 0px;
                padding-right: 15px;
            }
        }
/*        @media only screen and (max-width: 300px){
            #titulo{
                margin-left: 10px;
                font-size: 11px;
                width: 140px;
            }
        }*/
        @media (max-width: 500px){
            .navbar .navbar-brand-wrapper {
                width: 70px;
            }
        }
        #subtitulo{
            font-weight: 600;
            font-size: 15px;
        }
        .subtitulo{
            font-weight: 600;
            font-size: 15px;
        }
        .nav-item{
            padding-left: 10px!important;
        }
        .nav-item a span{
            padding-left: 10px!important;
            font-size: 12px!important;
        }
        .nav-item a{
            font-size: 12px!important;
        }
        .navbar-brand-wrapper{
            padding-left: 10px!important;
        }
        .sidebar{
            position: fixed;
        }
        @media (max-width: 490px){
            #titulo{
                width: 230px;
            }
        }
        @media (max-width: 350px){
            #titulo {
                width: 250px;
                font-size: 10px;
            }
        }
        #sidebar{
            top: 130px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="<?php echo base_url();?>">
			<!--LOGO-->
                        <img src="<?php echo base_url();?>images/logo.png" alt="logo" class="logo-dark">
			<!--<h3>Digitalab-SSIE</h3>-->
          </a>
          <a class="navbar-brand brand-logo-mini" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/logo-mini.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="icon-menu"></span>
                    </button>
                    <div class="nav-logo-unam">
                        <img class="logo-unam" src="<?php echo base_url();?>images/unam.png" height="125px">
                    </div>
                    <div id="titulo">
                        Dirección General de Bibliotecas y Servicios Digitales de Información-UNAM<br>
                        Subdirección de Servicios de Información Especializada, DGBSDI-UNAM
                    </div>
                    <div class="nav-logo-dgbsdi">
                        <img class="logo-dgbsdi" src="<?php echo base_url();?>images/dgbsdi.png" height="90px">
                    </div>
            </div>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
            </li>
            <?php if (isset($usuario)): ?>
            <li class="nav-item nav-category">
              <span class="nav-link"><?php echo $usuario ?></span>
            </li>
            <li id="li_usuario" class="nav-item">
              <a class="nav-link" href="/usuarios/cerrar_sesion">
                <span class="menu-title">Cerrar sesión</span>
                <i class="icon-power menu-icon"></i>
              </a>
            </li>
            <?php endif; ?>
            <li class="nav-item nav-category">
              <span class="nav-link">Inicio</span>
            </li>
            <li id="li_inicio" class="nav-item active">
              <a class="nav-link" href="<?php echo base_url();?>">
                <span class="menu-title">Inicio</span>
                <i class="icon-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">Gráficas</span></li>
            <li id="li_consultas" class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>consultas">
                <span class="menu-title">Consultas y Descargas</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li>
            <li id="li_consultas_total" class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>consultas/total">
                <span class="menu-title">Consultas y Descargas (Total)</span>
                <i class="icon-graph menu-icon"></i>
              </a>
            </li>
            
            <li id="li_accesos" class="nav-item">
                <a class="nav-link collapsed" data-toggle="collapse" href="#accesos_totales" aria-expanded="false" aria-controls="accesos_totales">
                    <span class="menu-title">Accesos Totales</span>
                    <i class="icon-layers menu-icon"></i>
                </a>
                <div class="collapse" id="accesos_totales">
                        <ul class="nav flex-column sub-menu">
                        <li id="accesos_servicio_tabla" class="nav-item"> <a class="nav-link" href="<?php echo base_url();?>consultas/accesos_tabla">Tabla</a></li>
                        <li id="accesos_servicio_grafica" class="nav-item"> <a class="nav-link" href="<?php echo base_url();?>consultas/accesos_grafica">Gráfica</a></li>
                    </ul>
                </div>
            </li>
            
            
          </ul>
        </nav>
        <!-- partial -->
        {$template.body}
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo base_url();?>vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?php echo base_url();?>vendors/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url();?>vendors/jquery/jquery-3.5.1.min.js"></script>
    <script src="<?php echo base_url();?>vendors/moment/moment.min.js"></script>
    <script src="<?php echo base_url();?>vendors/daterangepicker/daterangepicker.js"></script>
    <!--<script src="<?php echo base_url();?>vendors/chartist/chartist.min.js"></script>-->
    <script src="<?php echo base_url();?>vendors/highcharts/highcharts.js"></script>
    <script src="<?php echo base_url();?>vendors/highcharts/highcharts-more.js"></script>
    <!--<script src="<?php echo base_url();?>vendors/highcharts/exporting.js"></script>-->
    <!--<script src="<?php echo base_url();?>vendors/highcharts/export-data.js"></script>-->
    <!--<script src="<?php echo base_url();?>vendors/highcharts/accessibility.js"></script>-->
    <script src="<?php echo base_url();?>vendors/select2/select2.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo base_url();?>js/off-canvas.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>vendors/datatables/datatables.min.js"></script>    
    <!--<script src="<?php echo base_url();?>js/misc.js"></script>-->
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!--<script src="<?php echo base_url();?>js/dashboard.js"></script>-->
    <!-- End custom js for this page -->
    <?php if (isset($usuario)): ?>
    <script> usuario = '<?php echo $usuario?>' </script>
    <?php endif; ?>
    <script>
        {if $template.partials.utils_js}
                {$template.partials.utils_js}
        {/if}
    </script>
    <script>
        {if $template.partials.view_js}
                {$template.partials.view_js}
        {/if}
    </script>
    <!--<script src="<?php echo base_url();?>assets/js/index/grafica_sistema.js"></script>-->
  </body>
</html>