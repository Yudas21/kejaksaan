<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Office</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="{{ asset('template/plugins/font-awesome/css/font-awesome.css') }}">
   <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">  -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('template/plugins/iCheck/flat/blue.css') }}">
 <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('template/plugins/datepicker/datepicker3.css') }}">
  <!-- Theme style -->
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="{{ asset('template/plugins/fullcalendar/fullcalendar.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/plugins/fullcalendar/fullcalendar.print.css') }}" media="print">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('template/plugins/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables/dataTables.bootstrap4.css') }}">

  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    @include('template.header')
    @include('template.sidebar')
        @yield('content')
    @include('template.footer')
    <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('template/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('template/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('template/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('template/plugins/fastclick/fastclick.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('template/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('template/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template/dist/js/demo.js') }}"></script>
@yield('myjsfile')
<script>
  $(function () {
    $('.select2').select2();
    $('.bulan').datepicker({
        format: 'yyyy-mm',
        todayHighlight: true,
        autoclose: true,
        starView: 'months',
        minViewMode: 'months'
    });
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        autoclose: true
    });
    $('.tgl_lahir').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        autoclose: true,
        endDate: new Date()

    });
  });
  
  function numberOnly(e) {
      var charCode = (e.which) ? e.which : e.keyCode;

      if (!((charCode >= 48 && charCode <= 57) || charCode == 8 || charCode == 9))
        return false;
    }

    //Untuk Number format
    function currencySeparator(obj, separator) {
      a = obj.value;
      b = a.replace(/[^\d]/g, "");
      c = "";
      panjang = b.length;
      j = 0;

      for (i = panjang; i > 0; i--) {
        j = j + 1;
        if (((j % 3) == 1) && (j != 1)) {
          c = b.substr(i-1,1) + separator + c;
        } else {
          c = b.substr(i-1,1) + c;
        }
      }
      obj.value = c;
    }
</script>
</body>
</html>