<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Store LTE</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/all.css" />

    {{--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    --}}

<body>
    <div class="wrapper">

        <!-- Navbar -->
        @include('layouts.posnavbar')
        <!-- /.navbar -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="row">
                    <div class="col-12">

                    </div>
                </div><!-- /.row -->
            </div>
            <!-- /.content-header -->


            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <h1 class="m-0 text-dark">@yield('page')</h1>
                    <div class="row">
                        @yield('content')
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('layouts.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <script src="/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="/js/ean13.min.js"></script>
    <script src="/js/jquery-ean13.min.js"></script>
    <script src="/js/printThis.js"></script>
    <script src="/js/JsBarcode.all.min.js"></script>
    <script src="/js/moment.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

    @include('sweetalert::alert')
    <script>
        $(document).ready(function () {
            var interval = setInterval(function () {
                var momentNow = moment();
                $('#date-part').html(momentNow.format('dddd') + ' ' + momentNow.format('DD MMMM YYYY'));
                $('#time-part').html(momentNow.format('kk:mm:ss'));
            }, 100);
        });

    </script>
    <script>
        $(document).ready(function () {

            $('#add').click(function () {

                var name = document.getElementById('name');
                var price = document.getElementById('price');
                var stock = document.getElementById('stock');
                alert(name);

            });
        });

    </script>
</body>

</html>
