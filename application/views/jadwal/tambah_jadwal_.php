<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-info text-white mr-2">
                    <i class="mdi mdi mdi-account"></i>
                </span>
                Tambah Jadwal Asisten
            </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="<?=base_url('jadwal/submit')?>" method="post" class="forms-sample needs-validation" novalidate>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="hari">Hari</label>
                                    <select class="grey-text form-control" name="hari" id="hari" required>
                                        <option value="">--Pilih Hari--</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Satbu</option>
                                    </select>
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        Anda belum memilih hari.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="kelas">Kelas</label>
                                    <input type="text" class="form-control" name="kelas" id="kelas" required maxlength="5" autocomplete="off">
                                    <small id="kelas_format" class="form-text text-muted">
                                        Contoh : 4IA15
                                    </small>
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        Kelas belum diisi.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" id="npm_kelas_field">
                                <div class="form-group col-md-6">
                                    <label for="matprak">Mata Praktikum</label>
                                    <select class="" name="matprak" id="matprak" required>
                                        <option value="">--Pilih Matprak--</option>
                                        <?php foreach ($matprak_opt as $matprak): ?>
                                            <option value="<?=$matprak['id_matprak']?>"><?=$matprak['matprak']?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        Anda belum memilih mata praktikum.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="asisten">Nama Asisten</label>
                                    <select class="" name="asisten" id="asisten" required>
                                        <option value="">--Pilih Asisten--</option>
                                        <?php foreach ($asisten_opt as $asisten): ?>
                                            <option value="<?=$asisten['id_user']?>"><?=$asisten['nama_lengkap']?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        Anda belum memilih asisten.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="role">Bertugas Sebagai</label>
                                    <select class="grey-text form-control" name="role" id="role" required>
                                        <option value="">--Pilih Role--</option>
                                        <option value="PJ">Penanggung Jawab</option>
                                        <option value="Asisten">Asisten</option>
                                    </select>
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        Anda belum memilih role.
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="ruang">Ruang</label>
                                    <select class="grey-text form-control" name="ruang" id="ruang" required>
                                        <option value="">--Pilih Ruang--</option>
                                        <option value="E531">E531</option>
                                        <option value="E532">E532</option>
                                        <option value="H402">H402</option>
                                        <option value="H4045">H4045</option>
                                        <option value="H406">H406</option>
                                        <option value="H407">H407</option>
                                        <option value="H408">H408</option>
                                    </select>
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        Anda belum memilih ruang.
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="shift">Shift</label>
                                    <select class="grey-text form-control" name="shift" id="shift" required>
                                        <option value="">--Pilih Shift--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <small id="jam_praktikum" class="form-text text-muted">
                                        
                                    </small>
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        Anda belum memilih shift.
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                                <a href="<?=base_url('jadwal/pengaturan')?>"><button type="button" class="btn btn-light">Cancel</button></a>
                            </div>
                        </form>
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
            $('#matprak').selectize();
            $('#asisten').selectize();
        });
    </script>
    <!-- js selectize config end-->

    <!-- js jam praktikum -->
    <script>
        $("#shift").change(function() {
            var shift = $(this).val();
            var ruang = $('#ruang').val();
            var kampus = ruang.substring(0,1);
            if(kampus == "H"){
                if(shift == "1"){
                    $('#jam_praktikum').html("Jam praktikum : 08:00 - 10:00");
                } else if(shift == "2"){
                    $('#jam_praktikum').html("Jam praktikum : 10:00 - 12:00");
                } else if(shift == "3"){
                    $('#jam_praktikum').html("Jam praktikum : 12:00 - 14:00");
                } else if(shift == "4"){
                    $('#jam_praktikum').html("Jam praktikum : 14:00 - 16:00");
                } else if(shift == "5"){
                    $('#jam_praktikum').html("Jam praktikum : 16:00 - 18:00");
                } else{
                    $('#jam_praktikum').html("");
                }
            } else if(kampus == "E"){
                if(shift == "1"){
                    $('#jam_praktikum').html("Jam praktikum : 07:30 - 09:30");
                } else if(shift == "2"){
                    $('#jam_praktikum').html("Jam praktikum : 09:30 - 11:30");
                } else if(shift == "3"){
                    $('#jam_praktikum').html("Jam praktikum : 11:30 - 13:30");
                } else if(shift == "4"){
                    $('#jam_praktikum').html("Jam praktikum : 13:30 - 15:30");
                } else if(shift == "5"){
                    $('#jam_praktikum').html("Jam praktikum : 15:30 - 17:30");
                } else{
                    $('#jam_praktikum').html("");
                }
            } else{
                $('#jam_praktikum').html("");
            }
        })
    </script>
    <!-- js jam praktikum end-->
</div>
<!-- main-panel ends -->