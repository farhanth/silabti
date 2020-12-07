 <!-- partial -->
 <div class="main-panel">
     <div class="content-wrapper">
         <div class="page-header">
             <h3 class="page-title">
                 <span class="page-title-icon bg-gradient-info text-white mr-2">
                     <i class="mdi mdi-chemical-weapon"></i>
                 </span>
                 List Mata Praktikum
             </h3>
             <?php 
             $role = $this->session->userdata('jabatan');
             if ($role == "Administrator" || $role == "AT (Editor)"): ?>
                 <nav aria-label="breadcrumb">
                    <a href="<?=base_url('matprak/tambah')?>">
                        <button type="button" class="btn btn-success btn-icon-text">
                            <div class="float-left mr-3">
                                Tambah<br>Praktikum
                            </div>
                            <div class="mt-2">
                                <i class="mdi mdi mdi-plus btn-icon-prepend"></i>
                            </div>
                        </button>
                    </a>
                 </nav>
             <?php endif ?>
         </div>
         <div class="flashdata-matprak-list" data-flashdata="<?=$this->session->flashdata('message_matprak');?>"></div>
         <div class="row">
             <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table" id="dataTable_matprak">
                                 <thead>
                                     <tr>
                                        <th class="no-sort">
                                            No.
                                         </th>
                                         <th>
                                             Mata Praktikum
                                         </th>
                                         <th>
                                             Tingkat
                                         </th>
                                         <th>
                                             Semester
                                         </th>
                                         <th>
                                             Periode
                                         </th>
                                         <th>
                                             Tanggal Mulai
                                         </th>
                                         <th>
                                             Sedang Berlangsung
                                         </th>
                                         <?php if ($role == "Administrator" || $role == "AT (Editor)"): ?>
                                            <th class="no-sort">
                                            </th>
                                         <?php endif ?>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    <?php foreach ($matprak as $data): ?>
                                        <tr>
                                            <td></td>
                                            <td><?=$data['matprak']." (".$data['matprak_singkat'].")"?></td>
                                            <td><?=$data['tingkat']?></td>
                                            <td><?=$data['semester']?></td>
                                            <td><?=$data['periode']?></td>
                                            <td><?php if ($data['tanggal_mulai'] === NULL || $data['tanggal_mulai'] === "0000-00-00") {
                                                echo "Belum ditentukan";
                                            }else{
                                                echo date('d M Y', strtotime($data['tanggal_mulai']));
                                            } ?></td>
                                            <td><?=$data['berlangsung']?></td>
                                            <?php if ($role == "Administrator" || $role == "AT (Editor)"): ?>
                                                <td class="text-center">
                                                    <a class="edit-matprak" href="<?=base_url('matprak/edit/'.$data['id_matprak'])?>">
                                                      <button type="button" class="btn btn-sm btn-primary">Edit</button><br>
                                                    </a>
                                                    <a class="hapus-matprak" href="<?=base_url('matprak/delete/'.$data['id_matprak'])?>">
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