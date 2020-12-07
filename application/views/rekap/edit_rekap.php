 <!-- partial -->
 <div class="main-panel">
     <div class="content-wrapper">
         <div class="row">
             <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                    <div class="card-body">
                         <h4 class="mb-5">Edit Rekap</h4>
                         <form action="<?=base_url('list_rekap/submit_edit_rekap')?>" method="post" class="forms-sample needs-validation" novalidate>
                            <input type="hidden" name="id_rekap" value="<?=$absen['id_rekap']?>">
                            <input type="hidden" name="ruang" value="<?=$absen['ruang_rekap']?>">
                            <input type="hidden" name="shift" value="<?=$absen['shift_rekap']?>">
                            <input type="hidden" name="redirect" value="<?=$this->agent->referrer()?>">
                            <div class="form-group">
                              <label for="gaji_perjam">Nama Asisten</label>
                              <select class="" name="asisten" id="asisten" required>
                                  <option value="">--Pilih Asisten--</option>
                                  <?php foreach ($asisten_opt as $asisten): ?>
                                      <option <?php if($absen['nama_asisten_rekap'] === $asisten['nama_lengkap']){?>selected="selected"<?php } ?> value="<?=$asisten['nama_lengkap']?>"><?=$asisten['nama_lengkap']?></option>
                                  <?php endforeach ?>
                              </select>
                              <div class="valid-feedback">

                              </div>
                              <div class="invalid-feedback">
                                  Nama Asisten harus diisi.
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="variabel1">Role</label>
                              <select class="grey-text form-control form-control-lg" name="role" id="role" required>
                                  <option value="">--Pilih Role--</option>
                                  <option <?php if($absen['role_rekap'] === "PJ"){?>selected="selected"<?php } ?> value="PJ">Penanggung Jawab</option>
                                  <option <?php if($absen['role_rekap'] === "Asisten"){?>selected="selected"<?php } ?> value="Asisten">Asisten</option>
                              </select>
                              <div class="valid-feedback">

                              </div>
                              <div class="invalid-feedback">
                                  Role harus diisi.
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="variabel2">Baris</label>
                              <input type="text" value="<?=$absen['jumlah_mhs_rekap']?>" onkeypress="return onlyNumberKey(event)" class="form-control form-control-lg" name="baris_asisten" id="baris_asisten" maxlength="3" autocomplete="off">
                            </div>
                            <?php
                            $role = $this->session->userdata('jabatan');
                            if ($role == "Staff"): ?>
                                <div class="form-group">
                                  <label for="variabel_mhs">Variabel Mahasiswa</label>
                                  <input type="text" value="<?=$absen['variabel_mhs_rekap']?>" onkeypress="return onlyNumberKey(event)" class="form-control form-control-lg" name="variabel_mhs" id="variabel_mhs" maxlength="3" autocomplete="off">
                                </div>
                                <div class="form-group">
                                  <label for="nilai_rekap">Nilai Rekap</label>
                                  <input type="text" value="<?=$absen['nilai_rekap']?>" onkeypress="return onlyNumberKey(event)" class="form-control form-control-lg" name="nilai_rekap" id="nilai_rekap" maxlength="3" autocomplete="off">
                                </div>
                            <?php endif ?>
                            <div class="float-right">
                                <button type="submit" class="btn btn-gradient-primary mr-2">Edit</button>
                                <a href="<?=base_url('list_rekap/rekap/'.$absen['ruang_rekap'].'/'.$absen['shift_rekap'])?>"><button type="button" class="btn btn-light">Cancel</button></a>
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

 <!-- js selectize edit rekap -->
  <script type="text/javascript">
      $(document).ready(function () {
          $('#asisten').selectize();
      });
  </script>
  <!-- js selectize edit rekap end-->