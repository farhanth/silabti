 <!-- partial -->
 <div class="main-panel">
     <div class="content-wrapper">
         <div class="page-header">
             <h3 class="page-title">
                 <span class="page-title-icon bg-gradient-info text-white mr-2">
                     <i class="mdi mdi-calendar-clock"></i>
                 </span>
                 Jadwal Asisten
             </h3>
             <?php 
             $role = $this->session->userdata('jabatan');
             if ($role == "Administrator" || $role == "AT (Editor)" || $role == "Staff"): ?>
                 <nav aria-label="breadcrumb">
                    <a href="jadwal/pengaturan">
                        <button type="button" class="btn btn-success btn-icon-text">
                            <div class="float-left mr-3">
                                Pengaturan<br>Jadwal
                            </div>
                            <div class="mt-2">
                                <i class="mdi mdi-settings btn-icon-prepend"></i>
                            </div>
                        </button>
                    </a>
                 </nav>
             <?php endif ?>
         </div>
         <div class="row">
             <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                     <div class="card-body">
                         <form id="search_jadwal" action="<?=base_url('jadwal/cari')?>" method="get">
                                <div class="input-group mb-3">
                                    <input type="text" name="keyword" id="keyword" class="form-control form-control-lg" placeholder="Input Nama / Kelas / Mata Praktikum" aria-label="keyword jadwal" aria-describedby="basic-addon2" autocomplete="off">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-sm btn-inverse-secondary" type="button">
                                            <i class="grey-text mdi mdi-magnify"></i>
                                        </button>
                                    </div>
                                </div>
                         </form>
                         <h5>Keterangan</h5>
                         <div class="">
                            <p class="mt-3 mb-0 text-justify">Untuk input berdasarkan nama, boleh menggunakan satu kata dari nama lengkap asisten.</p>
                                <ul class="m-0">
                                    <li class="ml-3"><span class="font-weight-bold">Contoh :</span> Farhan atau hidayat</li>
                                </ul>
                            <p class="mt-3 mb-0 text-justify">Untuk input berdasarkan kelas, tidak menggunakan spasi.</p>
                                <ul class="m-0">
                                    <li class="ml-3"><span class="font-weight-bold">Contoh :</span> 4IA15 atau 3ia10</li>
                                </ul>
                            <p class="mt-3 mb-0 text-justify">Untuk input berdasarkan mata praktikum, boleh menggunakan satu kata dari nama lengkap mata praktikum</p>
                                <ul class="m-0">
                                    <li class="ml-3"><span class="font-weight-bold">Contoh :</span> algoritma atau pemrograman</li>
                                </ul>
                        </div>
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

    <!-- submit enter form  -->
    <script>
        $('#search_jadwal').keydown(function (e) {
            if (e.keyCode == 13) {
                $('#search_jadwal').submit();
            }
        });

        $('#keyword').keydown(function (e) {
            if (e.keyCode == 13) {
                $('#search_jadwal').submit();
            }
        });
    </script>
    <!-- submit enter form  end-->
 </div>
 <!-- main-panel ends -->   