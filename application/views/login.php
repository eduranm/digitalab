<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Stellar Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php echo base_url();?>images/logo-mini.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                    <center><img src="<?php echo base_url();?>images/logo.png"></center>
                </div>
                  <center><h4>Bienvenido</h4></center><br>
                <h6 class="font-weight-light">Inicia sesión para continuar</h6>
                
                <form id="form" method="post" action="<?php echo base_url() ?>usuarios/iniciar_sesion_post" class="pt-3">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="usuario" placeholder="Usuario">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="contrasena" name="contrasena" placeholder="Password">
                  </div>
                    <h6 class="font-weight-light" style="color:red"><?php echo $error?></h6>
                  <div class="mt-3">
                      <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Iniciar Sesión">
                  </div>
<!--                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>-->
<!--                  <div class="mb-2">
                    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="icon-social-facebook mr-2"></i>Connect using facebook </button>
                  </div>-->
                  <!--<div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.html" class="text-primary">Create</a>-->
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo base_url();?>vendors/js/vendor.bundle.base.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>vendors/md5/jquery.md5.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo base_url();?>js/off-canvas.js"></script>
    <script src="<?php echo base_url();?>js/misc.js"></script>
    <script>
        $('#form').submit(function(){
            $('#contrasena').val($.md5($('#contrasena').val()));
            return true;
        });
    </script>
    <!-- endinject -->
  </body>
</html>