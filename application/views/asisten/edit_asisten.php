<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-info text-white mr-2">
                    <i class="mdi mdi mdi-account"></i>
                </span>
                Edit Asisten
            </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="flashdata-asisten-edit" data-flashdata="<?=$this->session->flashdata('message_asisten');?>"></div>
                        <form action="<?=base_url('asisten/submit_edit')?>" method="post" class="forms-sample needs-validation" novalidate>
                            <?php
                            $no_tlp = $this->encryption->decrypt($asisten['no_tlp']);
                            $no_rek = $this->encryption->decrypt($asisten['no_rek']);
                            ?>
                            <input type="hidden" value="<?=$asisten['id_user'];?>" name="id_user" id="id_user">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="jabatan">Jabatan</label>
                                    <select class="grey-text form-control" name="jabatan" id="jabatan" required>
                                        <option value="">--Pilih Jabatan--</option>
                                        <option <?php if($asisten['jabatan'] === "Asisten"){?>selected="selected"<?php } ?> value="Asisten">Asisten</option>
                                        <option <?php if($asisten['jabatan'] === "Asisten Tetap"){?>selected="selected"<?php } ?> value="Asisten Tetap">Asisten Tetap</option>
                                    </select>
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        Jabatan belum diisi.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" value="<?=$asisten['nama_lengkap'];?>" name="nama_lengkap" id="nama_lengkap" required maxlength="64" autocomplete="off">
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        Nama Lengkap belum diisi.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" id="npm_kelas_field">
                                <div class="form-group col-md-6">
                                    <label for="npm">NPM</label>
                                    <input type="text" class="form-control" name="npm" value="<?=$asisten['npm'];?>" id="npm" required maxlength="8" autocomplete="off">
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        NPM belum diisi.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="kelas">Kelas</label>
                                    <input type="text" class="form-control" value="<?=$asisten['kelas'];?>" name="kelas" id="kelas" maxlength="16" autocomplete="off">
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
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="no_tlp">No. Tlp</label>
                                    <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control" value="<?=$no_tlp?>" name="no_tlp" id="no_tlp" maxlength="16" autocomplete="off" >
                                    <small id="no_tlp_format" class="form-text text-muted">
                                        Contoh : 081212345678
                                    </small>
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        No. Tlp belum diisi.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="no_rek">No. Rekening</label>
                                    <input type="text" class="form-control" value="<?=$no_rek?>" name="no_rek" id="no_rek" required maxlength="16" autocomplete="off">
                                    <small id="no_tlp_format" class="form-text text-muted">
                                        Contoh : 502.23.06137.3
                                    </small>
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        No. Rekening belum diisi.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select class="grey-text form-control" name="jk" id="jk" required>
                                        <option value="">--Pilih Jenis Kelamin--</option>
                                        <option <?php if($asisten['jk'] === "Laki laki"){?>selected="selected"<?php } ?> value="Laki laki">Laki laki</option>
                                        <option <?php if ($asisten['jk'] === "Perempuan") { ?>selected="selected"<?php } ?> value="Perempuan">Perempuan</option>
                                    </select>
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        Jenis Kelamin belum diisi.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control asisten-edit-password" name="password" id="password" maxlength="16" minlength="8" autocomplete="off">
                                    <small id="password_change" class="form-text text-muted" style="display:inline-block;">
                                        Kosongkan bila tidak ingin mengganti password
                                    </small>
                                    <div class="form-check form-check-flat form-check-primary">
                                      <label class="form-check-label">
                                        <input <?php if ($asisten['ganti_password'] == 'Iya') echo "checked='checked'"; ?> type="checkbox" class="form-check-input" name="force_password">
                                        Asisten harus mengganti password ketika login
                                      </label>
                                    </div>
                                    <small id="password_format" class="form-text text-muted" style="display:none;">
                                        Password minimal 8 karakter dan maksimal 16 karakter
                                    </small>
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        Format Password tidak sesuai.
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-gradient-primary mr-2">Edit</button>
                                <a href="<?=base_url('asisten')?>"><button type="button" class="btn btn-light">Cancel</button></a>
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

    <!-- edit password js -->
    <script>
        $( document ).ready(function() {
            $('.asisten-edit-password').on('input', edit_password_field);

            function edit_password_field(){
                var password_value = $(this).val();
                $('#password_format').attr('style', 'display: inline-block;');
                $('#password_change').attr('style', 'display: none;');
                if(password_value.length == 0){
                    $('#password_format').attr('style', 'display: none;');
                    $('#password_change').attr('style', 'display: inline-block;');
                }
            }
        });
    </script>
    <!-- edit password js end-->

    <!-- check staff js -->
    <!-- <script>
        $(document).ready(function(){
            var jabatan_value = $('#jabatan').val();
            if(jabatan_value == "Staff"){
                $('#npm_kelas_field').attr('style', 'display: none;');
                $('#npm').removeAttr('required');
                $('#kelas').removeAttr('required');
            }
        });
    </script> -->
    <!--end check staff js -->
</div>
<!-- main-panel ends -->