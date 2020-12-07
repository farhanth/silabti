 <!-- partial -->
 <div class="main-panel">
     <div class="content-wrapper">
         <div class="page-header">
             <h3 class="page-title">
                 <span class="page-title-icon bg-gradient-info text-white mr-2">
                     <i class="mdi mdi-account-check"></i>
                 </span>
                 Absen Asisten <?=$ruang?>
             </h3>
         </div>
         <div class="row">
             <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                     <div class="card-body">
                        <div class="flashdata-rekap-absen" data-flashdata="<?=$this->session->flashdata('message_rekap_absen');?>"></div>
                            <?php if (empty($jadwal_pj)): ?>
                            <h4 class="text-center py-5">
                                Tidak ada jadwal praktikum di ruang <?=$ruang?> Shift <?=$shift?>
                            </h4>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item <?php if($this->uri->segment(3)=="1"){echo "active";}?>">
                                            <a class="page-link" href="<?=base_url('absen/'.$ruang.'/1')?>">Shift 1</a>
                                        </li>
                                        <li class="page-item <?php if($this->uri->segment(3)=="2"){echo "active";}?>">
                                            <a class="page-link" href="<?=base_url('absen/'.$ruang.'/2')?>">Shift 2</a>
                                        </li>
                                        <li class="page-item <?php if($this->uri->segment(3)=="3"){echo "active";}?>">
                                            <a class="page-link" href="<?=base_url('absen/'.$ruang.'/3')?>">Shift 3</a>
                                        </li>
                                        <li class="page-item <?php if($this->uri->segment(3)=="4"){echo "active";}?>">
                                            <a class="page-link" href="<?=base_url('absen/'.$ruang.'/4')?>">Shift 4</a>
                                        </li>
                                        <li class="page-item <?php if($this->uri->segment(3)=="5"){echo "active";}?>">
                                            <a class="page-link" href="<?=base_url('absen/'.$ruang.'/5')?>">Shift 5</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php else: ?>
                            <?php if (!empty($cek_rekap)): ?>
                            <div class="py-5">
                                <h4 class="text-center mb-3">
                                   Ruang <?=$ruang?> Shift <?=$shift?> telah diabsen oleh <?=$cek_rekap['at_rekap']?>
                                </h4>
                                <a href="<?=base_url('list_rekap/rekap/'.$ruang.'/'.$shift)?>">
                                    <h5 class="text-center">Lihat Rekap</h5>
                                </a>
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item <?php if($this->uri->segment(3)=="1"){echo "active";}?>">
                                                <a class="page-link" href="<?=base_url('absen/'.$ruang.'/1')?>">Shift 1</a>
                                            </li>
                                            <li class="page-item <?php if($this->uri->segment(3)=="2"){echo "active";}?>">
                                                <a class="page-link" href="<?=base_url('absen/'.$ruang.'/2')?>">Shift 2</a>
                                            </li>
                                            <li class="page-item <?php if($this->uri->segment(3)=="3"){echo "active";}?>">
                                                <a class="page-link" href="<?=base_url('absen/'.$ruang.'/3')?>">Shift 3</a>
                                            </li>
                                            <li class="page-item <?php if($this->uri->segment(3)=="4"){echo "active";}?>">
                                                <a class="page-link" href="<?=base_url('absen/'.$ruang.'/4')?>">Shift 4</a>
                                            </li>
                                            <li class="page-item <?php if($this->uri->segment(3)=="5"){echo "active";}?>">
                                                <a class="page-link" href="<?=base_url('absen/'.$ruang.'/5')?>">Shift 5</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php else :?>
                            <div class="table-responsive">
                                <form id="form_asisten" action="<?=base_url('absen_action')?>" method="post" class="forms-sample needs-validation" novalidate>
                                    <?php
                                    $datestring = '%d %F %Y';
                                    $time = time();
                                    setlocale(LC_TIME, 'id_ID');
                                    $iso_hari = mdate($datestring, $time);
                                    ?>

                                    <div class="form-group row mb-0">
                                        <input type="hidden" name="redirect" value="<?=current_url()?>">
                                        <input type="hidden" name="ruang" value="<?=$ruang?>">
                                        <div class="col-sm-2 offset-sm-1">
                                            <label for="hari" class="m-0 col-form-label">Hari</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input readOnly type="text" value="<?=$jadwal_pj['hari']?>" class="form-control" name="hari" id="hari" autocomplete="off">
                                        </div>
                                    </div>
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
                                        <?php if (substr($jadwal_pj['ruang'], 0, 1) == "H") {
                                            if ($jadwal_pj['shift'] == "1") {
                                                $jam = "08:00 - 10:00";
                                            } elseif (($jadwal_pj['shift'] == "2")){
                                                $jam = "10:00 - 12:00";
                                            } elseif (($jadwal_pj['shift'] == "3")){
                                                $jam = "12:00 - 14:00";
                                            } elseif (($jadwal_pj['shift'] == "4")){
                                                $jam = "14:00 - 16:00";
                                            } elseif (($jadwal_pj['shift'] == "5")){
                                                $jam = "16:00 - 18:00";
                                            }
                                        } elseif(substr($jadwal_pj['ruang'], 0, 1) == "E"){
                                            if ($jadwal_pj['shift'] == "1") {
                                                $jam = "07:30 - 09:30";
                                            } elseif (($jadwal_pj['shift'] == "2")){
                                                $jam = "09:30 - 11:30";
                                            } elseif (($jadwal_pj['shift'] == "3")){
                                                $jam = "11:30 - 13:30";
                                            } elseif (($jadwal_pj['shift'] == "4")){
                                                $jam = "13:30 - 15:30";
                                            } elseif (($jadwal_pj['shift'] == "5")){
                                                $jam = "15:30 - 17:30";
                                            }
                                        } ?>
                                        <div class="col-sm-8">
                                            <input readOnly type="hidden" value="<?=$jadwal_pj['shift']?>" class="form-control" name="shift" id="shift" autocomplete="off">
                                            <input readOnly type="text" value="<?=$jam?>" class="form-control" name="jam" id="jam" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0 mt-2">
                                        <div class="col-sm-2 offset-sm-1">
                                            <label for="materi" class="m-0 col-form-label">Materi</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input readOnly type="text" value="<?=$jadwal_pj['matprak']?>" class="form-control" name="materi" id="materi" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0 mt-2">
                                        <div class="col-sm-2 offset-sm-1">
                                            <label for="kelas" class="m-0 col-form-label">Kelas</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input readOnly type="text" value="<?=$jadwal_pj['kelas_jadwal']?>" class="form-control" name="kelas" id="kelas" autocomplete="off">
                                        </div>
                                    </div>
                                    <table class="table mt-4">
                                        <thead class="bg-info text-white text-center">
                                             <tr>
                                                <th width="40%">
                                                    Nama Asisten
                                                </th>
                                                <th width="40%">
                                                    Asisten Pengganti
                                                </th>
                                                <th width="10%">
                                                    Baris
                                                </th>
                                                <th width="5"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="field_wrapper">
                                            <tr>
                                                <td width="40%">
                                                    <select class="" name="pj" id="pj" required>
                                                        <option value="">--Pilih PJ--</option>
                                                        <?php foreach ($asisten_opt as $asisten): ?>
                                                            <option <?php if($jadwal_pj['nama_lengkap'] === $asisten['nama_lengkap']){?>selected="selected"<?php } ?> value="<?=$asisten['nama_lengkap']?>"><?=$asisten['nama_lengkap']?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </td>
                                                <td width="40%">
                                                    <select class="" name="pengganti_pj" id="pengganti_pj">
                                                        <option value="">Tidak Diganti</option>
                                                        <?php foreach ($asisten_opt as $asisten): ?>
                                                            <option value="<?=$asisten['nama_lengkap']?>"><?=$asisten['nama_lengkap']?></option>
                                                        <?php endforeach ?>
                                                    </select></td>
                                                <td width="15%" class="text-center">Penanggung Jawab</td>
                                            </tr>

                                            <?php foreach ($jadwal_asisten as $asist): ?>
                                                <tr>
                                                    <td width="40%">
                                                        <select class="" name="asist[]" id="asist" required>
                                                            <option value="">--Pilih Asisten--</option>
                                                            <?php foreach ($asisten_opt as $asisten): ?>
                                                                <option <?php if($asist['nama_lengkap'] === $asisten['nama_lengkap']){?>selected="selected"<?php } ?> value="<?=$asisten['nama_lengkap']?>"><?=$asisten['nama_lengkap']?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </td>
                                                    <td width="40%">
                                                        <select class="" name="pengganti_asist[]" id="pengganti_asist">
                                                            <option value="">Tidak Diganti</option>
                                                            <?php foreach ($asisten_opt as $asisten): ?>
                                                                <option value="<?=$asisten['nama_lengkap']?>"><?=$asisten['nama_lengkap']?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </td>
                                                    <td width="10%" class="text-center">
                                                        <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control text-center" name="baris_asisten[]" id="" autocomplete="off" maxlength="2" required>
                                                    </td>
                                                    <td width="5%">
                                                        <a href="javascript:void(0);" class="remove_asisten"><i class="btn-sm btn-danger mdi mdi-minus"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>

                                        </tbody>
                                    </table>
                                    <div class="row mt-4 float-left">
                                        <div class="col-md-12">
                                            <ul class="pagination">
                                                <li class="page-item <?php if($this->uri->segment(3)=="1"){echo "active";}?>">
                                                    <a class="page-link" href="<?=base_url('absen/'.$ruang.'/1')?>">Shift 1</a>
                                                </li>
                                                <li class="page-item <?php if($this->uri->segment(3)=="2"){echo "active";}?>">
                                                    <a class="page-link" href="<?=base_url('absen/'.$ruang.'/2')?>">Shift 2</a>
                                                </li>
                                                <li class="page-item <?php if($this->uri->segment(3)=="3"){echo "active";}?>">
                                                    <a class="page-link" href="<?=base_url('absen/'.$ruang.'/3')?>">Shift 3</a>
                                                </li>
                                                <li class="page-item" <?php if($this->uri->segment(3)=="4"){echo "active";}?>>
                                                    <a class="page-link" href="<?=base_url('absen/'.$ruang.'/4')?>">Shift 4</a>
                                                </li>
                                                <li class="page-item <?php if($this->uri->segment(3)=="5"){echo "active";}?>">
                                                    <a class="page-link" href="<?=base_url('absen/'.$ruang.'/5')?>">Shift 5</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="float-right mt-3">
                                        <button type="button" class="btn btn-gradient-primary mr-2 add_asisten">Tambah Asisten</button>
                                        <button type="button" class="btn btn-gradient-success submit_asisten">Submit</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        <?php endif ?>
                        <?php endif ?>
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

    <!-- js selectize config -->
    <script type="text/javascript">
        $(document).ready(function () {
            var pj = $('#pj').selectize();
            var pj_selectize = pj[0].selectize.lock();
            $('#pengganti_pj').selectize();

            var asisten = $("select[name='asist[]']").selectize();

            var i;
            for (i = 0; i < $("select[name='asist[]']").length; ++i) {
                var asisten_selectize = asisten[i].selectize.lock();
            }

            $("select[name='pengganti_asist[]']").selectize();
        });
    </script>
    <!-- js selectize config end-->

    <!-- js add/remove-->
    <script>
        $(document).ready(function(){
            var maxField =  $("select[name='asist[]']").length;
            var addButton = $('.add_asisten');
            var wrapper = $('.field_wrapper');
            var fieldHTML = `<tr><td width="40%"><select class="" name="asist[]" id="asist" required><option value="">--Pilih Asisten--</option><?php foreach ($asisten_opt as $asisten): ?><option value="<?=$asisten['nama_lengkap']?>"><?=$asisten['nama_lengkap']?></option><?php endforeach ?></select></td><td width="40%"><select class="" name="pengganti_asist[]" id="pengganti_asist"><option value="">Tidak Diganti</option><?php foreach ($asisten_opt as $asisten): ?><option value="<?=$asisten['nama_lengkap']?>"><?=$asisten['nama_lengkap']?></option><?php endforeach ?></select></td><td width="10%" class="text-center"><input type="text" onkeypress="return onlyNumberKey(event)" class="form-control text-center" name="baris_asisten[]" id="" autocomplete="off" maxlength="2" required></td><td width="5%"><a href="javascript:void(0);" class="remove_asisten"><i class="btn-sm btn-danger mdi mdi-minus"></i></a></td></tr>`;
            
            $(addButton).click(function(){
                if(maxField < 6){ 
                    maxField++; 
                    $(wrapper).append(fieldHTML); 
                    $("select[name='asist[]']").selectize();
                    $("select[name='pengganti_asist[]']").selectize();
                }
            });
            
            $(wrapper).on('click', '.remove_asisten', function(e){
                e.preventDefault();
                $(this).parent().parent().remove(); 
                maxField--; 
            });

            $('.submit_asisten').click(function(){
                var isi_baris = [];
                var baris = $("input[name='baris_asisten[]']").length;
                var isi_asist = [];
                var asisten = $("select[name='asist[]']").length;

                $("input[name='baris_asisten[]']").each(function() {
                    var value = $(this).val();
                    if (value) {
                        isi_baris.push(value);
                    }
                });

                $("select[name='asist[]']").each(function() {
                    var value = $(this).val();
                    if (value) {
                        isi_asist.push(value);
                    }
                });

                if (isi_baris.length == baris) {
                    if (isi_asist.length == asisten) {
                        $('#form_asisten').submit();
                    }
                }
            });
        });
    </script>
    <!-- js add/remove end-->
 </div>
 <!-- main-panel ends -->   