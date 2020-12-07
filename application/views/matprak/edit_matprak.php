<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-info text-white mr-2">
                    <i class="mdi mdi mdi-account"></i>
                </span>
                Edit Mata Praktikum
            </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="flashdata-matprak-edit" data-flashdata="<?=$this->session->flashdata('message_matprak');?>"></div>
                        <form action="<?=base_url('matprak/submit_edit')?>" method="post" class="forms-sample needs-validation" novalidate>
                            <input type="hidden" value="<?=$matprak['id_matprak'];?>" name="id_matprak" id="id_matprak">
                            <div class="form-group">
                              <label for="matprak">Mata Praktikum</label>
                              <input type="text"  value="<?=$matprak['matprak']?>" class="form-control form-control-lg" id="matprak" name="matprak" maxlength="48" autocomplete="off" required>
                              <small id="no_tlp_format" class="form-text text-muted">
                                  Contoh : Interaksi Manusia dan Komputer
                              </small>
                              <div class="valid-feedback">

                              </div>
                              <div class="invalid-feedback">
                                  Mata Praktikum harus diisi.
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="matprak_singkat">Mata Praktikum (Singkat)</label>
                              <input type="text" value="<?=$matprak['matprak_singkat']?>" class="form-control form-control-lg" id="matprak_singkat" name="matprak_singkat" maxlength="8" autocomplete="off" required>
                              <small id="no_tlp_format" class="form-text text-muted">
                                  Contoh : IMK
                              </small>
                              <div class="valid-feedback">

                              </div>
                              <div class="invalid-feedback">
                                  Mata Praktikum (Singkat) harus diisi.
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="semester">Semester</label>
                              <select class="grey-text form-control form-control-lg" id="semester" name="semester" required>
                                <option value="">--PILIH SEMESTER--</option>
                                <option <?php if($matprak['semester']==="PTA"){ echo "selected=selected";}?> value="PTA">PTA (Ganjil)</option>
                                <option <?php if($matprak['semester']==="ATA"){ echo "selected=selected";}?> value="ATA">ATA (Genap)</option>
                              </select>
                              <div class="valid-feedback">

                              </div>
                              <div class="invalid-feedback">
                                  Semester harus diisi.
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="tingkat">Tingkat</label>
                              <select class="grey-text form-control form-control-lg" id="tingkat" name="tingkat" required>
                                <option value="">--PILIH Tingkat--</option>
                                <option <?php if($matprak['tingkat']==="1"){ echo "selected=selected";}?> value="1">1</option>
                                <option <?php if($matprak['tingkat']==="2"){ echo "selected=selected";}?> value="2">2</option>
                                <option <?php if($matprak['tingkat']==="3"){ echo "selected=selected";}?> value="3">3</option>
                                <option <?php if($matprak['tingkat']==="4"){ echo "selected=selected";}?> value="4">4</option>
                              </select>
                              <div class="valid-feedback">

                              </div>
                              <div class="invalid-feedback">
                                  Semester harus diisi.
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="periode">Periode</label>
                              <input type="text" value="<?=$matprak['periode']?>" onkeypress="return onlyNumberKey(event)" class="form-control form-control-lg" id="periode" name="periode" maxlength="1" autocomplete="off">
                              <small id="no_tlp_format" class="form-text text-muted">
                                  Isi dengan angka. Contoh : 1
                              </small>
                              <div class="valid-feedback">

                              </div>
                              <div class="invalid-feedback">
                                  Format periode salah.
                              </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-xs-9 col-sm-9 col-md-11 col-lg-11">
                                  <label for="tanggal_mulai">Tanggal Mulai</label>
                                  <input type="date" value="<?=$matprak['tanggal_mulai']?>" class="form-control form-control-lg datepicker_matprak" id="tanggal_mulai" name="tanggal_mulai" data-date="" data-date-format="dd/mm/yyyy">
                                  <div class="valid-feedback">

                                  </div>
                                  <div class="invalid-feedback">
                                      Format tanggal mulai salah.
                                  </div>
                                </div>
                                <div class="form-group col-xs-3 col-sm-3 col-md-1 col-lg-1 mt-4">
                                    <button onclick="clearTglMulai()" type="button" class="btn btn-sm btn-danger">Clear</button>
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="berlangsung">Sedang berlangsung</label>
                              <select class="grey-text form-control form-control-lg" id="berlangsung" name="berlangsung">
                                <option value="">Belum Ditentukan</option>
                                <option <?php if($matprak['berlangsung']==="Iya"){ echo "selected=selected";}?> value="Iya">Iya</option>
                                <option <?php if($matprak['berlangsung']==="Tidak"){ echo "selected=selected";}?>value="Tidak">Tidak</option>
                              </select>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-gradient-primary mr-2">Edit</button>
                                <a href="<?=base_url('matprak')?>"><button type="button" class="btn btn-light">Cancel</button></a>
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

<!-- js clear tanggal mulai -->
<script>
    function clearTglMulai(){
        $(".datepicker_matprak").val("");
    }
</script>
<!-- js clear tanggal mulai end-->