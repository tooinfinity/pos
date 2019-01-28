@if (session()->has('success'))

        <script>
            swal ({
                type: 'success',
                layout: 'topRight',
                text:"{{ session('success') }}",
                timeout:2000,
                killer:true

            }).show();
        </script>
@endif