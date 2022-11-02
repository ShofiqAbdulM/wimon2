@extends('layouts.back')

@section('content')
    <div class="container">
        <h1 class="m-0">{{ $tittle }}</h1>
        @if ($errors->any())
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: '{{ Session::get('$errors->all()') }}',
                    showConfirmButton: false,
                })
            </script>
        @endif
    </div>
    <div class="container mt-2">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <section class="content">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="fas fa-user"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Jumlah Admin Pengguna</span>
                                    <span class="info-box-number" style="font-size: 20px">{{ auth::user()->id }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning"><i class="fas fa-umbrella-beach"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Wisata</span>
                                    <span class="info-box-number" style="font-size: 20px">{{ auth::user()->id }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info-box">
                                <span class="info-box-icon bg-danger"><i
                                        class="fas fa-users
                                    "></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Pengunjung</span>
                                    <span class="info-box-number" style="font-size: 20px">{{ auth::user()->id }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-md-12 mt-2">
                <section class="content">

                    <!-- Default box -->
                    <div class="card card-success card-outline">
                        <div class="card-header pb-0">
                            <h3 class="card-title">Data Wisata</h3>

                            <div class="card-tools mr-0">
                                <form action="/wisata/cari" method="GET">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" placeholder="Cari Data" name="cari"
                                            value="{{ old('cari') }}">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-lg btn-primary">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="card-body pt-2 table-responsive pad">
                            <div class="row float-right">
                                <div class="col-sm mb-3">
                                    <a href="{{ route('view.add.wisata') }}" class="text-white">
                                        <button type="button" class="btn btn-primary btn-sm btn-flat">
                                            <i class="fas fa-plus mr-2"></i>ADD
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <table id="wisata" class="table table-bordered mt-2">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($keyword as $no => $keey)
                                        <tr>
                                            <td style="width: 1em">{{ $no + 1 }}</td>
                                            <td style="max-width:5em">{{ $keey->nama }}</td>
                                            <td>{{ $keey->alamat }}</td>
                                            <td style="width: 10em"> <img
                                                    src="{{ asset('gambar') }}/{{ $keey->gambar }}"
                                                    alt="{{ $keey->nama }}" style="max-width: 10em"></td>
                                            <td style="max-width: 1px">
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('view.edit.wisata', [$keey->id_wisata]) }}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                @csrf
                                                <a class="btn btn-danger btn-sm alert-delete"
                                                    href="{{ route('delete.wisata', [$keey->id_wisata]) }}">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </section>
            </div>
        </div>
    </div>
@endsection
