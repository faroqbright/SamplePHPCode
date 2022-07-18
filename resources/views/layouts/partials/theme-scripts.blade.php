<!-- JAVASCRIPT -->
<script src="{{ URL::asset('public/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/libs/node-waves/waves.min.js') }}"></script>

<script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

<!-- alertifyjs js -->
<script src="{{ asset('public/assets/libs/alertifyjs/build/alertify.min.js') }}"></script>

<!-- datepicker -->
<script src="{{ URL::asset('public/assets/libs/air-datepicker/js/datepicker.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/libs/air-datepicker/js/i18n/datepicker.en.js') }}"></script>

<!-- apexcharts -->
<script src="{{ URL::asset('public/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ URL::asset('public/assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>

<!-- Jq vector map -->
<script src="{{ URL::asset('public/assets/libs/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/libs/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

<script src="{{ URL::asset('public/assets/js/pages/dashboard.init.js') }}"></script>


<!-- Required datatable js -->
<script src="{{ URL::asset('public/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ URL::asset('public/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('public/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ URL::asset('public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ URL::asset('public/assets/js/pages/datatables.init.js') }}"></script>



<!-- parsleyjs -->
<script src="{{ URL::asset('public/assets/libs/parsleyjs/parsley.min.js') }}"></script>
<!-- validation init -->
<script src="{{ URL::asset('public/assets/js/pages/form-validation.init.js') }}"></script>


<script src="{{ URL::asset('public/assets/js/app.js') }}"></script>

<script>
    @if (session('success'))
        var notification = alertify.notify("{{ session('success') }}", 'success', 5, function(){  console.log('dismissed'); });
    @elseif (session('error'))
        var notification = alertify.notify("{{ session('error') }}", 'danger', 5, function(){  console.log('dismissed'); });
    @endif
</script>
