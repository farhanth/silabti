 <!-- partial -->
 <div class="main-panel">
     <div class="content-wrapper">
         <div class="page-header">
             <h3 class="page-title">
                 <span class="page-title-icon bg-gradient-info text-white mr-2">
                     <i class="mdi mdi-credit-card-multiple"></i>
                 </span>
                 Konfigurasi Rekap
             </h3>
         </div>
         <div class="flashdata-konfigurasi-variabel-mhs" data-flashdata="<?=$this->session->flashdata('message_konfig_variabel-mhs');?>"></div>
         <div class="flashdata-konfigurasi-konstanta-mhs" data-flashdata="<?=$this->session->flashdata('message_konfig_konstanta-mhs');?>"></div>
         <div class="row">
             <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                     <div class="card-body">
                        <h3 class="page-title mb-3">Honor Per Jam</h3>
                        <p class="mb-4 text-justify">Fitur ini berguna untuk melihat dan mengubah nilai gaji per jam dari jadwal PJ maupun Asisten dalam Lab. Dasar, Lab. Menengah dan Lab. Lanjut</p>
                        <div class="float-right">
                            <a href="<?=base_url('konfigurasi_rekap/gaji')?>">
                                <button type="button" class="btn btn-gradient-primary mr-2">Konfigurasi Honor</button>
                            </a>
                        </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                     <div class="card-body">
                        <h3 class="page-title mb-3">Konfigurasi Variabel Jumlah Mahasiswa</h3>
                        <p class="mb-4 text-justify">Variabel ini merupakan variabel pembagi jumlah mahasiswa saat asisten bertugas di ruangan.</p>
                        <form action="<?=base_url('konfigurasi_rekap/submit_edit_variabel_mhs')?>" method="post" class="forms-sample needs-validation" novalidate>
                            <div class="form-group">
                                <div class="form-group">
                                  <label for="variabel_mhs">Variabel Jumlah Mahasiswa</label>
                                  <input type="text" value="<?=$variabel_mhs['variabel_mhs']?>" onkeypress="return onlyNumberKey(event)" class="form-control form-control-lg" id="variabel_mhs" name="variabel_mhs" maxlength="2" autocomplete="off">
                                  <small class="form-text text-muted">
                                        Bila ingin merubah nilai pastikan konstanta jumlah mahasiswa tidak aktif
                                  </small>
                                  <div class="valid-feedback">

                                  </div>
                                  <div class="invalid-feedback">
                                      Variabel Mahasiswa harus diisi.
                                  </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-gradient-primary mr-2">Simpan Perubahan</button>
                            </div>
                        </form>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                     <div class="card-body">
                        <h3 class="page-title mb-3">Aktifkan Konstanta Jumlah Mahasiswa</h3>
                        <p class="mb-4 text-justify">Konfigurasi ini berguna untuk mengaktifkan/non-aktifkan nilai konstanta serta menetapkan nilai konstanta. <span class="font-weight-bold">Bila konfigurasi ini aktif, maka nilai variabel pembagi jumlah mahasiswa tidak berlaku dan hasil bagi langsung digantikan oleh nilai konstanta ini.</span></p>
                        <form action="<?=base_url('konfigurasi_rekap/submit_edit_konstanta_mhs')?>" method="post" class="forms-sample needs-validation" novalidate>
                            <div class="form-group">
                              <select class="grey-text form-control form-control-lg" id="konfigurasi_konstanta_mhs" name="konfigurasi_konstanta_mhs" required>
                                <option <?php if($konstanta_mhs['konfigurasi_konstanta_mhs'] == "Aktif"){?>selected="selected"<?php } ?> value="Aktif" data-value="Aktif">Aktif</option>
                                <option <?php if($konstanta_mhs['konfigurasi_konstanta_mhs'] == "Tidak Aktif"){?>selected="selected"<?php } ?> value="Tidak Aktif" data-value="Tidak Aktif">Tidak Aktif</option>
                              </select>
                            </div>
                            <div class="form-group">
                                  <label for="konstanta_mhs">Nilai Konstanta</label>
                                  <input type="text" value="<?=$konstanta_mhs['konstanta_mhs']?>" onkeypress="return onlyNumberKey(event)" class="form-control form-control-lg" id="konstanta_mhs" name="konstanta_mhs" maxlength="2" autocomplete="off">
                                  <small class="form-text text-muted">
                                        Bila ingin merubah nilai pastikan konstanta jumlah mahasiswa aktif
                                  </small>
                                  <div class="valid-feedback">

                                  </div>
                                  <div class="invalid-feedback">
                                      Konstanta Variabel Mahasiswa harus diisi.
                                  </div>
                                </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-gradient-primary mr-2">Simpan Perubahan</button>
                            </div>
                        </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <footer class="footer">
         <div class="d-sm-flex justify-content-center text-center">
             <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright &copy;<script>
                 document.write(new Date().getFullYear());
             </script> All rights reserved</span>
         </div>
     </footer>
     <!-- partial -->
 </div>
 <!-- main-panel ends -->


 <script>
    $(document).ready(function () {
        var value = $('#konfigurasi_konstanta_mhs').val();
        if (value == "Aktif") {
            $('#konstanta_mhs').attr('readonly', false);
            $('#variabel_mhs').attr('readonly', true);
        } else{
            $('#konstanta_mhs').attr('readonly', true);
            $('#variabel_mhs').attr('readonly', false);
        }
    });
    $('#konfigurasi_konstanta_mhs').change(function(){
        var value = $(this).val();
        if (value == "Aktif") {
            $('#konstanta_mhs').attr('readonly', false);
            $('#variabel_mhs').attr('readonly', true);
        } else{
            $('#konstanta_mhs').attr('readonly', true);
            $('#variabel_mhs').attr('readonly', false);
        }
    });
 </script>