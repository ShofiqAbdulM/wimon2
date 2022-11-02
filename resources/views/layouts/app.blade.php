<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Login') }}</title>

    @include('layouts/aset/head')
    @include('layouts/aset/flash')

</head>

<body class="hold-transition layout-top-nav">

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md mb-2" style="background-color: #000">
            <div class="container">
                <a href="{{ route('keyword') }}" class="navbar-brand">
                    <img src="{{ asset('img') }}/hori.svg" alt="AdminLTE Logo" class="brand-image elevation-3"
                        style="opacity: .8">
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}">
                            <i class="fas fa-user mr-1"></i>Login
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="footer text-right">
                <strong>Copyright &copy; 2022 <a href="https://adminlte.io">WiMoN</a></strong>
            </div>
            <!-- Default to the left -->
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('AdminLTE') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('AdminLTE') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('js') }}/app.js"></script>

    <script>
        $(function() {
            @if (Session('success'))
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{ Session::get('success') }}',
                showConfirmButton: false,
                timer: 1500
                })
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: '{{ $error }}',
                    showConfirmButton: false,
                    timer: 1500
                    })
                @endforeach
            @endif
        });
    </script>
</body>

</html>
