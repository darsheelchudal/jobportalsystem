<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge("uibutton", $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>


<!-- DataTables -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true, // Enable length change
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ], // Customize length menu
            "pageLength": 5, // Default page length
            "autoWidth": false,
            "buttons": [] // Remove all buttons
        });

        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<!-- date-range-picker -->
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script>
    $("#reservationdate").datetimepicker({
        format: "YYYY-MM-DD",
    });
</script>

    <!-- Bootstrap JavaScript and your additional scripts -->
    <!-- Ensure jQuery and Bootstrap JS are included for toggling functionality -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-+0nh5ECk/jtTUZI6KA8q2mZBBWLOZ3z5r8lZ//FOmrE1Uuh9Tp4G97PNT0ofVWo4"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <!-- JavaScript for sidebar toggle -->
    <script>
        function toggleSidebar() {
            var sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('active');
        }
    </script>