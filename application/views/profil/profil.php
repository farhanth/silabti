 <!-- partial -->
 <div class="main-panel">
   <div class="content-wrapper">
      <?php if (empty($profil)): ?>
        <div class="row">
             <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                     <div class="card-body h-100">
                        <h3 class="page-title text-center">Profil yang anda cari tidak ditemukan</h3>
                     </div>
                 </div>
             </div>
         </div>
      <?php else: ?>
       <div class="row">
           <div class="col-md-7">
                   <div class="card">
                       <div class="card-body">
                            <div class="flashdata-profil" data-flashdata="<?=$this->session->flashdata('message_profil');?>"></div>
                            <h4 class="card-title float-left">Detail Profil</h4>
                            <div class="clearfix"></div>
                            <div class="image-area mx-auto mb-5">
                              <img src="<?=base_url('gambar_profil/'.$profil['gambar_profil'])?>" id="gambar_profil">
                                <?php
                                $npm_db = $profil['npm'];
                                $npm_session = $this->session->userdata('npm');
                                if ($npm_db == $npm_session): ?>
                                    <form action="<?=base_url('update_profil')?>" id="form_gambar_profile" method="POST" enctype="multipart/form-data">
                                        <button type="button" class="edit-image" id="edit_image_button"><i class="mdi mdi-pencil"></i></button>
                                        <input type="hidden" value="<?=$npm_db?>" name="npm_profil" id="npm_profile">
                                        <input type="file" accept=".png, .jpg, .jpeg" name="update_gambar_profile" id="update_gambar_profile">
                                    </form>
                                <?php endif ?>
                            </div>
                            <?php
                                $no_tlp = $this->encryption->decrypt($profil['no_tlp']);
                                $no_rek = $this->encryption->decrypt($profil['no_rek']);
                            ?>
                            <dl class="row">
                                <dt class="col-sm-4 mb-2">Nama Lengkap</dt>
                                <dd class="col-sm-8"><?=$profil['nama_lengkap']?></dd>
                                <dd class="col-sm-12"></dd>
                                <dt class="col-sm-4 mb-2">Jabatan</dt>
                                <dd class="col-sm-8"><?=$profil['jabatan']?></dd>
                                <dd class="col-sm-12"></dd>
                                <dt class="col-sm-4 mb-2">NPM</dt>
                                <dd class="col-sm-8"><?=$npm_db?></dd>
                                <dd class="col-sm-12"></dd>
                                <dt class="col-sm-4 mb-2">Kelas</dt>
                                <dd class="col-sm-8"><?=$profil['kelas']?></dd>
                                <dd class="col-sm-12"></dd>
                                <?php if ($npm_db == $npm_session || $this->session->userdata('jabatan') == "Administrator"): ?>
                                    <dt class="col-sm-4 mb-2">Nomor Rekening</dt>
                                    <dd class="col-sm-8"><?=$no_rek?></dd>
                                    <dd class="col-sm-12"></dd>
                                <?php endif ?>
                                <dt class="col-sm-4 mb-2">No. Telepon</dt>
                                <?php
                                    $no_wa = "62".substr($no_tlp, 1)
                                ?>
                                <dd class="col-sm-8"><a target="_blank" href="http://wa.me/<?=$no_wa?>"><?=$no_tlp?></a></dd>
                                <dd class="text-muted col-sm-8 offset-sm-4">Klik nomor untuk menghubungi via Whatsapp</dd>
                                <dd class="col-sm-12"></dd>
                            </dl>
                            <small class="text-muted">*Bila ada data yang salah, harap hubungi asisten tetap</small>
                      </div>
                  </div>
          </div>
        <div class="col-md-5">
           <div class="card mb-md-3 mt-md-0 mb-3 mt-3">
               <div class="card-body">
                    <h4 class="card-title">Aktivitas Login</h4>
                    <dl class="row mb-0">
                        <dt class="col-sm-4 mb-2">Terakhir Login</dt>
                        <dd class="col-sm-8">
                          <?php if ($profil['last_login'] === NULL) {
                              echo "Belum Pernah Login";
                          }else{
                              echo date('d M Y - G:i', strtotime($profil['last_login']));
                          } ?>
                        </dd>
                        <dd class="col-sm-12"></dd>
                        <dt class="col-sm-4 mb-2">IP Address Terakhir</dt>
                        <dd class="col-sm-8"><?=$log['ip_address']?></dd>
                    </dl>
               </div>
           </div>
           <div class="card">
               <div class="card-body">
                   <ul class="list-unstyled"><h4 class="card-title">Jadwal Penanggung Jawab</h4>
                      <?php foreach ($jadwal_pj as $pj): ?>
                        <li class="ml-3"><?=$pj['matprak_singkat']." ".$pj['kelas_jadwal']?></li>
                      <?php endforeach ?>
                   </ul>
                   <ul class="list-unstyled"><h4 class="card-title">Jadwal Asisten</h4>
                       <?php foreach ($jadwal_asisten as $asist): ?>
                        <li class="ml-3"><?=$asist['matprak_singkat']." ".$asist['kelas_jadwal']?></li>
                      <?php endforeach ?>
                   </ul>
               </div>
           </div>
        </div>
   </div>
</div>
<?php endif ?>

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