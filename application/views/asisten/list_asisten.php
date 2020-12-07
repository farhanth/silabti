 <!-- partial -->
 <div class="main-panel">
     <div class="content-wrapper">
         <div class="page-header">
             <h3 class="page-title">
                 <span class="page-title-icon bg-gradient-info text-white mr-2">
                    <i class="mdi mdi-account"></i>
                 </span>
                 List Asisten Aktif
             </h3>
             <?php 
             $role = $this->session->userdata('jabatan');
             if ($role == "Administrator" || $role == "AT (Editor)"): ?>
                 <nav aria-label="breadcrumb">
                    <a href="<?=base_url('asisten/tambah')?>">
                        <button type="button" class="btn btn-success btn-icon-text">
                            <div class="float-left mr-3">
                                Tambah<br>Asisten
                            </div>
                            <div class="mt-2">
                                <i class="mdi mdi mdi-plus btn-icon-prepend"></i>
                            </div>
                        </button>
                    </a>
                 </nav>
             <?php endif ?>
        </div>
        <div class="flashdata-asisten-list" data-flashdata="<?=$this->session->flashdata('message_asisten');?>"></div>
        <div class="row">
         <div class="col-md-12 grid-margin stretch-card">
             <div class="card">
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-hover" id="dataTable_asisten">
                             <thead>
                                 <tr>
                                    <th class="no-sort">
                                        No.
                                     </th>
                                     <th>
                                        Nama Lengkap
                                     </th>
                                     <th>
                                        NPM
                                     </th>
                                     <th>
                                        Jenis Kelamin
                                     </th>
                                     <th>
                                        Kelas
                                     </th>
                                     <th>
                                        No. Tlp
                                     </th>
                                     <th>
                                        Jabatan
                                     </th>
                                     <th>
                                        Terakhir Login
                                     </th>
                                     <?php if ($role == "Administrator" || $role == "AT (Editor)"): ?>
                                        <th class="no-sort">
                                        </th>
                                     <?php endif ?>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php foreach ($list_asisten as $data) :?>
                                 <tr>
                                    <td></td>
                                    <td>
                                        <a href="<?=base_url('profil/'.$data['npm'])?>">
                                            <?= $data['nama_lengkap']?>
                                        </a>
                                    </td>
                                    <td><?= $data['npm']?></td>
                                    <td><?= $data['jk']?></td>
                                    <td><?= $data['kelas']?></td>
                                    <td><?= $this->encryption->decrypt($data['no_tlp'])?></td>
                                    <td><?= $data['jabatan']?></td>
                                    <td><?php if ($data['last_login'] === NULL) {
                                        echo "Belum Pernah Login";
                                    }else{
                                        echo date('d M Y - G:i', strtotime($data['last_login']));
                                    } ?></td>
                                    <?php if ($role == "Administrator" || $role == "AT (Editor)"): ?>
                                        <td class="text-center">
                                            <a class="edit-asisten" href="<?=base_url('asisten/edit/'.$data['id_user'])?>">
                                              <button type="button" class="btn btn-sm btn-primary">Edit</button><br>
                                            </a>
                                            <a class="hapus-asisten" href="<?=base_url('asisten/delete/'.$data['id_user'])?>">
                                              <button type="button" class="mt-2 btn btn-sm btn-danger">Delete</button>
                                            </a>
                                        </td>
                                    <?php endif ?>
                                </tr>
                                <?php endforeach; ?>
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