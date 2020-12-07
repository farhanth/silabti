 <!-- partial -->
 <div class="main-panel">
     <div class="content-wrapper">
         <div class="page-header">
             <h3 class="page-title">
                 <span class="page-title-icon bg-gradient-info text-white mr-2">
                    <i class="mdi mdi-calendar-multiple-check"></i>
                 </span>
                 Laporan Rekap Absen (Lab. Menengah dan Lab. Lanjut)
             </h3>
        </div>
        <div class="row">
         <div class="col-md-12 grid-margin stretch-card">
             <div class="card">
                 <div class="card-body">
                     <form target="_blank" method="post" class="needs-validation" novalidate>
                        <input type="hidden" name="page[]" value="Menengah">
                        <input type="hidden" name="page[]" value="Lanjut">
                        <div class="form-group">
                            <label for="rekap_min">Tampilkan Data Tanggal :</label>
                            <input type="text" class="form-control" id="rekap_min" name="rekap_min" placeholder="Masukan Tanggal" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Anda belum memilih tanggal
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="rekap_max">Sampai Tanggal :</label>
                            <input type="text" class="form-control" id="rekap_max" name="rekap_max" placeholder="Masukan Tanggal" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Anda belum memilih tanggal
                            </div>
                        </div>
                        <div class="float-right">
                            <button type="submit" formaction="<?=base_url('laporan_rekap/mingguan');?>" class="btn btn-gradient-primary submit-periode mr-2">Lihat Rekap Mingguan</button>
                            <button type="submit" formaction="<?=base_url('laporan_rekap/total');?>" class="btn btn-gradient-primary submit-total mr-2">Lihat Rekap Total</button>
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

  <!-- js laporan rekap -->
  <script>
    $(document).ready(function() {
        $('#rekap_min').datepicker();
        $('#rekap_max').datepicker();
    });
  </script>
  <!-- js laporan rekap end-->