 <!-- partial -->
 <div class="main-panel">
     <div class="content-wrapper">
         <div class="page-header">
             <h3 class="page-title">
                 <span class="page-title-icon bg-gradient-info text-white mr-2">
                    <i class="mdi mdi-calendar-multiple-check"></i>
                 </span>
                 List Rekap Absen <?=$ruang_selected?>
             </h3>
        </div>
        <div class="flashdata-rekap-harian" data-flashdata="<?=$this->session->flashdata('message_rekap_harian');?>"></div>
        <div class="row">
         <div class="col-md-12 grid-margin stretch-card">
             <div class="card">
                 <div class="card-body">
                    <form method="post" id="form_ruang">
                         <div class="form-group row mb-3 justify-content-between">
                            <div class="col-sm-2">
                                <label for="ruang" class="m-0 col-form-label">Rekap Ruang : </label>
                            </div>
                            <div class="col-sm-10">
                                <select class="grey-text form-control" name="ruang" id="ruang" required>
                                    <option <?php if($ruang_selected == NULL){?>selected="selected"<?php } ?> value="">Semua Ruangan</option>
                                    <?php foreach ($ruang_opt as $ruang): ?>
                                        <option <?php if($ruang_selected === $ruang['ruang_rekap']){?>selected="selected"<?php } ?> value="<?=$ruang['ruang_rekap']?>"><?=$ruang['ruang_rekap']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                     </form>
                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group row mb-0">
                           <label class="col-sm-5 col-form-label mb-2">Tampilkan Data Tanggal :</label>
                           <div class="col-sm-7">
                             <input class="form-control" placeholder="Masukan Tanggal" name="rekap_min" id="rekap_min" autocomplete="off">
                           </div>
                         </div>
                       </div>
                       <div class="col-md-6">
                         <div class="form-group row mb-0">
                           <label class="col-sm-4 col-form-label mb-2">Sampai Tanggal :</label>
                           <div class="col-sm-8">
                             <input class="form-control" placeholder="Masukan Tanggal" name="rekap_max" id="rekap_max" autocomplete="off">
                           </div>
                         </div>
                       </div>
                     </div>
                     <div class="table-responsive">
                        <table class="table table-hover mt-4" id="dataTable_rekap">
                            <thead>
                                 <tr>
                                    <th>
                                        Tanggal
                                    </th>
                                    <th>
                                        Mata Praktikum
                                    </th>
                                    <th>
                                        Shift
                                    </th>
                                    <th>
                                        Kelas
                                    </th>
                                    <th>
                                        Role
                                    </th>
                                    <th>
                                        Jumlah Mahasiswa
                                    </th>
                                    <th>
                                        Ruang
                                    </th>
                                    <th>
                                        Nama Asisten
                                    </th>
                                    <th>
                                        Nilai Rekap
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rekap as $data): ?>
                                <tr>
                                    <td><?=date('d M Y', strtotime($data['waktu_praktikum']))?></td>
                                    <td><?=$data['matprak_rekap']?></td>
                                    <td><?=$data['shift_rekap']?></td>
                                    <td><?=$data['kelas_rekap']?></td>
                                    <td><?=$data['role_rekap']?></td>
                                    <td class="text-center"><?=$data['jumlah_mhs_rekap']?></td>
                                    <td><?=$data['ruang_rekap']?></td>
                                    <td><?=$data['nama_asisten_rekap']?></td>
                                    <td><?=$data['nilai_rekap']?></td>
                                    <td class="text-center">
                                        <form method="post" class="action_form">
                                            <button class="btn btn-sm btn-primary" type="submit" name="edit" value="<?=$data['id_rekap']?>">Edit</button>
                                            <button class="btn btn-sm btn-danger mt-2 hapus-rekap" type="submit" name="delete" value="<?=$data['id_rekap']?>">Delete</button>
                                        </form>
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

  <!-- dataTable list rekap -->
  <script>
    $(document).ready(function() {
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }

        $("#ruang").change(function(){
            $("#form_ruang").submit();
        });

        $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var min = $('#rekap_min').datepicker("getDate");
            var max = $('#rekap_max').datepicker("getDate");
            var startDate = new Date(data[0]);
            if (min == null && max == null) { return true; }
            if (min == null && startDate <= max) { return true;}
            if(max == null && startDate >= min) {return true;}
            if (startDate <= max && startDate >= min) { return true; }
            return false;
        }
        );

        var table_rekap = $('#dataTable_rekap').DataTable( {
            "columnDefs": [ {
                "bSortable": false,
                'orderable': false,
                "aTargets": [0]
            } ],
            "aaSorting": [],
            dom: 'Bfrtip',
            buttons: [{
                className: 'btn btn-info buttons-html5',
                extend: 'pdf',
                text: 'Export to PDF',
                exportOptions: {
                    modifier: {
                        page: 'current'
                    }
                }
           }]
        } );

        $("#rekap_min").datepicker({ onSelect: function () { table_rekap.draw(); }, changeMonth: true, changeYear: true });
        $("#rekap_max").datepicker({ onSelect: function () { table_rekap.draw(); }, changeMonth: true, changeYear: true });

        $('#rekap_min, #rekap_max').change(function () {
            table_rekap.draw();
        });
    });
  </script>
  <!-- dataTable list rekap end-->