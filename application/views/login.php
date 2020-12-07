<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Silabti - Login</title>
  <!-- jquery -->
  <script src="<?= base_url('/asset/js/jquery-3.5.1.min.js') ?>"></script>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url('asset/vendors/iconfonts/mdi/css/materialdesignicons.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('asset/vendors/css/vendor.bundle.base.css')?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url('asset/css/style.css')?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url('/asset/images/favicon.png') ?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row vw-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo text-center">
                <img src="<?= base_url('/asset/images/favicon.png') ?>">
              </div>
              <h4 class="text-center">Hello! let's get started</h4>
              <h6 class="font-weight-light text-center">Sign in to continue.</h6>
              <div class="flashdata-login" data-flashdata="<?=$this->session->flashdata('message_login');?>"></div>
              <form method="post" class="pt-3 needs-validation" novalidate>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="npm_login" name="npm_login" placeholder="NPM" required autocomplete="off" maxlength="8">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password_login" name="password_login" placeholder="Password" required autocomplete="off">
                </div>
                <div class="mt-3">
                  <button type="submit" name="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
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
  <!-- sweetalertjs -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="<?= base_url('/asset/js/myswal.js') ?>"></script>
  <!-- end sweetalertjs -->
  <script src="<?=base_url('asset/vendors/js/vendor.bundle.base.js')?>"></script>
  <script src="<?=base_url('asset/vendors/js/vendor.bundle.addons.js')?>"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?=base_url('asset/js/off-canvas.js')?>"></script>
  <script src="<?=base_url('asset/js/misc.js')?>"></script>
  <!-- endinject -->
  <!-- form validation js -->
  <script>
    (function() {
     'use strict';
     window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
   })();
 </script>
 <!-- form validation js end-->
</body>

</html>
