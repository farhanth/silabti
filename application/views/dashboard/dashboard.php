 <!-- partial -->
 <div class="main-panel">
     <div class="content-wrapper">
         <div class="page-header">
             <h3 class="page-title">
                 <span class="page-title-icon bg-gradient-info text-white mr-2">
                    <i class="mdi mdi-home"></i>
                 </span>
                 Dashboard (<?=$this->session->userdata('semester'). " ".$this->session->userdata('tahun_awal')."/".$this->session->userdata('tahun_akhir')?>)
             </h3>
         </div>
         <div class="flashdata-dashboard" data-flashdata="<?=$this->session->flashdata('message_ganti_password');?>"></div>
         <div class="row">
             <div class="col-md-6 stretch-card grid-margin">
                 <div class="card bg-gradient-danger card-img-holder text-white">
                     <div class="card-body">
                         <img src="<?= base_url('asset/images/dashboard/circle.svg') ?>" class="card-img-absolute" alt="circle-image" />
                         <h3 class="font-weight-normal mb-3">Jadwal PJ dan Asisten
                             <i class="mdi mdi-calendar-clock mdi-24px float-right"></i>
                         </h3>
                         <h2 class="mb-4"><?=count($jadwal)?></h2>
                         <h5 class="card-text">
                            <a href="#jadwal" class="text-white text-decoration-none">Cek Jadwalmu</a>
                         </h5>
                     </div>
                 </div>
             </div>
             <div class="col-md-6 stretch-card grid-margin">
                 <div class="card bg-gradient-info card-img-holder text-white">
                     <div class="card-body">
                         <img src="<?= base_url('asset/images/dashboard/circle.svg') ?>" class="card-img-absolute" alt="circle-image" />
                         <h3 class="font-weight-normal mb-3">Jumlah Rekap Absen
                             <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                         </h3>
                         <h2 class="mb-4"><?=count($rekap)?></h2>
                         <h5 class="card-text">
                            <a href="<?=base_url('dashboard/rekap')?>" class="text-white text-decoration-none">Cek Rekapmu</a>
                         </h5>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-md-7 grid-margin stretch-card">
                 <div class="card">
                     <div class="card-body">
                         <div class="clearfix">
                             <h4 class="card-title float-left">Grafik Jaga Semester Ini</h4>
                             <div id="rekap-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                         </div>
                         <canvas id="rekap-chart" class="mt-4"></canvas>
                     </div>
                 </div>
             </div>
             <div class="col-md-5 grid-margin stretch-card">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="card-title">Persentase Jadwal</h4>
                         <canvas id="jadwal-chart"></canvas>
                         <div id="jadwal-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row" id="jadwal">
             <div class="col-12 grid-margin">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="card-title">Jadwal Jaga</h4>
                         <div class="table-responsive">
                             <table class="table">
                                 <thead>
                                     <tr>
                                         <th>
                                             Hari
                                         </th>
                                         <th>
                                             Jam
                                         </th>
                                         <th>
                                             Kelas
                                         </th>
                                         <th>
                                             Mata Praktikum
                                         </th>
                                         <th>
                                             Role
                                         </th>
                                         <th>
                                             Ruang
                                         </th>
                                         <th>
                                             Tanggal Mulai
                                         </th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    <?php foreach ($jadwal as $data): ?>
                                     <tr>
                                         <td>
                                             <?=$data['hari']?>
                                         </td>
                                         <td>
                                            <?php if (substr($data['ruang'], 0, 1) == "H") {
                                                if ($data['shift'] == "1") {
                                                    echo "08:00 - 10:00";
                                                } elseif (($data['shift'] == "2")){
                                                    echo "10:00 - 12:00";
                                                } elseif (($data['shift'] == "3")){
                                                    echo "12:00 - 14:00";
                                                } elseif (($data['shift'] == "4")){
                                                    echo "14:00 - 16:00";
                                                } elseif (($data['shift'] == "5")){
                                                    echo "16:00 - 18:00";
                                                }
                                            } elseif(substr($data['ruang'], 0, 1) == "E"){
                                                if ($data['shift'] == "1") {
                                                    echo "07:30 - 09:30";
                                                } elseif (($data['shift'] == "2")){
                                                    echo "09:30 - 11:30";
                                                } elseif (($data['shift'] == "3")){
                                                    echo "11:30 - 13:30";
                                                } elseif (($data['shift'] == "4")){
                                                    echo "13:30 - 15:30";
                                                } elseif (($data['shift'] == "5")){
                                                    echo "15:30 - 17:30";
                                                }
                                            } ?>
                                        </td>
                                        <td>
                                             <?=$data['kelas_jadwal']?>
                                        </td>
                                        <td>
                                             <?=$data['matprak']?>
                                         </td>
                                         <td>
                                             <?=$data['role']?>
                                         </td>
                                         <td>
                                             <?=$data['ruang']?>
                                         </td>
                                        <td>
                                            <?php if ($data['tanggal_mulai'] === NULL || $data['tanggal_mulai'] === "0000-00-00") {
                                                echo "Belum ditentukan";
                                            }else{
                                                echo date('d M Y', strtotime($data['tanggal_mulai']));
                                            } ?>
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
         <!-- <div class="row">
             <div class="col-12 grid-margin stretch-card">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="card-title">Tabel Jadwal Keseluruhan</h4>
                         <div class="d-flex">
                             <div class="d-flex align-items-center text-muted font-weight-light">
                                 <i class="mdi mdi-clock icon-sm mr-2"></i>
                                 <span>Terakhir diupdate : October 3rd, 2018</span>
                             </div>
                         </div>
                         <div class="row mt-3">
                             <div class="col-md-6 mb-1 px-1">
                                 <img src="<?= base_url('asset/images/dashboard/img_1.jpg') ?>" class="mb-2 mw-100 w-100 rounded" alt="image">
                                 <img src="<?= base_url('asset/images/dashboard/img_4.jpg') ?>" class="mw-100 w-100 rounded" alt="image">
                             </div>
                             <div class="col-md-6 px-1">
                                 <img src="<?= base_url('asset/images/dashboard/img_2.jpg') ?>" class="mb-2 mw-100 w-100 rounded" alt="image">
                                 <img src="<?= base_url('asset/images/dashboard/img_3.jpg') ?>" class="mw-100 w-100 rounded" alt="image">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div> -->
         <div class="row">
             <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="card-title">Log Aktifitas</h4>
                         <div class="table-responsive">
                             <table class="table">
                                 <thead>
                                     <tr>
                                         <th width="65%"></th>
                                         <th width="35%"></th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php 
                                     if (count($log) < 5) {
                                         $counter = count($log);
                                     } else{
                                        $counter = 5;
                                     }
                                     for ($i=0; $i < $counter; $i++) { ?>
                                     <?php if ($log[$i]['kategori'] == "Login" || $log[$i]['kategori'] == "Absen Asisten"):?>
                                     <tr>
                                         <td width="65%">
                                             <?php if ($log[$i]['kategori'] == "Login"): ?>
                                                 <p>Anda telah login</p>
                                             <?php elseif ($log[$i]['kategori'] == "Absen Asisten"):?>
                                                 <p><?=$log[$i]['deskripsi'];?></p>
                                            <?php endif ?>
                                         </td>
                                         <td width="35%" class="text-right">
                                             <?php if ($log[$i]['kategori'] == "Login"): ?>
                                                 <p><?=date('d M Y - G:i', strtotime($log[$i]['waktu']))?></p>
                                             <?php elseif ($log[$i]['kategori'] == "Absen Asisten"):?>
                                                 <p><?=date('d M Y - G:i', strtotime($log[$i]['waktu']))?></p>
                                             <?php endif ?>
                                         </td>
                                     </tr>
                                     <?php endif ?>
                                     <?php } ?>
                                     <tr>
                                         <td class="text-right" colspan="2">
                                            <a href="<?=base_url('dashboard/log')?>" class="text-decoration-none">
                                                <p>Lihat Seluruh Log</p>
                                            </a>
                                         </td>
                                     </tr>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- content-wrapper ends -->
     <!-- partial:partials/_footer.html -->
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

 <?php
 $counter_tk1 = 0;
 $counter_tk2 = 0;
 $counter_tk3 = 0;
 $counter_tk4 = 0;
 foreach ($jadwal as $data_counter) {
     $tingkat = substr($data_counter['kelas_jadwal'], 0,1);
     if ($tingkat == 1) {
         $counter_tk1++;
     } elseif ($tingkat == 2) {
         $counter_tk2++;
     } elseif ($tingkat == 3) {
         $counter_tk3++;
     } elseif ($tingkat == 4) {
         $counter_tk4++;
     }
 }

 $semester = $this->session->userdata('semester');
 $tahun_awal = $this->session->userdata('tahun_awal');
 $tahun_akhir = $this->session->userdata('tahun_akhir');
 $keyword = $this->session->userdata('nama_lengkap');

 if ($semester == "PTA") {
     $bulan_tahun = [$tahun_awal.'-09', $tahun_awal.'-10', $tahun_awal.'-11', $tahun_awal.'-12', $tahun_akhir.'-01', $tahun_akhir.'-02'];
     $label = ['SEP', 'OCT', 'NOV', 'DEC', 'JAN', 'FEB'];
 } elseif ($semester == "ATA"){
     $bulan_tahun = [$tahun_akhir.'-03', $tahun_akhir.'-04', $tahun_akhir.'-05', $tahun_akhir.'-06', $tahun_akhir.'-07', $tahun_akhir.'-08'];
     $label = ['MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG'];
 }

 $counter_pj_array = [];
 $counter_asist_array = [];
 foreach ($bulan_tahun as $date) {
     $counter_pj = 0;
     $counter_asist = 0;
     $this->db->where('nama_asisten_rekap', $keyword);
     $this->db->where("DATE_FORMAT(waktu_praktikum,'%Y-%m')", $date);
     $rekap_bulanan = $this->db->get('rekap_absen')->result_array();

     foreach ($rekap_bulanan as $rekap_counter) {
         if ($rekap_counter['role_rekap'] == 'PJ') {
             $counter_pj++;
         } elseif ($rekap_counter['role_rekap'] == 'Asisten') {
            $counter_asist++;
         }
     }
     array_push($counter_pj_array, $counter_pj);
     array_push($counter_asist_array, $counter_asist);
 }
 ?>

 <script>
     (function($) {
     'use strict';
     $(function() {
     Chart.defaults.global.legend.labels.usePointStyle = true;

     if ($("#rekap-chart").length) {
      Chart.defaults.global.legend.labels.usePointStyle = true;
      var ctx = document.getElementById('rekap-chart').getContext("2d");

      var counter_pj_array = '<?=json_encode($counter_pj_array)?>';
      var counter_asist_array = '<?=json_encode($counter_asist_array)?>';
      var label = '<?=json_encode($label)?>'
      var max_data = [Math.max.apply(Math,JSON.parse(counter_pj_array)), Math.max.apply(Math,JSON.parse(counter_asist_array))];
      var max_all_data = Math.max.apply(Math,max_data);
      var max_bar_chart = 10;
      if (max_all_data > max_bar_chart) {
          max_bar_chart = max_all_data;
      }

      var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
      gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
      gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');
      var gradientLegendViolet = 'linear-gradient(to right, rgba(218, 140, 255, 1), rgba(154, 85, 255, 1))';
      
      var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 360);
      gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
      gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
      var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

      var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
      gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
      var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: JSON.parse(label),
            datasets: [
              {
                label: "PJ",
                borderColor: gradientStrokeViolet,
                backgroundColor: gradientStrokeViolet,
                hoverBackgroundColor: gradientStrokeViolet,
                legendColor: gradientLegendViolet,
                pointRadius: 0,
                fill: false,
                borderWidth: 1,
                fill: 'origin',
                data: JSON.parse(counter_pj_array)
              },
              {
                label: "Asisten",
                borderColor: gradientStrokeRed,
                backgroundColor: gradientStrokeRed,
                hoverBackgroundColor: gradientStrokeRed,
                legendColor: gradientLegendRed,
                pointRadius: 0,
                fill: false,
                borderWidth: 1,
                fill: 'origin',
                data: JSON.parse(counter_asist_array)
              }
          ]
        },
        options: {
          responsive: true,
          legend: false,
          legendCallback: function(chart) {
            var text = []; 
            text.push('<ul>'); 
            for (var i = 0; i < chart.data.datasets.length; i++) { 
                text.push('<li><span class="legend-dots" style="background:' + 
                           chart.data.datasets[i].legendColor + 
                           '"></span>'); 
                if (chart.data.datasets[i].label) { 
                    text.push(chart.data.datasets[i].label); 
                } 
                text.push('</li>'); 
            } 
            text.push('</ul>'); 
            return text.join('');
          },
          scales: {
              yAxes: [{
                  ticks: {
                      display: true,
                      min: 0,
                      stepSize: 5,
                      max: max_bar_chart
                  },
                  gridLines: {
                    drawBorder: false,
                    color: 'rgba(235,237,242,1)',
                    zeroLineColor: 'rgba(235,237,242,1)'
                  }
              }],
              xAxes: [{
                  gridLines: {
                    display:false,
                    drawBorder: false,
                    color: 'rgba(0,0,0,1)',
                    zeroLineColor: 'rgba(235,237,242,1)'
                  },
                  ticks: {
                      padding: 20,
                      fontColor: "#9c9fa6",
                      autoSkip: true,
                  },
                  categoryPercentage: 0.5,
                  barPercentage: 0.5
              }]
            }
          },
          elements: {
            point: {
              radius: 0
            }
          }
      })
      $("#rekap-chart-legend").html(myChart.generateLegend());
     }

     if ($("#jadwal-chart").length) {
      var counter_tk1 = '<?=$counter_tk1?>';
      var counter_tk2 = '<?=$counter_tk2?>';
      var counter_tk3 = '<?=$counter_tk3?>';
      var counter_tk4 = '<?=$counter_tk4?>';
      var counter_tk_total = parseInt(counter_tk1) + parseInt(counter_tk2) + parseInt(counter_tk3) + parseInt(counter_tk4);
      var counter_tk1_persen = 100/(counter_tk_total/counter_tk1);
      var counter_tk2_persen = 100/(counter_tk_total/counter_tk2);
      var counter_tk3_persen = 100/(counter_tk_total/counter_tk3);
      var counter_tk4_persen = 100/(counter_tk_total/counter_tk4);

      var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 181);
      gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
      gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
      var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

      var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 50);
      gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
      gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
      var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

      var gradientStrokeGreen = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStrokeGreen.addColorStop(0, 'rgba(6, 185, 157, 1)');
      gradientStrokeGreen.addColorStop(1, 'rgba(132, 217, 210, 1)');
      var gradientLegendGreen = 'linear-gradient(to right, rgba(6, 185, 157, 1), rgba(132, 217, 210, 1))';

      var gradientStrokeYellow = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStrokeYellow.addColorStop(0, 'rgba(194, 194, 48, 1)');
      gradientStrokeYellow.addColorStop(1, 'rgba(227, 227, 136, 1)');
      var gradientLegendYellow = 'linear-gradient(to right, rgba(194, 194, 48, 1), rgba(227, 227, 136, 1))';

      var trafficChartData = {
        datasets: [{
          data: [counter_tk1_persen.toFixed(2), counter_tk2_persen.toFixed(2), counter_tk3_persen.toFixed(2), counter_tk4_persen.toFixed(2)],
          backgroundColor: [
            gradientStrokeBlue,
            gradientStrokeGreen,
            gradientStrokeRed,
            gradientStrokeYellow
          ],
          hoverBackgroundColor: [
            gradientStrokeBlue,
            gradientStrokeGreen,
            gradientStrokeRed,
            gradientStrokeYellow
          ],
          borderColor: [
            gradientStrokeBlue,
            gradientStrokeGreen,
            gradientStrokeRed,
            gradientStrokeYellow
          ],
          legendColor: [
            gradientLegendBlue,
            gradientLegendGreen,
            gradientLegendRed,
            gradientLegendYellow
          ]
        }],
    
        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
          'Tingkat 1',
          'Tingkat 2',
          'Tingkat 3',
          'Tingkat 4'
        ]
      };
      var trafficChartOptions = {
        responsive: true,
        animation: {
          animateScale: true,
          animateRotate: true
        },
        legend: false,
        legendCallback: function(chart) {
          var text = []; 
          text.push('<ul>'); 
          for (var i = 0; i < trafficChartData.datasets[0].data.length; i++) { 
              text.push('<li><span class="legend-dots" style="background:' + 
              trafficChartData.datasets[0].legendColor[i] + 
                          '"></span>'); 
              if (trafficChartData.labels[i]) { 
                  text.push(trafficChartData.labels[i]); 
              }
              text.push('<span class="float-right">'+trafficChartData.datasets[0].data[i]+"%"+'</span>')
              text.push('</li>'); 
          } 
          text.push('</ul>'); 
          return text.join('');
        }
      };
      var trafficChartCanvas = $("#jadwal-chart").get(0).getContext("2d");
      var trafficChart = new Chart(trafficChartCanvas, {
        type: 'doughnut',
        data: trafficChartData,
        options: trafficChartOptions
      });
      $("#jadwal-chart-legend").html(trafficChart.generateLegend());      
     }
     if ($("#inline-datepicker").length) {
         $('#inline-datepicker').datepicker({
            enableOnReadonly: true,
            todayHighlight: true,
         });
     }
     });
     })(jQuery);
 </script>