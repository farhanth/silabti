 <!-- partial -->
 <div class="main-panel">
     <div class="content-wrapper">
         <div class="page-header">
             <h3 class="page-title">
                 <span class="page-title-icon bg-gradient-info text-white mr-2">
                    <i class="mdi mdi-calendar-multiple-check"></i>
                 </span>
                 Laporan Rekap Absen (Total)
             </h3>
        </div>
        <div class="row">
         <div class="col-md-12 grid-margin stretch-card">
             <div class="card">
                 <div class="card-body">
                    <div class="table-responsive">
                         <?php 
                         $tanggal_awal = strtotime($this->input->post('rekap_min'));
                         $tanggal_akhir = strtotime($this->input->post('rekap_max'). ' +1 day');
                         ?>
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
                                    <th rowspan="2" style="min-width: 64px; display:none;"></th>
                                    <th rowspan="2" style="font:9pt Arial; font-weight:bold; width: 39px; vertical-align: middle; text-align: center;  background: #c0c0c0; border:1px solid #000;">
                                        NO
                                     </th>
                                     <th rowspan="2" style="font:9pt Arial; font-weight:bold; width: 121px; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:1px solid #000; border-top:1px solid #000;">
                                        NO. REKENING
                                     </th>
                                     <th rowspan="2" style="font:9pt Arial; font-weight:bold; width: 240px; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:3px solid #000; border-top:1px solid #000;">
                                        NAMA ASISTEN
                                     </th>
                                     <?php foreach ($tingkat_lab as $lab): ?>
                                         <th colspan="4" style="font:9pt Arial; font-weight:bold; width: 156px; vertical-align: middle; text-align: center; background: #c0c0c0; border-right:3px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;">
                                            <?=strtoupper($lab)?>
                                         </th>
                                     <?php endforeach ?>
                                     <th colspan="4" style="font:9pt Arial; font-weight:bold; width: 156px; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:3px solid #000; border-top:1px solid #000;">
                                        TOTAL
                                     </th>
                                     <th style="font:10pt Arial; width: 93px; vertical-align: middle; text-align: center;">
                                         Rupiah
                                     </th>
                                 </tr>
                                 <tr>
                                     <?php foreach ($tingkat_lab as $lab): ?>
                                     <th style="font:9pt Arial; font-weight:bold; width: 39px; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:1px solid #000;">
                                         AP
                                     </th>
                                     <th style="font:9pt Arial; font-weight:bold; width: 39px; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:1px solid #000;">
                                         AM
                                     </th>
                                     <th style="font:9pt Arial; font-weight:bold; width: 39px; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:1px solid #000;">
                                         KP
                                     </th>
                                     <th style="font:9pt Arial; font-weight:bold; width: 39px; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:3px solid #000;">
                                         KM
                                     </th>
                                     <?php endforeach ?>
                                     <th style="font:9pt Arial; font-weight:bold; width: 39px; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:1px solid #000;">
                                         AP
                                     </th>
                                     <th style="font:9pt Arial; font-weight:bold; width: 39px; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:1px solid #000;">
                                         AM
                                     </th>
                                     <th style="font:9pt Arial; font-weight:bold; width: 39px; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:1px solid #000;">
                                         KP
                                     </th>
                                     <th style="font:9pt Arial; font-weight:bold; width: 39px; vertical-align: middle; text-align: center; background: #c0c0c0; border-bottom:1px solid #000; border-right:3px solid #000;">
                                         KM
                                     </th>
                                 </tr>
                             </thead>
                             <tbody>
                             <?php 
                             $no = 1;
                             foreach ($asisten as $asist):
                             $no_rek = $this->encryption->decrypt($asist['no_rek']);?>
                                <tr>
                                    <td style="min-width: 64px; display:none;"></td>
                                    <td style="text-align: center; border-bottom:0.5px solid #000; border-right:1px solid #000; border-left:1px solid #000;"><?=$no++?></td>
                                    <td style="text-align: center; border-bottom:0.5px solid #000; border-right:1px solid #000;"><?=$no_rek?></td>
                                    <td style="border-bottom:0.5px solid #000; border-right:3px solid #000;"><?=$asist['nama_lengkap']?></td>
                                    <?php
                                    $asisten_pagi_total = 0;
                                    $asisten_malam_total = 0;
                                    $pj_pagi_total = 0;
                                    $pj_malam_total = 0;
                                    foreach ($tingkat_lab as $lab): ?>
                                    <td style="font:10pt Arial; text-align: right; border-bottom:0.5px solid #000; border-right:1px solid #000;">
                                        <?php
                                        $asisten_pagi = 0;
                                        foreach ($rekap as $data_rekap){
                                            if ( $asist['nama_lengkap'] == $data_rekap['nama_asisten_rekap']){
                                                if ($data_rekap['role_rekap'] == 'Asisten' && $data_rekap['kategori_shift_rekap'] == 'Pagi' && $data_rekap['lab_tingkat_rekap'] == $lab) {
                                                    $asisten_pagi = $asisten_pagi + $data_rekap['nilai_rekap'];
                                                    $asisten_pagi_total = $asisten_pagi_total + $data_rekap['nilai_rekap'];
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
                                                    $asisten_malam_total = $asisten_malam_total + $data_rekap['nilai_rekap'];
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
                                                    $pj_pagi_total = $pj_pagi_total + $data_rekap['nilai_rekap'];
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
                                                    $pj_malam_total = $pj_malam_total + $data_rekap['nilai_rekap'];
                                                }
                                            }
                                        }
                                        echo $pj_malam;
                                        ?>
                                    </td>
                                    <?php endforeach ?>
                                    <td style="font:10pt Arial; text-align: right; border-bottom:0.5px solid #000; border-right:1px solid #000;"><?=$asisten_pagi_total?></td>
                                    <td style="font:10pt Arial; text-align: right; border-bottom:0.5px solid #000; border-right:1px solid #000;"><?=$asisten_malam_total?></td>
                                    <td style="font:10pt Arial; text-align: right; border-bottom:0.5px solid #000; border-right:1px solid #000;"><?=$pj_pagi_total?></td>
                                    <td style="font:10pt Arial; text-align: right; border-bottom:0.5px solid #000; border-right:3px solid #000;"><?=$pj_malam_total?></td>
                                    <td class="text-center">
                                        <?php
                                        $asisten_pagi_rupiah = 0;
                                        $asisten_malam_rupiah = 0;
                                        $pj_pagi_rupiah = 0;
                                        $pj_malam_rupiah = 0;
                                        $total_rupiah = 0;
                                        foreach ($tingkat_lab as $lab){
                                            foreach ($honor_perjam as $honor){
                                                if ($honor['lab_tingkat'] == $lab && $honor['role'] == 'Asisten' && $honor['kategori_shift'] == 'Pagi') {
                                                    $honor_val = $honor['gaji_perjam'] * $honor['variabel1'] * $honor['variabel2'];;
                                                    $asisten_pagi_rupiah = intval($honor_val) * $asisten_pagi_total;
                                                    $total_rupiah = $total_rupiah + $asisten_pagi_rupiah;
                                                }
                                                if ($honor['lab_tingkat'] == $lab && $honor['role'] == 'Asisten' && $honor['kategori_shift'] == 'Malam') {
                                                    $honor_val = $honor['gaji_perjam'] * $honor['variabel1'] * $honor['variabel2'];;
                                                    $asisten_malam_rupiah = intval($honor_val) * $asisten_malam_total;
                                                    $total_rupiah = $total_rupiah + $asisten_malam_rupiah;
                                                }
                                                if ($honor['lab_tingkat'] == $lab && $honor['role'] == 'PJ' && $honor['kategori_shift'] == 'Pagi') {
                                                    $honor_val = $honor['gaji_perjam'] * $honor['variabel1'] * $honor['variabel2'];;
                                                    $pj_pagi_rupiah = intval($honor_val) * $pj_pagi_total;
                                                    $total_rupiah = $total_rupiah + $pj_pagi_rupiah;
                                                }
                                                if ($honor['lab_tingkat'] == $lab && $honor['role'] == 'PJ' && $honor['kategori_shift'] == 'Malam') {
                                                    $honor_val = $honor['gaji_perjam'] * $honor['variabel1'] * $honor['variabel2'];;
                                                    $pj_malam_rupiah = intval($honor_val) * $pj_malam_total;
                                                    $total_rupiah = $total_rupiah + $pj_malam_rupiah;
                                                }
                                            }
                                            break;
                                        }
                                        echo $total_rupiah;
                                        ?>
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