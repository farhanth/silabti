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
                         <table class="table table-bordered table-hover" id="dataTable_laporan_rekap">
                             <thead>
                                 <tr>
                                    <th class="align-middle text-center border-head">
                                        No.
                                     </th>
                                     <th class="align-middle text-center border-head">
                                        No. Rekening
                                     </th>
                                     <th class="align-middle text-center border-head-bold">
                                        Nama Lengkap
                                     </th>
                                     <?php foreach ($tingkat_lab as $lab):
                                     if ($lab == "Dasar") {
                                         $text = "D";
                                     }
                                     elseif ($lab == "Menengah"){
                                        $text = "M";
                                     }
                                     elseif ($lab == "Lanjut"){
                                        $text = "L";
                                     }?>
                                     <th class="text-center border-head">
                                         AP_<?=$text?>
                                     </th>
                                     <th class="text-center border-head">
                                         AM_<?=$text?>
                                     </th>
                                     <th class="text-center border-head">
                                         KP_<?=$text?>
                                     </th>
                                     <th class="text-center border-head-bold">
                                         KM_<?=$text?>
                                     </th>
                                     <?php endforeach ?>
                                     <th class="text-center border-head">
                                         AP_T
                                     </th>
                                     <th class="text-center border-head">
                                         AM_T
                                     </th>
                                     <th class="text-center border-head">
                                         KP_T
                                     </th>
                                     <th class="text-center border-head-bold">
                                         KM_T
                                     </th>
                                     <th class="text-center bottom-only">
                                         Rupiah
                                     </th>
                                 </tr>
                             </thead>
                             <tbody>
                             <?php 
                             $no = 1;
                             foreach ($asisten as $asist):
                             $no_rek = $this->encryption->decrypt($asist['no_rek']);?>
                                <tr>
                                    <td class="text-center border-body"><?=$no++?></td>
                                    <td class="text-center border-body"><?=$no_rek?></td>
                                    <td class="border-body-bold"><?=$asist['nama_lengkap']?></td>
                                    <?php
                                    $asisten_pagi_total = 0;
                                    $asisten_malam_total = 0;
                                    $pj_pagi_total = 0;
                                    $pj_malam_total = 0;
                                    foreach ($tingkat_lab as $lab): ?>
                                    <td class="text-center border-body">
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
                                    <td class="text-center border-body">
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
                                    <td class="text-center border-body">
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
                                    <td class="text-center border-body-bold">
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
                                    <td class="text-center border-body"><?=$asisten_pagi_total?></td>
                                    <td class="text-center border-body"><?=$asisten_malam_total?></td>
                                    <td class="text-center border-body"><?=$pj_pagi_total?></td>
                                    <td class="text-center border-body-bold"><?=$pj_malam_total?></td>
                                    <td class="text-center bottom-only">
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
                         <button type="button btn-lg btn-success" onclick="tableToExcel('dataTable_laporan_rekap','Export Name')">
                             test
                         </button>
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