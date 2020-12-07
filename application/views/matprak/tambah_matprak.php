<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-info text-white mr-2">
                    <i class="mdi mdi mdi-account"></i>
                </span>
                Tambah Mata Praktikum
            </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="flashdata-matprak-add" data-flashdata="<?=$this->session->flashdata('message_matprak');?>"></div>
                        <form action="<?=base_url('matprak/submit')?>" method="post" class="forms-sample needs-validation" novalidate>
                            <div class="form-group">
                              <label for="matprak">Mata Praktikum</label>
                              <input type="text" class="form-control form-control-lg" id="matprak" name="matprak" maxlength="48" autocomplete="off" required>
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
                              <input type="text" class="form-control form-control-lg" id="matprak_singkat" name="matprak_singkat" maxlength="8" autocomplete="off" required>
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
                                <option value="PTA">PTA (Ganjil)</option>
                                <option value="ATA">ATA (Genap)</option>
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
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                              </select>
                              <div class="valid-feedback">

                              </div>
                              <div class="invalid-feedback">
                                  Semester harus diisi.
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="periode">Periode</label>
                              <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control form-control-lg" id="periode" name="periode" maxlength="1" autocomplete="off">
                              <small id="no_tlp_format" class="form-text text-muted">
                                  Isi dengan angka. Contoh : 1
                              </small>
                              <div class="valid-feedback">

                              </div>
                              <div class="invalid-feedback">
                                  Format periode salah.
                              </div>
                            </div>
                            <div class="form-group">
                                  <label for="tanggal_mulai">Tanggal Mulai</label>
                                  <input type="date" class="form-control form-control-lg datepicker_matprak" id="tanggal_mulai" name="tanggal_mulai" data-date="" data-date-format="dd/mm/yyyy">
                                  <div class="valid-feedback">

                                  </div>
                                  <div class="invalid-feedback">
                                      Format tanggal mulai salah.
                                  </div>
                            </div>
                            <div class="form-group">
                              <label for="berlangsung">Sedang berlangsung</label>
                              <select class="grey-text form-control form-control-lg" id="berlangsung" name="berlangsung">
                                <option value="">Belum Ditentukan</option>
                                <option value="Iya">Iya</option>
                                <option value="Tidak">Tidak</option>
                              </select>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-gradient-primary mr-2">Tambah</button>
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