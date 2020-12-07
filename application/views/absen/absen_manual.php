 <!-- partial -->
 <div class="main-panel">
     <div class="content-wrapper">
         <div class="page-header">
             <h3 class="page-title">
                 <span class="page-title-icon bg-gradient-info text-white mr-2">
                     <i class="mdi mdi-account-check"></i>
                 </span>
                 Absen Asisten Manual
             </h3>
         </div>
         <div class="row">
             <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                     <div class="card-body">
                        <div class="flashdata-rekap-absen" data-flashdata="<?=$this->session->flashdata('message_rekap_absen');?>"></div>
                            <div class="table-responsive">
                                <form id="form_asisten" action="<?=base_url('absen_action')?>" method="post" class="forms-sample needs-validation" novalidate>
                                    <div class="form-group row mb-0">
                                        <input type="hidden" name="redirect" value="<?=current_url()?>">
                                        <div class="col-sm-2 offset-sm-1">
                                            <label for="ruang" class="m-0 col-form-label">Ruang</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="grey-text form-control" name="ruang" id="ruang" required>
                                                <option value="">--Pilih Ruang--</option>
                                                <option value="E531">E531</option>
                                                <option value="E532">E532</option>
                                                <option value="H402">H402</option>
                                                <option value="H4045">H4045</option>
                                                <option value="H406">H406</option>
                                                <option value="H407">H407</option>
                                                <option value="H408">H408</option>
                                                <option value="Cengkareng">Cengkareng</option>
                                                <option value="Karawaci">Karawaci</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0 mt-2">
                                        <div class="col-sm-2 offset-sm-1">
                                            <label for="tanggal" class="m-0 col-form-label">Tanggal Praktikum</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="tanggal" id="tanggal" autocomplete="off" required>
                                            <small class="text-muted">Masukan tanggal praktikum yang ingin direkap. Bukan tanggal sekarang</small>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0 mt-3">
                                        <div class="col-sm-2 offset-sm-1">
                                            <label for="shift" class="m-0 col-form-label">Shift</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="grey-text form-control" name="shift" id="shift" required>
                                                <option value="">--Pilih Shift--</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0 mt-2">
                                        <div class="col-sm-2 offset-sm-1">
                                            <label for="materi" class="m-0 col-form-label">Materi</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="" name="materi" id="materi" required>
                                                <option value="">--Pilih Matprak--</option>
                                                <?php foreach ($matprak_opt as $matprak): ?>
                                                    <option value="<?=$matprak['matprak']?>"><?=$matprak['matprak']?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0 mt-2">
                                        <div class="col-sm-2 offset-sm-1">
                                            <label for="kelas" class="m-0 col-form-label">Kelas</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="kelas" id="kelas" autocomplete="off">
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
                                                            <option value="<?=$asisten['nama_lengkap']?>"><?=$asisten['nama_lengkap']?></option>
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

                                            <tr>
                                                <td width="40%">
                                                    <select class="" name="asist[]" id="asist" required>
                                                        <option value="">--Pilih Asisten--</option>
                                                        <?php foreach ($asisten_opt as $asisten): ?>
                                                            <option value="<?=$asisten['nama_lengkap']?>"><?=$asisten['nama_lengkap']?></option>
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

                                        </tbody>
                                    </table>
                                    <div class="float-right mt-3">
                                        <button type="button" class="btn btn-gradient-primary mr-2 add_asisten">Tambah Asisten</button>
                                        <button type="button" class="btn btn-gradient-success submit_asisten">Submit</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
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

    <!-- js selectize config -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#tanggal').datepicker();
            $('#materi').selectize();
            var pj = $('#pj').selectize();
            var pj_selectize = pj[0].selectize.unlock();
            $('#pengganti_pj').selectize();

            var asisten = $("select[name='asist[]']").selectize();

            var i;
            for (i = 0; i < $("select[name='asist[]']").length; ++i) {
                var asisten_selectize = asisten[i].selectize.unlock();
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