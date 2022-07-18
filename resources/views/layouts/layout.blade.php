<!DOCTYPE html>
<html lang="en">
    <script src="{{ asset('/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
{{-- <script src="{{ asset('/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script> --}}
<script src="{{ asset('/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>

    @include("layouts.partials.head")

    <body data-topbar="colored">

        @auth
            <!-- Begin page -->
            <div id="layout-wrapper">

                <!-- ========== Top Navbar Start ========== -->
                @include('layouts.partials.navbar')
                <!-- Top Navbar End -->

                <!-- ========== Left Sidebar Start ========== -->
                @include('layouts.partials.sidebar')
                <!-- Left Sidebar End -->

                <div class="main-content">

                    <!-- Page Content -->
                    @yield("content")
                    <!-- End Page Content -->

                    <!-- Footer -->
                    @include('layouts.partials.footer')
                    <!-- End Footer -->

                </div>


            </div>
            <!-- END layout-wrapper -->

            <!-- Right Sidebar -->
            @include('layouts.partials.right-sidebar')
            <!-- /Right-bar -->

            <!-- Right bar overlay-->
            <div class="rightbar-overlay"></div>

        @endauth

        <!-- Theme Scripts -->
        @include('layouts.partials.theme-scripts')
        <!-- END Theme Scripts -->

        <!-- Page Spacific Scripts -->
        @yield('scripts')
        <!-- END Page Spacific Scripts -->

    </body>
</html>
<script>
// $(function () {
//     $("#example1").DataTable({
//       "responsive": true, "lengthChange": false, "autoWidth": false,
//     "buttons": ["csv", "excel", "pdf"]
//     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
//     $('#example2').DataTable({
//       "paging": true,
//       "lengthChange": false,
//       "searching": false,
//       "ordering": true,
//       "info": true,
//       "autoWidth": false,
//       "responsive": true,
//     });
//   });
</script>

