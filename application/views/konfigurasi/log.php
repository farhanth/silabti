 <!-- partial -->
 <div class="main-panel">
     <div class="content-wrapper">
         <div class="row">
             <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                    <div class="card-body">
                         <h4 class="mb-3">Log Aktifitas</h4>
                         <div class="row">
                           <div class="col-md-6">
                             <div class="form-group row mb-0">
                               <label class="col-sm-5 col-form-label mb-2">Tampilkan Data Tanggal :</label>
                               <div class="col-sm-7">
                                 <input class="form-control" placeholder="Masukan Tanggal" name="log_min" id="log_min" autocomplete="off">
                               </div>
                             </div>
                           </div>
                           <div class="col-md-6">
                             <div class="form-group row mb-0">
                               <label class="col-sm-4 col-form-label mb-2">Sampai Tanggal :</label>
                               <div class="col-sm-8">
                                 <input class="form-control" placeholder="Masukan Tanggal" name="log_max" id="log_max" autocomplete="off">
                               </div>
                             </div>
                           </div>
                         </div>
                         <div class="table-responsive">
                             <table class="table" id="dataTable_log">
                                 <thead>
                                     <tr>
                                        <th>
                                             Waktu.
                                         </th>
                                         <th>
                                             User
                                         </th>
                                         <th>
                                             IP Address
                                         </th>
                                         <th>
                                             OS
                                         </th>
                                         <th>
                                             Browser
                                         </th>
                                         <th>
                                             Kategori
                                         </th>
                                         <th>
                                             Event
                                         </th>
                                         <th>
                                             Deskripsi
                                         </th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    <?php foreach ($log as $data): ?>
                                    <tr>
                                        <td><?=date('d M Y G:i:s', strtotime($data['waktu']))?></td> 
                                        <td>
                                            <a href="<?=base_url('profil/').$data['npm']?>">
                                                <?=$data['nama_lengkap']?>
                                            </a>
                                        </td>
                                        <td><?=$data['ip_address']?></td>
                                        <td><?=$data['os']?></td>
                                        <td><?=$data['browser']?></td>
                                        <td><?=$data['kategori']?></td>
                                        <td><?=$data['event']?></td>
                                        <td><?=$data['deskripsi']?></td>
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

 <!-- dataTable log -->
<script>
    $(document).ready(function() {
        $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var min = $('#log_min').datepicker("getDate");
            var max = $('#log_max').datepicker("getDate");
            var startDate = new Date(data[0]);
            if (min == null && max == null) { return true; }
            if (min == null && startDate <= max) { return true;}
            if(max == null && startDate >= min) {return true;}
            if (startDate <= max && startDate >= min) { return true; }
            return false;
        }
        );

        var table_log = $('#dataTable_log').DataTable( {
            "columnDefs": [ {
                "bSortable": false,
                'orderable': false,
                "aTargets": [0]
            } ],
            "aaSorting": [],
        } );

        if(role == "Asisten"){
            table_log.button(0).remove();
        }else {
            table_log.button(0).add();
        }

        $("#log_min").datepicker({ onSelect: function () { table_log.draw(); }, changeMonth: true, changeYear: true });
        $("#log_max").datepicker({ onSelect: function () { table_log.draw(); }, changeMonth: true, changeYear: true });

        $('#log_min, #log_max').change(function () {
            table_log.draw();
        });
    });
</script>
<!-- dataTable log end-->