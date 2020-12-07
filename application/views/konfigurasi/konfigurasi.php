 <!-- partial -->
 <div class="main-panel">
     <div class="content-wrapper">
         <div class="page-header">
             <h3 class="page-title">
                 <span class="page-title-icon bg-gradient-info text-white mr-2">
                     <i class="mdi mdi-calendar-clock"></i>
                 </span>
                 Konfigurasi Website
             </h3>
         </div>
         <div class="row">
             <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                    <div class="flashdata-konfigurasi-semester" data-flashdata="<?=$this->session->flashdata('message_konfig_semester');?>"></div>
                    <div class="flashdata-konfigurasi-at" data-flashdata="<?=$this->session->flashdata('message_konfig_at');?>"></div>
                    <div class="flashdata-konfigurasi-jadwalDrop" data-flashdata="<?=$this->session->flashdata('message_konfig_jadwalDrop');?>"></div>
                    <div class="flashdata-konfigurasi-logDrop" data-flashdata="<?=$this->session->flashdata('message_konfig_logDrop');?>"></div>
                     <div class="card-body">
                        <h3 class="page-title mb-3">Konfigurasi Semester</h3>
                        <p class="mb-4 text-justify">Konfigurasi ini untuk mengatur semester yang sedang berlangsung saat ini. Untuk informasi semester bisa dilihat di website <a href="https://baak.gunadarma.ac.id/">BAAK Gunadarma</a>. <span class="font-weight-bold">Lakukan perubahan konfigurasi ini setiap pergantian semester.</span></p>
                        <form action="<?=base_url('konfigurasi_web/submit_konfig_semester')?>" method="post" class="forms-sample needs-validation" novalidate>
                            <div class="form-group">
                              <label for="semester">Semester</label>
                              <select class="grey-text form-control form-control-lg" id="semester" name="semester" required>
                                <option <?php if($semester['semester'] === "PTA"){?>selected="selected"<?php } ?> value="PTA">PTA (Ganjil)</option>
                                <option <?php if($semester['semester'] === "ATA"){?>selected="selected"<?php } ?> value="ATA">ATA (Genap)</option>
                              </select>
                              <div class="valid-feedback">

                              </div>
                              <div class="invalid-feedback">
                                  Semester harus diisi.
                              </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="tahun_awal">Tahun Mulai</label>
                                    <input type="text" value="<?=$semester['tahun_awal']?>" onkeypress="return onlyNumberKey(event)" class="form-control" name="tahun_awal" id="tahun_awal" required maxlength="4" autocomplete="off" >
                                    <small id="no_tlp_format" class="form-text text-muted">
                                        Contoh : 2019
                                    </small>
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        Tahun mulai belum diisi.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tahun_akhir">Tahun Selesai</label>
                                    <input type="text" value="<?=$semester['tahun_akhir']?>" onkeypress="return onlyNumberKey(event)" class="form-control" name="tahun_akhir" id="tahun_akhir" required maxlength="4" autocomplete="off">
                                    <small id="no_tlp_format" class="form-text text-muted">
                                        Contoh : 2020
                                    </small>
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        Tahun selesai belum diisi.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <small id="no_tlp_format" class="form-text text-muted">
                                        Maka akan menjadi 2019/2020
                                    </small>
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
                        <h3 class="page-title mb-3">Konfigurasi Role Asisten Tetap</h3>
                        <p class="mb-4 text-justify">Konfigurasi ini untuk mengatur role asisten tetap agar bisa mengatur (menambah, mengedit dan menghapus) data asisten dan data jadwal. <span class="font-weight-bold">Aktifkan konfigurasi ini setiap pergantian semester agar AT dapat saling membantu untuk menambah jadwal tugas asisten yang baru.</span></p>
                        <form action="<?=base_url('konfigurasi_web/submit_konfig_at')?>" method="post" class="forms-sample needs-validation" novalidate>
                            <div class="form-group">
                              <select class="grey-text form-control form-control-lg" id="at_editor" name="at_editor" required>
                                <option <?php if(!empty($at)){?>selected="selected"<?php } ?> value="Aktif">Aktif</option>
                                <option <?php if(empty($at)){?>selected="selected"<?php } ?> value="Tidak Aktif">Tidak Aktif</option>
                              </select>
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
                        <h3 class="page-title mb-3">Log Aktifitas Website</h3>
                        <p class="mb-4 text-justify">Fitur ini berguna untuk melihat catatan aktifitas dari penggunaan website ini. Misalnya catatan login, catatan menambah jadwal, rekap absen dan lain lain.</p>
                        <div class="float-right">
                            <a href="<?=base_url('konfigurasi_web/log')?>">
                                <button type="button" class="btn btn-gradient-primary mr-2">Lihat Log</button>
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
                        <h3 class="page-title mb-3">Reset Jadwal Asisten</h3>
                        <p class="mb-4 text-justify">Fitur ini berguna untuk menghapus seluruh jadwal tugas asisten yang ada agar memudahkan pergantian data setiap semesternya. <span class="font-weight-bold">PENTING : Reset jadwal asisten akan menghapus seluruh data jadwal asisten yang ada! Data yang sudah dihapus tidak bisa dikembalikan! Gunakan fitur ini hanya sekali setiap pergantian semester!</span></p>
                        <form action="<?=base_url('konfigurasi_web/jadwalDrop')?>" method="post" class="forms-sample needs-validation" id="jadwalDropForm" novalidate>
                            <div class="float-right">
                                <button type="submit" class="jadwalDrop btn btn-danger mr-2">Reset Jadwal</button>
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
                        <h3 class="page-title mb-3">Reset Log Aktifitas</h3>
                        <p class="mb-4 text-justify">Fitur ini berguna untuk menghapus seluruh data log aktifitas pada website. <span class="font-weight-bold">PENTING : Gunakan fitur ini bila dirasa website atau server sudah mulai berat. Fitur ini hanya boleh digunakan atas pertujuan staff terlebih dahulu!</span></p>
                        <form action="<?=base_url('konfigurasi_web/logDrop')?>" method="post" class="forms-sample needs-validation" id="logDropForm" novalidate>
                            <div class="float-right">
                                <button type="submit" class="logDrop btn btn-danger mr-2">Reset Log</button>
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