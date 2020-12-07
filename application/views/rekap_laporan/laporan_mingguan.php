 <!-- partial -->
 <div class="main-panel">
     <div class="content-wrapper">
         <div class="page-header">
             <h3 class="page-title">
                 <span class="page-title-icon bg-gradient-info text-white mr-2">
                    <i class="mdi mdi-calendar-multiple-check"></i>
                 </span>
                 Laporan Rekap Absen (Mingguan)
             </h3>
        </div>
        <div class="row">
         <div class="col-md-12 grid-margin stretch-card">
             <div class="card">
                 <div class="card-body">
                     <?php
                     $tanggal_awal = strtotime($this->input->post('rekap_min'));
                     $tanggal_awal_mingguan = strtotime($this->input->post('rekap_max'));
                     $tanggal_akhir = strtotime($this->input->post('rekap_max'));

                     $input_mingguan = abs(date($tanggal_akhir) - date($tanggal_awal))/604800;
                     $input_mingguan = ceil($input_mingguan);

                     
                     ?>
                     <div class="table-responsive">
                         <dl class="row">
                            <dt class="col-sm-2 mb-2">Laporan</dt>
                            <dd class="col-sm-10">
                                <?php foreach ($tingkat_lab as $lab): ?>
                                    Lab. <?=$lab?> <br>
                                <?php endforeach ?>
                            </dd>
                            <dd class="col-sm-12"></dd>
                            <dt class="col-sm-2 mb-2">Periode Rekap</dt>
                            <dd class="col-sm-10"><?=date('d-m-Y', $tanggal_awal)." - ".date('d-m-Y', $tanggal_akhir)?></dd>
                            <dd class="col-sm-12"></dd>
                         </dl>
                         <button class="btn btn-info buttons-excel mb-3" onclick="tableToExcel('dataTable_laporan_rekap','Total')">
                             Export to Excel
                         </button>
                         <table class="table" id="dataTable_laporan_rekap">
                             <thead>
                                 <tr></tr>
                                 <tr></tr>
                                 <tr>
                                    <th rowspan="2" style="min-width: 64px !important;display:none;"></th>
                                    <th rowspan="2" style="font:9pt Arial; font-weight:bold; min-width: 39px; vertical-align: middle; text-align: center;  background: #c0c0c0; border:1px solid #000;">
                                        NO
                                     </th>
                                     <th rowspan="2" style="font:9pt Arial; font-weight:bold; min-width: 121px !important; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:1px solid #000; border-top:1px solid #000;">
                                        NO. REKENING
                                     </th>
                                     <th rowspan="2" style="font:9pt Arial; font-weight:bold; min-width: 240px !important; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:3px solid #000; border-top:1px solid #000;">
                                        NAMA ASISTEN
                                     </th>
                                     <?php foreach ($tingkat_lab as $lab): ?>
                                         <?php for ($i=1; $i <= $input_mingguan ; $i++) { ?>
                                         <th colspan="4" style="font:9pt Arial; font-weight:bold; min-width: 156px !important; vertical-align: middle; text-align: center; background: #c0c0c0; border-right:3px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;">
                                            <?=strtoupper($lab)." M".$i?>
                                         </th>
                                         <?php } ?>
                                         <th colspan="4" style="font:9pt Arial; font-weight:bold; min-width: 156px !important; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:3px solid #000; border-top:1px solid #000;">
                                            TOTAL
                                         </th>
                                     <?php endforeach ?>
                                 </tr>
                                 <tr>
                                     <?php foreach ($tingkat_lab as $lab): ?>
                                         <?php for ($i=1; $i <= $input_mingguan ; $i++) {?>
                                         <th style="font:9pt Arial; font-weight:bold; min-width: 39px !important; width: 39px; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:1px solid #000;">
                                             AP
                                         </th>
                                         <th style="font:9pt Arial; font-weight:bold; min-width: 39px !important; width: 39px; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:1px solid #000;">
                                             AM
                                         </th>
                                         <th style="font:9pt Arial; font-weight:bold; min-width: 39px !important; width: 39px; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:1px solid #000;">
                                             KP
                                         </th>
                                         <th style="font:9pt Arial; font-weight:bold; min-width: 39px !important; width: 39px; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:3px solid #000;">
                                             KM
                                         </th>
                                         <?php } ?>
                                         <th style="font:9pt Arial; font-weight:bold; min-width: 39px !important; width: 39px; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:1px solid #000;">
                                             AP
                                         </th>
                                         <th style="font:9pt Arial; font-weight:bold; min-width: 39px !important; width: 39px; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:1px solid #000;">
                                             AM
                                         </th>
                                         <th style="font:9pt Arial; font-weight:bold; min-width: 39px !important; width: 39px; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:1px solid #000;">
                                             KP
                                         </th>
                                         <th style="font:9pt Arial; font-weight:bold; min-width: 39px !important; width: 39px; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:3px solid #000;">
                                             KM
                                         </th>
                                     <?php endforeach ?>
                                 </tr>
                             </thead>
                             <tbody>
                             <?php 
                             $no = 1;
                             foreach ($asisten as $asist):
                             $no_rek = $this->encryption->decrypt($asist['no_rek']);?>
                                <tr>
                                    <td style="min-width: 64px !important;display:none;"></td>
                                    <td style="text-align: center; border-bottom:0.5px solid #000; border-right:1px solid #000; border-left:1px solid #000;"><?=$no++?></td>
                                    <td style="text-align: center; border-bottom:0.5px solid #000; border-right:1px solid #000;"><?=$no_rek?></td>
                                    <td style="border-bottom:0.5px solid #000; border-right:3px solid #000;"><?=$asist['nama_lengkap']?></td>
                                    <?php
                                    foreach ($tingkat_lab as $lab){
                                        $rekap_awal_minggu = date('Y-m-d', strtotime($this->input->post('rekap_min')));
                                        $rekap_akhir_minggu = date('Y-m-d', strtotime($this->input->post('rekap_min'). ' +6 day'));
                                    for ($i=1; $i <= $input_mingguan ; $i++) {
                                        $this->db->where('waktu_praktikum >=', $rekap_awal_minggu);
                                        $this->db->where('waktu_praktikum <=', $rekap_akhir_minggu);
                                        $rekap_col = $this->db->get('rekap_absen')->result_array();

                                        $rekap_awal_minggu = date('Y-m-d', strtotime($rekap_awal_minggu. ' +6 day'));
                                        $rekap_akhir_minggu = date('Y-m-d', strtotime($rekap_akhir_minggu. ' +6 day'));
                                    ?>

                                    <td style="font:10pt Arial; text-align: right; border-bottom:0.5px solid #000; border-right:1px solid #000;">
                                        <?php
                                        $asisten_pagi = 0;
                                        foreach ($rekap_col as $data_rekap){
                                            if ( $asist['nama_lengkap'] == $data_rekap['nama_asisten_rekap']){
                                                if ($data_rekap['role_rekap'] == 'Asisten' && $data_rekap['kategori_shift_rekap'] == 'Pagi'  && $data_rekap['lab_tingkat_rekap'] == $lab) {
                                                    $asisten_pagi = $asisten_pagi + $data_rekap['nilai_rekap'];
                                                }
                                            }
                                        }
                                        echo $asisten_pagi;
                                        ?>
                                    </td>
                                    <td style="font:10pt Arial; text-align: right; border-bottom:0.5px solid #000; border-right:1px solid #000;">
                                        <?php
                                        $asisten_malam = 0;
                                        foreach ($rekap_col as $data_rekap){
                                            if ( $asist['nama_lengkap'] == $data_rekap['nama_asisten_rekap']){
                                                if ($data_rekap['role_rekap'] == 'Asisten' && $data_rekap['kategori_shift_rekap'] == 'Malam' && $data_rekap['lab_tingkat_rekap'] == $lab) {
                                                    $asisten_malam = $asisten_malam + $data_rekap['nilai_rekap'];
                                                }
                                            }
                                        }
                                        echo $asisten_malam;
                                        ?>
                                    </td>
                                    <td style="font:10pt Arial; text-align: right; border-bottom:0.5px solid #000; border-right:1px solid #000;">
                                        <?php
                                        $pj_pagi = 0;
                                        foreach ($rekap_col as $data_rekap){
                                            if ( $asist['nama_lengkap'] == $data_rekap['nama_asisten_rekap']){
                                                if ($data_rekap['role_rekap'] == 'PJ' && $data_rekap['kategori_shift_rekap'] == 'Pagi' && $data_rekap['lab_tingkat_rekap'] == $lab) {
                                                    $pj_pagi = $pj_pagi + $data_rekap['nilai_rekap'];
                                                }
                                            }
                                        }
                                        echo $pj_pagi;
                                        ?>
                                    </td>
                                    <td style="font:10pt Arial; text-align: right; border-bottom:0.5px solid #000; border-right:3px solid #000;">
                                        <?php
                                        $pj_malam = 0;
                                        foreach ($rekap_col as $data_rekap){
                                            if ( $asist['nama_lengkap'] == $data_rekap['nama_asisten_rekap']){
                                                if ($data_rekap['role_rekap'] == 'PJ' && $data_rekap['kategori_shift_rekap'] == 'Malam' && $data_rekap['lab_tingkat_rekap'] == $lab) {
                                                    $pj_malam = $pj_malam + $data_rekap['nilai_rekap'];
                                                }
                                            }
                                        }
                                        echo $pj_malam;
                                        ?>
                                    </td>
                                    <?php } ?>
                                    <td style="font:10pt Arial; text-align: right; border-bottom:0.5px solid #000; border-right:1px solid #000;">
                                        <?php
                                        $asisten_pagi = 0;
                                        foreach ($rekap as $data_rekap){
                                            if ( $asist['nama_lengkap'] == $data_rekap['nama_asisten_rekap']){
                                                if ($data_rekap['role_rekap'] == 'Asisten' && $data_rekap['kategori_shift_rekap'] == 'Pagi' && $data_rekap['lab_tingkat_rekap'] == $lab) {
                                                    $asisten_pagi = $asisten_pagi + $data_rekap['nilai_rekap'];
                                                }
                                            }
                                        }
                                        echo $asisten_pagi;
                                        ?>
                                    </td>
                                    <td style="font:10pt Arial; text-align: right; border-bottom:0.5px solid #000; border-right:1px solid #000;">
                                        <?php
                                        $asisten_malam = 0;
                                        foreach ($rekap as $data_rekap){
                                            if ( $asist['nama_lengkap'] == $data_rekap['nama_asisten_rekap']){
                                                if ($data_rekap['role_rekap'] == 'Asisten' && $data_rekap['kategori_shift_rekap'] == 'Malam' && $data_rekap['lab_tingkat_rekap'] == $lab) {
                                                    $asisten_malam = $asisten_malam + $data_rekap['nilai_rekap'];
                                                }
                                            }
                                        }
                                        echo $asisten_malam;
                                        ?>
                                    </td>
                                    <td style="font:10pt Arial; text-align: right; border-bottom:0.5px solid #000; border-right:1px solid #000;">
                                        <?php
                                        $pj_pagi = 0;
                                        foreach ($rekap as $data_rekap){
                                            if ( $asist['nama_lengkap'] == $data_rekap['nama_asisten_rekap']){
                                                if ($data_rekap['role_rekap'] == 'PJ' && $data_rekap['kategori_shift_rekap'] == 'Pagi' && $data_rekap['lab_tingkat_rekap'] == $lab) {
                                                    $pj_pagi = $pj_pagi + $data_rekap['nilai_rekap'];
                                                }
                                            }
                                        }
                                        echo $pj_pagi;
                                        ?>
                                    </td>
                                    <td style="font:10pt Arial; text-align: right; border-bottom:0.5px solid #000; border-right:3px solid #000;">
                                        <?php
                                        $pj_malam = 0;
                                        foreach ($rekap as $data_rekap){
                                            if ( $asist['nama_lengkap'] == $data_rekap['nama_asisten_rekap']){
                                                if ($data_rekap['role_rekap'] == 'PJ' && $data_rekap['kategori_shift_rekap'] == 'Malam' && $data_rekap['lab_tingkat_rekap'] == $lab) {
                                                    $pj_malam = $pj_malam + $data_rekap['nilai_rekap'];
                                                }
                                            }
                                        }
                                        echo $pj_malam;
                                        ?>
                                    </td>
                                    <?php } ?>
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

  <!-- js laporan rekap -->
  <script>
    var tableToExcel = (function () {
        var uri = 'data:application/vnd.ms-excel;base64,',
            template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
            , base64 = function (s) {
                return window.btoa(unescape(encodeURIComponent(s)))
            }
            , format = function (s, c) {
                return s.replace(/{(\w+)}/g, function (m, p) {
                    return c[p];
                })
            };
        return function (table, name) {
            if (!table.nodeType) table = document.getElementById(table);
            var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML};
            window.location.href = uri + base64(format(template, ctx));
        }
    })();

    $(document).ready(function() {
        $('#rekap_min').datepicker();
        $('#rekap_max').datepicker();
    });
  </script>
  <!-- js laporan rekap end-->