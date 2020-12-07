<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-info text-white mr-2">
                    <i class="mdi mdi mdi-account"></i>
                </span>
                Tambah Asisten
            </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="flashdata-asisten-add" data-flashdata="<?=$this->session->flashdata('message_asisten');?>"></div>
                        <form action="<?=base_url('asisten/submit')?>" method="post" class="forms-sample needs-validation" novalidate>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="jabatan">Jabatan</label>
                                    <select class="grey-text form-control" name="jabatan" id="jabatan" required>
                                        <option value="">--Pilih Jabatan--</option>
                                        <option value="Asisten">Asisten</option>
                                        <option value="Asisten Tetap">Asisten Tetap</option>
                                    </select>
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        Jabatan belum diisi.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" required maxlength="64" autocomplete="off">
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
                                    <input type="text" class="form-control" name="npm" id="npm" required maxlength="8" autocomplete="off">
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        NPM belum diisi.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="kelas">Kelas</label>
                                    <input type="text" class="form-control" name="kelas" id="kelas" maxlength="16" autocomplete="off">
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
                                    <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control" name="no_tlp" id="no_tlp" maxlength="16" autocomplete="off" >
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
                                    <input type="text" class="form-control" name="no_rek" id="no_rek" required maxlength="14" autocomplete="off">
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
                                        <option value="Laki laki">Laki laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        Jenis Kelamin belum diisi.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required maxlength="16" minlength="8" autocomplete="off">
                                    <small id="password_format" class="form-text text-muted">
                                        Password minimal 8 karakter dan maksimal 16 karakter
                                    </small>
                                    <div class="form-check form-check-flat form-check-primary">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="force_password">
                                        Asisten harus mengganti password ketika login
                                      </label>
                                    </div>
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        Format Password tidak sesuai.
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
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
</div>
<!-- main-panel ends -->