 <!-- partial -->
 <div class="main-panel">
     <div class="content-wrapper">
         <div class="row">
             <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                    <div class="card-body">
                         <h4 class="mb-5">Edit Gaji Per Jam</h4>
                         <form action="<?=base_url('konfigurasi_rekap/submit_edit_gaji')?>" method="post" class="forms-sample needs-validation" novalidate>
                            <input type="hidden" name="id_gaji_perjam" value="<?=$gaji['id_gaji_perjam']?>">
                            <div class="form-group">
                              <label for="gaji_perjam">Gaji Per Jam</label>
                              <input type="text" value="<?=$gaji['gaji_perjam']?>" onkeypress="return onlyNumberKey(event)" class="form-control form-control-lg" id="gaji_perjam" name="gaji_perjam" maxlength="6" autocomplete="off">
                              <div class="valid-feedback">

                              </div>
                              <div class="invalid-feedback">
                                  Gaji Per Jam harus diisi.
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="variabel1">Nilai Variabel 1</label>
                              <input type="number" class="form-control form-control-lg" id="variabel1" name="variabel1" value="<?=$gaji['variabel1']?>" step=any>
                              <div class="valid-feedback">

                              </div>
                              <div class="invalid-feedback">
                                  Nilai Variabel 1 harus diisi.
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="variabel2">Nilai Variabel 2</label>
                              <input type="number" class="form-control form-control-lg" id="variabel2" name="variabel2" value="<?=$gaji['variabel2']?>" step=any>
                              <div class="valid-feedback">

                              </div>
                              <div class="invalid-feedback">
                                  Nilai Variabel 2 harus diisi.
                              </div>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-gradient-primary mr-2">Edit</button>
                                <a href="<?=base_url('konfigurasi_rekap/gaji')?>"><button type="button" class="btn btn-light">Cancel</button></a>
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