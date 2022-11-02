<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('back.name', 'Wisata Monitoring Admin') }}</title>

    @include('layouts/aset/head')
    @include('layouts/aset/include')
    @include('layouts/aset/flash')

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile') }}">
                        <span class="mr-2 d-none d-lg-inline text-dark">{{ Auth::user()->name }}</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-danger elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link text-center pl-2">
                <img src="{{ asset('img') }}/wimon.svg" alt="AdminLTE Logo" class="img-circle elevation-3"
                    style="opacity: .8;max-width:3em">
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <a href="{{ route('profile') }}" class="brand-link" style="font-size: 1em;">
                    <img src="{{ asset('img') }}/{{ Auth::user()->image }}" alt="{{ Auth::user()->image }}"
                        class="brand-image img-circle elevation-3 ml-5 mr-2 text-center" style="width:15%; height:9em">
                    <span class="brand-text font-small-light ml-2 mr-5">{{ Auth::user()->name }}</span>
                </a>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/home" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                                        <i class="fas fa-umbrella-beach nav-icon"></i>
                                        <p>Wisata</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/pengunjung"
                                        class="nav-link {{ request()->routeIs('pengunjung') ? 'active' : '' }}">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p>Pengunjung</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/profile"
                                        class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">
                                        <i class="fas fa-image nav-icon"></i>
                                        <p>Profile</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-center ml-0" data-toggle="modal"
                                data-target="#logoutModal">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    {{ __('LogOut') }}
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        @yield('content')
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ __('Are you sure you want to leave?') }}
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('LogOut') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('AdminLTE') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('AdminLTE') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('AdminLTE') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- jsGrid -->
    <script src="{{ asset('AdminLTE') }}/plugins/jsgrid/jsgrid.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE') }}/dist/js/adminlte.min.js"></script>

    <script src="{{ asset('js') }}/app.js"></script>
    <script>

    </script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#pengunjung").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#pengunjung_wrapper .col-md-6:eq(0)');
        });
        $('.alert-delete').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal.fire({
                title: 'Apa Anda Yakin Ingin Menghapus Data?.',
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
            }).then(function(value) {
                if (value.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
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
