 <!-- partial -->
 <div class="main-panel">
     <div class="content-wrapper">
         <div class="page-header">
             <h3 class="page-title">
                 <span class="page-title-icon bg-gradient-info text-white mr-2">
                    <i class="mdi mdi-calendar-multiple-check"></i>
                 </span>
                 List Rekap Absen
             </h3>
        </div>
        <div class="flashdata-rekap-harian" data-flashdata="<?=$this->session->flashdata('message_rekap_harian');?>"></div>
        <div class="row">
         <div class="col-md-12 grid-margin stretch-card">
             <div class="card">
                 <div class="card-body">
                     <div class="table-responsive">
                        <?php
                        if (empty($pj)): ?>
                            <div class="py-5">
                                <h4 class="text-center mb-3">
                                   Rekap Tidak Ditemukan
                                </h4>
                            </div>
                        <?php else :?>
                        
                        <?php
                        $datestring = '%d %F %Y';
                        $time = time();
                        setlocale(LC_TIME, 'id_ID');
                        $iso_hari = mdate($datestring, $time);
                        ?>
                        <?php
                        $page = isset($_GET['page']) ? intval($_GET['page']) : 0;
                        $elementsPerPage = 1;
                        $pj_sliced = array_slice($pj, $page * $elementsPerPage, $elementsPerPage);
                        foreach ($pj_sliced as $data_pj): ?>
                        <div class="form-group row mb-0 mt-2">
                            <div class="col-sm-2 offset-sm-1">
                                <label for="tanggal" class="m-0 col-form-label">Tanggal</label>
                            </div>
                            <div class="col-sm-8">
                                <input readOnly type="text" value="<?=mdate($datestring, $time)?>" class="form-control" name="tanggal" id="tanggal" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row mb-0 mt-2">
                            <div class="col-sm-2 offset-sm-1">
                                <label for="jam" class="m-0 col-form-label">Jam</label>
                            </div>
                            <?php if (substr($data_pj['ruang_rekap'], 0, 1) == "H") {
                                if ($data_pj['shift_rekap'] == "1") {
                                    $jam = "08:00 - 10:00";
                                } elseif (($data_pj['shift_rekap'] == "2")){
                                    $jam = "10:00 - 12:00";
                                } elseif (($data_pj['shift_rekap'] == "3")){
                                    $jam = "12:00 - 14:00";
                                } elseif (($data_pj['shift_rekap'] == "4")){
                                    $jam = "14:00 - 16:00";
                                } elseif (($data_pj['shift_rekap'] == "5")){
                                    $jam = "16:00 - 18:00";
                                }
                            } elseif(substr($data_pj['ruang_rekap'], 0, 1) == "E"){
                                if ($data_pj['shift_rekap'] == "1") {
                                    $jam = "07:30 - 09:30";
                                } elseif (($data_pj['shift_rekap'] == "2")){
                                    $jam = "09:30 - 11:30";
                                } elseif (($data_pj['shift_rekap'] == "3")){
                                    $jam = "11:30 - 13:30";
                                } elseif (($data_pj['shift_rekap'] == "4")){
                                    $jam = "13:30 - 15:30";
                                } elseif (($data_pj['shift_rekap'] == "5")){
                                    $jam = "15:30 - 17:30";
                                }
                            } ?>
                            <div class="col-sm-8">
                                <input readOnly type="text" value="<?=$jam?>" class="form-control" name="jam" id="jam" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row mb-0 mt-2">
                            <div class="col-sm-2 offset-sm-1">
                                <label for="materi" class="m-0 col-form-label">Materi</label>
                            </div>
                            <div class="col-sm-8">
                                <input readOnly type="text" value="<?=$data_pj['matprak_rekap']?>" class="form-control" name="materi" id="materi" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row mb-0 mt-2">
                            <div class="col-sm-2 offset-sm-1">
                                <label for="kelas" class="m-0 col-form-label">Kelas</label>
                            </div>
                            <div class="col-sm-8">
                                <input readOnly type="text" value="<?=$data_pj['kelas_rekap']?>" class="form-control" name="kelas" id="kelas" autocomplete="off">
                            </div>
                        </div>
                        <table class="table mt-4">
                            <thead class="bg-info text-white text-center">
                                 <tr>
                                    <th>
                                        Nama Asisten
                                    </th>
                                    <th>
                                        Role
                                    </th>
                                    <th>
                                        Baris
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?=$data_pj['nama_asisten_rekap']?></td>
                                    <td><?=$data_pj['role_rekap']?></td>
                                    <td></td>
                                    <td class="text-center">
                                        <form method="post" class="action_form">
                                            <button class="btn btn-sm btn-primary" type="submit" name="edit" value="<?=$data_pj['id_rekap']?>">Edit</button><br>
                                            <?php
                                            $counter_asist = 0;
                                            foreach ($asisten as $asist) {
                                                if ($asist['matprak_rekap'] == $data_pj['matprak_rekap']){
                                                    $counter_asist++;
                                                }
                                            }
                                            if ($counter_asist == 0): ?>
                                                <button class="btn btn-sm btn-danger mt-2 hapus-rekap" type="submit" name="delete" value="<?=$data_pj['id_rekap']?>">Delete</button>
                                            <?php endif ?>
                                        </form>
                                    </td>
                                </tr>
                                <?php foreach ($asisten as $asist): ?>
                                <?php if ($asist['matprak_rekap'] == $data_pj['matprak_rekap']): ?>
                                <tr>
                                    <td><?=$asist['nama_asisten_rekap']?></td>
                                    <td><?=$asist['role_rekap']?></td>
                                    <td><?=$asist['jumlah_mhs_rekap']?></td>
                                    <td class="text-center">
                                        <form method="post" class="action_form">
                                            <button class="btn btn-sm btn-primary" type="submit" name="edit" value="<?=$asist['id_rekap']?>">Edit</button><br>
                                            <button class="btn btn-sm btn-danger mt-2 hapus-rekap" type="submit" name="delete" value="<?=$asist['id_rekap']?>">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endif ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <?php if (count($pj) > 1):
                            if ($page == 1) {
                                $page = 0;
                            } else{
                                $page = $page+1;
                            }?>
                            <h6 class="mt-2 mb-5 text-center">Diruangan ini berlangsung praktikum lain.
                                <a href="?page=<?=$page?>">Klik disini untuk cek rekap praktikum lain</a>
                            </h6>
                        <?php endif ?>
                        <?php endforeach ?>
                        <?php endif ?>
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
 </div>
 <!-- main-panel ends -->   