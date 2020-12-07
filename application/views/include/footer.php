</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- myform validation js -->
<script src="<?= base_url('/asset/js/myvalidation.js') ?>"></script>
<!-- myform validation js end -->

<!-- form validation js -->
<script>
    (function() {
     'use strict';
     window.addEventListener('load', function() {
    	// Fetch all the forms we want to apply custom Bootstrap validation styles to
    	var forms = document.getElementsByClassName('needs-validation');
    	// Loop over them and prevent submission
    	var validation = Array.prototype.filter.call(forms, function(form) {
    		form.addEventListener('submit', function(event) {
    			if (form.checkValidity() === false) {
    				event.preventDefault();
    				event.stopPropagation();
    			}
    			form.classList.add('was-validated');
    		}, false);
    	});
    }, false);
 })();
</script>
<!-- form validation js end -->

<!-- phone number text only js-->
<script>
    function onlyNumberKey(evt) { 
        // Only ASCII charactar in that range allowed 
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
            return false; 
        return true; 
    } 
</script>
<!-- phone number text only js end-->


<!-- dataTable js  -->
<!-- dataTable jadwal asisten -->
<script>
    $(document).ready(function() {
        var role = "<?php echo $this->session->userdata('jabatan');?>";

        var table_jadwal = $('#dataTable_jadwal').DataTable( {
            "columnDefs": [ {
                'targets': 'no-sort',
                'searchable': false,
                'orderable': false
            } ],
            dom: 'Bfrtip',
            buttons: [{
               extend: 'excel',
               className: 'btn btn-info buttons-excel buttons-html5',
               text: 'Export to Excel',
               autoFilter: true
           }]
        } );

        table_jadwal.on( 'order.dt search.dt', function () {
            table_jadwal.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();

        if(role == "Asisten"){
            table_jadwal.button(0).remove();
        }else {
            table_jadwal.button(0).add();
        }
    });
</script>
<!-- dataTable jadwal asisten end-->

<!-- dataTable asisten -->
<script>
    $(document).ready(function() {
        var role = "<?php echo $this->session->userdata('jabatan');?>";

        var table_asisten = $('#dataTable_asisten').DataTable( {
            "columnDefs": [ {
                'targets': 'no-sort',
                'searchable': false,
                'orderable': false
            } ],
            "order": [[ 4, 'asc' ], [ 1, 'asc' ]],
            dom: 'Bfrtip',
            buttons: [{
               extend: 'excel',
               className: 'btn btn-info buttons-excel buttons-html5',
               text: 'Export to Excel',
               autoFilter: true
           }]
        } );

        table_asisten.on( 'order.dt search.dt', function () {
            table_asisten.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();

        if(role == "Asisten"){
            table_asisten.button(0).remove();
        }else {
            table_asisten.button(0).add();
        }
    });
</script>
<!-- dataTable asisten end-->

<!-- dataTable matprak -->
<script>
    $(document).ready(function() {
        var role = "<?php echo $this->session->userdata('jabatan');?>";

        var table_matprak = $('#dataTable_matprak').DataTable( {
            "columnDefs": [ {
                'targets': 'no-sort',
                'searchable': false,
                'orderable': false
            } ],
            "order": [[ 3, 'desc' ], [ 2, 'asc' ]],
            dom: 'Bfrtip',
            buttons: [{
               extend: 'excel',
               className: 'btn btn-info buttons-excel buttons-html5',
               text: 'Export to Excel',
               autoFilter: true
           }]
        } );

        table_matprak.on( 'order.dt search.dt', function () {
            table_matprak.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();

        if(role == "Asisten"){
            table_matprak.button(0).remove();
        }else {
            table_matprak.button(0).add();
        }
    });
</script>
<!-- dataTable matprak end-->

<!-- dataTable laporan -->
<script>
    $(document).ready(function() {
        var table_laporan_rekap = $('#dataTable_laporan_rekap').DataTable( {
            "columnDefs": [ {
                "bSortable": false,
                "aTargets": [ "_all" ]
            } ],
            "paging": false,
           //  dom: 'Bfrtip',
           //  buttons: [{
           //     extend: 'excel',
           //     className: 'btn btn-info buttons-excel mb-3 buttons-html5',
           //     text: 'Export to Excel',
           //     autoFilter: true
           // }]
        } );
    });
</script>
<!-- dataTable laporan end-->
<!-- dataTable js  end-->

<!-- prevent enter form  -->
<script>
    $('form input'). keydown(function (e) {
        if (e. keyCode == 13) {
            e. preventDefault();
            return false;
        }
    });
</script>
<!-- prevent enter form  end-->
<!-- sweetalertjs -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="<?= base_url('/asset/js/myswal.js') ?>"></script>
<!-- end sweetalertjs -->
<!-- selectize js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<!-- selectize js end-->
<!-- plugins:js -->
<script src="<?= base_url('/asset/vendors/js/vendor.bundle.addons.js') ?>"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script type="text/javascript" src="<?= base_url('asset/DataTables/datatables.min.js') ?>"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?= base_url('/asset/js/off-canvas.js') ?>"></script>
<script src="<?= base_url('/asset/js/misc.js') ?>"></script>
<!-- endinject -->
<!-- Data table js -->
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="<?= base_url('/asset/js/jquery-ui/jquery-ui-1.12.1/jquery-ui.min.js') ?>"></script>
<!-- End data table js -->
</body>

</html>