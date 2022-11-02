@extends('layouts.back')

@section('content')
    <div class="container">
        <h1 class="mb-2">Data Pengunjung</h1>
        {{-- @if (session('success'))
            <div class="alert alert-success border-left-success alert-dismissible fade show mt-2 mb-2" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif --}}

        <table id="pengunjung" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Wisata</th>
                    <th>Tanggal</th>
                    <th>Jumlah Pengunjung</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keyword as $no => $pengunjung)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $pengunjung->tgl }}</td>
                        <td>{{ $pengunjung->tgl }}</td>
                        <td>{{ $pengunjung->jml_pengunjung }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
