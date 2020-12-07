 <!-- partial -->
 <div class="main-panel">
     <div class="content-wrapper">
         <div class="page-header">
             <h3 class="page-title">
                 <span class="page-title-icon bg-gradient-info text-white mr-2">
                     <i class="mdi mdi-calendar-plus"></i>
                 </span>
                 Pengaturan Jadwal
             </h3>
             <?php 
             $role = $this->session->userdata('jabatan');
             if ($role == "Administrator" || $role == "AT (Editor)"): ?>
                 <nav aria-label="breadcrumb">
                    <a href="<?=base_url('jadwal/tambah')?>">
                        <button type="button" class="btn btn-success btn-icon-text">
                            <div class="float-left mr-3">
                                Tambah<br>Jadwal
                            </div>
                            <div class="mt-2">
                                <i class="mdi mdi mdi-plus btn-icon-prepend"></i>
                            </div>
                        </button>
                    </a>
                 </nav>
             <?php endif ?>
         </div>
         <div class="flashdata-jadwal-list" data-flashdata="<?=$this->session->flashdata('message_jadwal');?>"></div>
         <div class="row">
             <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                     <div class="card-body">
                         <form>
                             <div class="form-group row mb-3 justify-content-between">
                                <div class="col-sm-2">
                                    <label for="ruang" class="m-0 col-form-label">Jadwal Ruang : </label>
                                </div>
                                <div class="col-sm-10">
                                    <select class="grey-text form-control" name="ruang" id="ruang" required>
                                        <option <?php if($this->uri->segment(3) == NULL){?>selected="selected"<?php } ?> value="">Semua Ruangan</option>
                                        <?php foreach ($ruang_opt as $ruang): ?>
                                            <option <?php if($this->uri->segment(3) === $ruang['ruang']){?>selected="selected"<?php } ?> value="<?=$ruang['ruang']?>"><?=$ruang['ruang']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                         </form>
                         <div class="table-responsive">
                         <table class="table table-hover" id="dataTable_jadwal">
                             <thead>
                                 <tr>
                                    <th class="no-sort text-center">
                                        No.
                                     </th>
                                     <th>
                                        Hari
                                     </th>
                                     <th>
                                        Jam
                                     </th>
                                     <th>
                                        Mata Praktikum
                                     </th>
                                     <th>
                                         Bertugas Sebagai
                                     </th>
                                     <th>
                                        Kelas
                                     </th>
                                     <th>
                                        Ruang
                                     </th>
                                     <th>
                                        Nama Asisten
                                     </th>
                                     <?php if ($role == "Administrator" || $role == "AT (Editor)"): ?>
                                        <th class="no-sort">
                                        </th>
                                     <?php endif ?>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php foreach ($jadwal as $data): ?>
                                    <tr>
                                        <td></td>
                                        <td><?=$data['hari']?></td>
                                        <td>
                                            <?php if (substr($data['ruang'], 0, 1) == "H") {
                                                if ($data['shift'] == "1") {
                                                    echo "08:00 - 10:00";
                                                } elseif (($data['shift'] == "2")){
                                                    echo "10:00 - 12:00";
                                                } elseif (($data['shift'] == "3")){
                                                    echo "12:00 - 14:00";
                                                } elseif (($data['shift'] == "4")){
                                                    echo "14:00 - 16:00";
                                                } elseif (($data['shift'] == "5")){
                                                    echo "16:00 - 18:00";
                                                }
                                            } elseif(substr($data['ruang'], 0, 1) == "E"){
                                                if ($data['shift'] == "1") {
                                                    echo "07:30 - 09:30";
                                                } elseif (($data['shift'] == "2")){
                                                    echo "09:30 - 11:30";
                                                } elseif (($data['shift'] == "3")){
                                                    echo "11:30 - 13:30";
                                                } elseif (($data['shift'] == "4")){
                                                    echo "13:30 - 15:30";
                                                } elseif (($data['shift'] == "5")){
                                                    echo "15:30 - 17:30";
                                                }
                                            } ?>
                                        </td>
                                        <td><?=$data['matprak']." (".$data['matprak_singkat'].")"?></td>
                                        <td>
                                            <?php if ($data['role'] == "PJ"){
                                                echo "Penanggung Jawab";
                                            }else{
                                                echo $data['role'];
                                            }?>
                                        </td>
                                        <td><?=$data['kelas_jadwal']?></td>
                                        <td><?=$data['ruang']?></td>
                                        <td><?=$data['nama_lengkap']?></td>
                                        <?php if ($role == "Administrator" || $role == "AT (Editor)"): ?>
                                            <td class="text-center">
                                                <a class="edit-jadwal" href="<?=base_url('jadwal/edit/'.$data['id_jadwal'])?>">
                                                  <button type="button" class="btn btn-sm btn-primary">Edit</button><br>
                                                </a>
                                                <a class="hapus-jadwal" href="<?=base_url('jadwal/delete/'.$data['id_jadwal'])?>">
                                                  <button type="button" class="mt-2 btn btn-sm btn-danger">Delete</button>
                                                </a>
                                            </td>
                                        <?php endif ?>
                                    </tr>
                                 <?php endforeach ?>
                            </tbody>
                         </table>
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

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    
    $("#ruang").change(function(){
        var opt = $(this).val();
        var url = "<?=base_url('jadwal/pengaturan')?>";
        if (opt == "") {
            window.location.href = url;
        } else{
            window.location.href = url+'/'+opt;
        }
    });
</script>