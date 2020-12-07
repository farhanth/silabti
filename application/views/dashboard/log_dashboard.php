 <!-- partial -->
 <div class="main-panel">
     <div class="content-wrapper">
         <div class="row">
             <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="card-title">Log Aktifitas</h4>
                         <div class="table-responsive">
                             <table class="table">
                                 <thead>
                                     <tr>
                                         <th width="65%"></th>
                                         <th width="35%"></th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php foreach ($log as $data): ?>
                                         <?php if ($data['kategori'] == "Login" || $data['kategori'] == "Absen Asisten"):?>
                                         <tr>
                                             <td width="65%">
                                                 <?php if ($data['kategori'] == "Login"): ?>
                                                     <p>Anda telah login</p>
                                                 <?php elseif ($data['kategori'] == "Absen Asisten"):?>
                                                     <p><?=$data['deskripsi'];?></p>
                                             <?php endif ?>
                                             </td>
                                             <td width="35%" class="text-right">
                                                 <?php if ($data['kategori'] == "Login"): ?>
                                                     <p><?=date('d M Y - G:i', strtotime($data['waktu']))?></p>
                                                 <?php elseif ($data['kategori'] == "Absen Asisten"):?>
                                                     <p><?=date('d M Y - G:i', strtotime($data['waktu']))?></p>
                                                 <?php endif ?>
                                             </td>
                                         </tr>
                                         <?php endif ?>
                                     <?php endforeach ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- content-wrapper ends -->
     <!-- partial:partials/_footer.html -->
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