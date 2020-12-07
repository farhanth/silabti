<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Silabti - Ganti Password</title>
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
          <div class="col-lg-5 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="alert alert-warning" role="alert">
                <h5 class="text-center mb-3">Anda harus mengganti password terlebih dahulu.</h6>
                <h6 class="font-weight-light text-center">Pastikan data anda semuanya benar</h6>
                <h6 class="font-weight-light text-center">Bila ada data yang salah silahkan hubungi Asisten</h6>
              </div>
              <dl class="row mx-auto">
                  <dt class="col-sm-3 mb-2">Username (NPM) </dt>
                  <dd class="col-sm-9"><?=$profil['npm']?></dd>
                  <dd class="col-sm-12"></dd>

                  <dt class="col-sm-3 mb-2">Nama </dt>
                  <dd class="col-sm-9"><?=$profil['nama_lengkap']?></dd>
                  <dd class="col-sm-12"></dd>

                  <?php if ($profil['kelas'] != ""): ?>
                    <dt class="col-sm-3 mb-2">Kelas </dt>
                    <dd class="col-sm-9"><?=$profil['kelas']?></dd>
                    <dd class="col-sm-12"></dd>
                  <?php endif ?>

                  <?php if ($profil['jk'] != ""): ?>
                    <dt class="col-sm-3 mb-2">Jenis Kelamin </dt>
                    <dd class="col-sm-9"><?=$profil['jk']?></dd>
                    <dd class="col-sm-12"></dd>
                  <?php endif ?>

                  <?php if ($profil['no_tlp'] != ""):
                    $no_tlp = $this->encryption->decrypt($profil['no_tlp']);?>
                    <dt class="col-sm-3 mb-2">No. Telepon </dt>
                    <dd class="col-sm-9"><?=$no_tlp?><br><span class="text-danger">Pastikan tersambung dengan WhatsApp</span></dd>
                    <dd class="col-sm-12"></dd>
                  <?php endif ?>

                  <?php if ($profil['no_rek'] != ""): 
                    $no_rek = $this->encryption->decrypt($profil['no_rek']);?>
                    <dt class="col-sm-3 mb-2">No. Rekening</span></dt>
                    <dd class="col-sm-9"><?=$no_rek?><br><span class="text-danger">Pastikan benar dan sesuai dengan buku tabungan Bank DKI</dd>
                  <?php endif ?>
              </dl>
              <form method="post" class="pt-3 needs-validation" novalidate>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password_baru" name="password_baru" placeholder="Password Baru" required autocomplete="off">
                </div>
                <div class="mt-3">
                  <button type="submit" name="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">GANTI PASSWORD</button>
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
  <!-- sweetalertjs -->
  <script src="<?= base_url('/vendor/sweetalert2-9.17.1/package/dist/sweetalert2.all.min.js') ?>"></script>
  <script src="<?= base_url('/asset/js/myswal.js') ?>"></script>
  <!-- end sweetalertjs -->
  <!-- plugins:js -->
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
