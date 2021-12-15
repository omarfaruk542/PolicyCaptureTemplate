
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/kormeebee3.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'KORMEE') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/dropzone/min/dropzone.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-select/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-datetime/dataTables.dateTime.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-editor/editor.dataTables.min.css') }}">
     <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- Tag manager Style-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/tag-master/bootstrap-tagsinput.css') }}">
    <!-- Customs Style-->
    <link rel="stylesheet" href="{{ asset('assets/customs-asset/style.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/dist/css/style.css') }}"> --}}
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini">
    <div id="app">
        @yield('content')
    </div>
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<!-- BS-Stepper -->
<script src="{{ asset('assets/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
<!-- dropzonejs -->
<script src="{{ asset('assets/plugins/dropzone/min/dropzone.min.js') }}"></script>
<!-- DataTables  & assets/plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-select/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-datetime/dataTables.dateTime.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-editor/dataTables.editor.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- Tag manager Js-->
<script src="{{ asset('assets/plugins/tag-master/bootstrap-tagsinput.min.js') }}"></script>
<!-- Page specific script -->
<script src="{{ asset('assets/customs-asset/dataTables.export.js') }}"></script>
<!-- Form Validation Js-->
<script src="{{ asset('assets/customs-asset/bootstrap.form-validation.js') }}"></script>
<script>
    $('.message').toast('show');
    $('.error').toast('show');
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('assets/customs-asset/sweetalert.on-delete.page-script.js') }}"></script>
<script src="{{ asset('assets/customs-asset/upload_profile_image.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- house keeping data display -->
<script src="{{ asset('assets/customs-asset/page_scripts.js') }}"></script>
<!-- Page Scroll script -->
<script src="{{ asset('js/page-scroll.js') }}"></script>
<!-- Grid View -->
<script src="{{ asset('js/gridview.js') }}"></script>
<!-- Page script -->
<script src="{{ asset('js/custom-script.js') }}"></script>
<script>
$(document).ready(function(){
   $(document).on('change','input[type="file"]',function(){
    $('#uploadsuccss').text('');
       files = this.files;
       fileSize = Math.round(files[0].size / 1024);
       if(files){
        // console.log(files[0].name)
        if(fileSize > 5120){
            $('#uploaderror').removeClass('d-none');
            $('#uploadsuccss').addClass('d-none');
            $(this).val('');
        } else {
            $('#uploaderror').addClass('d-none');
            $('#uploadsuccss').removeClass('d-none');
            $('#uploadsuccss').append(`<strong>Success!</strong> file name: ${files[0].name}, size : ${fileSize} KB Selected`)
        }

       }

   })
})

</script>

</body>
</html>
