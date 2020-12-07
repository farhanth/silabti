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
         </div>
         <div class="row">
             <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                     <div class="card-body">
                         <h6 class="mb-3">Jadwal untuk keyword <span class="font-weight-bold"><?=$this->input->get('keyword')?> :</span></h6>
                         <div class="table-responsive">
                         <table class="table table-striped table-bordered">
                             <thead class="bg-info text-white text-center">
                                 <tr>
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
                                         Role
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
                                     <th>
                                         Tanggal Mulai
                                     </th>
                                 </tr>
                             </thead>
                             <tbody>
                                    <?php foreach ($jadwal as $data): ?>
                                    <tr>
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
                                        <td><?=$data['matprak']?></td>
                                        <td><?=$data['role']?></td>
                                        <td><?=$data['kelas_jadwal']?></td>
                                        <td><?=$data['ruang']?></td>
                                        <td><?=$data['nama_lengkap']?></td>
                                        <td>
                                            <?php if ($data['tanggal_mulai'] === NULL || $data['tanggal_mulai'] === "0000-00-00") {
                                                echo "Belum ditentukan";
                                            }else{
                                                echo date('d M Y', strtotime($data['tanggal_mulai']));
                                            } ?>
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