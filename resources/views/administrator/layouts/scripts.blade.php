<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('public/backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('public/backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('public/backend/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('public/backend/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('public/backend/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('public/backend/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('public/backend/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('public/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('public/backend/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- bootstrap time picker -->
<script src="{{ asset('public/backend/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('public/backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('public/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset('public/backend/plugins/iCheck/icheck.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('public/backend/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/backend/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/backend/dist/js/demo.js') }}"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('public/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- For Editor -->

<!-- Wow -->
<script src="{{ asset('public/wow/wow.min.js') }}"></script>
 <script>
   new WOW().init();
  </script>
<!-- /Wow -->

<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    })
</script>
<!-- For fadeout notifications -->
<script>
    $(document).ready(function () {
        $("#notification_box").fadeOut(4000);
    });
</script>
<!-- For Data Table -->
<script>
    $(function () {
        $('#example1').DataTable();
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        });
    });
</script>
<!-- For Date Picker -->
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'});
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'});
        //Money Euro
        $('[data-mask]').inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
        );

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        });
        $('#datepicker').datepicker('setDate', 'now');

        //Date picker
        $('#datepicker2').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        });
        $('#datepicker2').datepicker('setDate', 'now');

        //Date picker
        $('#datepicker3').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        });

        //Date picker
        $('#datepicker4').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        });

        //Month picker
        $('#monthpicker').datepicker({
            autoclose: true,
            format: "yyyy-mm",
            viewMode: "months",
            minViewMode: "months"
        });
        $('#monthpicker').datepicker('setDate', 'now');

        //Month picker
        $('#monthpicker2').datepicker({
            autoclose: true,
            format: "yyyy-mm",
            viewMode: "months",
            minViewMode: "months"
        });


        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $('.my-colorpicker1').colorpicker();
        //color picker with addon
        $('.my-colorpicker2').colorpicker();

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        });
    });
</script>
<!-- For All Type of Print -->
<script type="text/javascript">
    function printDiv(printable_area) {
     var printContents = document.getElementById(printable_area).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
 }
</script>
<!-- For Active Menu -->
<script type="text/javascript">
     $('#mainMenu ul li').find('a').each(function () {
            if (document.location.href == $(this).attr('href')) {
                $(this).parents().addClass("active");
                $(this).addClass("active");
                // add class as you need ul or li or a
            }
        });
</script>

 <!-- =================Data Search================== -->
                <script>
                $(document).ready(function(){
                 $("#myInput").on("keyup", function() {
                   var value = $(this).val().toLowerCase();
                   $("#myTable tr").filter(function() {
                     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                   });
                 });
                });
                </script>
 <!-- =================Data Search================== -->



