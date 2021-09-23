@if(session('success'))
    <script type="text/javascript">
        $(document).ready(
            function(e) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "{{ Session::get('success') }}",
                    showConfirmButton: true,
                    timer: 3000
                });
            }
        );
    </script>
@endif

@if(session('warn'))
    <script type="text/javascript">
        $(document).ready(
            function(e) {
                Swal.fire({
                    position: "top-end",
                    icon: "warning",
                    title: "{{ Session::get('warn') }}",
                    showConfirmButton: true,
                    timer: 3000
                });
            }
        );
    </script>
@endif

@if(session('failed'))
    <script type="text/javascript">
        $(document).ready(
            function(e) {
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "{{ Session::get('failed') }}",
                    showConfirmButton: true,
                    timer: 3000
                });
            }
        );
    </script>
@endif