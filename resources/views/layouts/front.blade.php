<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('front.name', 'Wisata Monitoring') }}</title>

    @include('layouts/aset/head')
    @include('layouts/aset/leaflet')
    @include('layouts/aset/flash')
    <style>
        .side-bar {
            position: absolute;
            top: 500px;
            left: 50px;
            right: 50px;
            padding: 0 1em;
            background-color: rgba(255, 255, 255, 0.9);
            overflow: auto;
            z-index: 2;
        }

        #findbox {
            position: fixed;
            display: block;
            height: auto;
            margin: 10px auto 0;
            cursor: auto;
            z-index: 1000;
        }

        /* #findbox {
            background: #eee;
            border-radius: .125em;
            border: 2px solid #1978cf;
            box-shadow: 0 0 8px #999;
            margin-bottom: 10px;
            padding: 2px 0;
            width: 600px;
            height: 26px;
        } */

    </style>
</head>

<body class="hold-transition layout-top-nav">

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md" style="background-color: #000; margin-bottom:12px;">
            <a href="{{ route('keyword') }}" class="navbar-brand">
                <img src="{{ asset('img') }}/hori.svg" alt="AdminLTE Logo" class="brand-image elevation-3"
                    style="opacity: .8">
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Right navbar links -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto mr-0 pr-0">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('login') }}">
                        <i class="fas fa-user mr-1"></i>Login
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="row-container">
                @yield('content')
            </div>
        </div>
        <!-- /.content-wrapper -->

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
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
