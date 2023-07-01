<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
{{-- @include('sweetalert::alert') --}}
<script src="{{ asset('assets/js/app.js') }}"></script>

<!-- Need: Apexcharts -->
<script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

{{-- Data Tables Jquery --}}
<script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/datatables.js') }}"></script>
<script src="{{ asset('assets/datepicker/bootstrap-datepicker.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd', // Sesuaikan dengan format tanggal yang diinginkan
            autoclose: true,
            todayHighlight: true
            // Tambahkan opsi atau konfigurasi lain sesuai kebutuhan Anda
        });
    });
</script>
