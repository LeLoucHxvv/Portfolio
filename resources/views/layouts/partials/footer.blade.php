   {{-- <!-- jQuery -->
   <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
   <!-- jQuery UI 1.11.4 -->
   <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
   <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
   <script>
       $.widget.bridge('uibutton', $.ui.button)
   </script>
   <!-- Bootstrap 4 -->
   <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
   <!-- ChartJS -->
   <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
   <!-- Sparkline -->
   <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
   <!-- JQVMap -->
   <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
   <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
   <!-- jQuery Knob Chart -->
   <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
   <!-- daterangepicker -->
   <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
   <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
   <!-- Tempusdominus Bootstrap 4 -->
   <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
   <!-- Summernote -->
   <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
   <!-- overlayScrollbars -->
   <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
   <!-- AdminLTE App -->
   <script src="{{asset('dist/js/adminlte.js')}}"></script>
   <!-- AdminLTE for demo purposes -->
   <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
   <script src="{{asset('dist/js/pages/dashboard.js')}}"></script> --}}



   <!-- plugins:js -->
   <script src="{{ asset('assetss/vendors/js/vendor.bundle.base.js') }}"></script>
   <!-- endinject -->
   <!-- Plugin js for this page -->
   <script src="{{ asset('assetss/vendors/chart.js/Chart.min.js') }}"></script>
   <script src="{{ asset('assetss/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
   <script src="{{ asset('assetss/vendors/progressbar.js/progressbar.min.js') }}"></script>

   <!-- End plugin js for this page -->
   <!-- inject:js -->
   <script src="{{ asset('assetss/js/off-canvas.js') }}"></script>
   <script src="{{ asset('assetss/js/hoverable-collapse.js') }}"></script>
   <script src="{{ asset('assetss/js/template.js') }}"></script>
   <script src="{{ asset('assetss/js/settings.js') }}"></script>
   <script src="{{ asset('assetss/js/todolist.js') }}"></script>
   <!-- endinject -->
   <!-- Custom js for this page-->
   <script src="{{ asset('assetss/js/dashboard.js') }}"></script>
   <script src="{{ asset('assetss/js/Chart.roundedBarCharts.js') }}"></script>
   <!-- End custom js for this page-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.8.335/pdf.min.js"></script>


   <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

   <script>
       (function($) {
           'use strict';
           $('.dropify').dropify();
       })(jQuery);
       @if (session('success'))

           var message = "{!! session('success') !!}";
           const Toast = Swal.mixin({
               toast: true,
               position: "top-end",
               showConfirmButton: false,
               timer: 2500,
               timerProgressBar: true,
               didOpen: (toast) => {
                   toast.onmouseenter = Swal.stopTimer;
                   toast.onmouseleave = Swal.resumeTimer;
               }
           });
           Toast.fire({
               icon: "success",
               title: "CV Resume Updated!",
               html: message,
           });
       @elseif (session('error'))
       var message = "{!! session('error') !!}";
           const Toast = Swal.mixin({
               toast: true,
               position: "top-end",
               showConfirmButton: false,
               timer: 2500,
               timerProgressBar: true,
               didOpen: (toast) => {
                   toast.onmouseenter = Swal.stopTimer;
                   toast.onmouseleave = Swal.resumeTimer;
               }
           });
           Toast.fire({
               icon: "error",
               title: "CV Resume Error! ",
               html: message,
           });
       @endif
   </script>
