 <!-- partial -->
 <div class="main-panel">
     <div class="content-wrapper">
         <div class="row">
             <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                    <div class="card-body">
                         <h4 class="mb-3">Konfigurasi Gaji</h4>
                         <div class="table-responsive">
                             <div class="flashdata-konfigurasi-gaji-perjam" data-flashdata="<?=$this->session->flashdata('message_konfig_gaji-perjam');?>"></div>
                             <table class="table table-striped" id="dataTable_gaji_perjam">
                                 <thead>
                                     <tr>
                                         <th>
                                             Lab Tingkat
                                         </th>
                                         <th>
                                             Baris
                                         </th>
                                         <th>
                                             Shift
                                         </th>
                                         <th>
                                             Gaji Per Jam (Rp)
                                         </th>
                                         <th>
                                             Nilai Variabel 1
                                         </th>
                                         <th>
                                             Nilai Variabel 2
                                         </th>
                                         <th>
                                             Total (Rp)
                                         </th>
                                         <th></th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    <?php foreach ($gaji as $data): ?>
                                    <tr>
                                        <td><?=$data['lab_tingkat']?></td>
                                        <td><?=$data['role']?></td>
                                        <td><?=$data['kategori_shift']?></td>
                                        <td class="text-center"><?=$data['gaji_perjam']?></td>
                                        <td class="text-center"><?=$data['variabel1']?></td>
                                        <td class="text-center"><?=$data['variabel2']?></td>
                                        <td>
                                            <?php
                                            $rupiah = $data['gaji_perjam'] * $data['variabel1'] * $data['variabel2'];
                                            echo number_format(intval($rupiah), 0, ".", ".");
                                            ?>
                                        </td>
                                        <td>
                                            <a class="edit-asisten" href="<?=base_url('konfigurasi_rekap/edit_gaji/'.$data['id_gaji_perjam'])?>">
                                              <button type="button" class="btn btn-sm btn-success">Edit</button><br>
                                            </a>
                                        </td>
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