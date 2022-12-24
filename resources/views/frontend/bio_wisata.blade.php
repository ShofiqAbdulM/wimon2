
@extends('layouts.front')
@section('content')
<body>
  <div class="wrapper">
    <!-- Navbar -->
    <section id="blog-header">
      <div class="container">
        <h1 class="text-dark">DETAIL WISATA</h1>
      </div>
    </section><br><br>
    <section id="katalog-wisata">
      <main role="main" class="container">
        <div class="row">
          <div class="col-md-10 katalog-detail">
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <td width="50%" rowspan="6">
                    <img src="{{ asset('gambar') }}/{{ $BioWisata->gambar }}" class="img-fluid" alt="" title="Vue.js">
                  </td>
                  <td colspan="2">
                    <h4>Jatim Park 1</h4>
                  </td>
                </tr>
                <tr>
                  <td width="10%" align="center"><strong><i class="fa-solid fa-location-dot"></i></strong></td>
                  <td width="43%">Jl. Dewi Sartika Atas, Sisir, Kec. Batu, Kota Batu, Jawa Timur 65314</td>
                </tr>
                <tr>
                  <td align="center"><strong><i class="fa-solid fa-phone"></i></strong></td>
                  <td>03141-596666</td>
                </tr>
                 <tr>
                  <td colspan="3">
                  <a href="#" class="fa fa-facebook">
                  <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-youtube"></a></td>
                     </td>
                </tr>
                <tr>
                  <td colspan="3">
                    <p align="justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s</p>
                  </td>
                </tr>
              </table>
            </div>
            <!-- .table-responsive -->
          </div>
          <!-- /.blog-main -->
          <section id="katalog-wrapper">
            <aside class="col-md-3 katalog-sidebar">
              <div class="pl-6 pb-5">
                <h4 class="font-italic">Highlight</h4>
                <div class="row">
                  <div class="col-md-5">
                    <img class="rounded-circle" src="gambar.jpg" />
                  </div>
                  <div class="col-sm-5">
                    <img class="rounded-circle" src="gambar.jpg" />
                  </div>
                  <div class="col-sm-1">
                    <img class="rounded-circle" src="gambar.jpg" />
                  </div>
                </div>
              </div>

          </section>




        </div>
        </aside>
        <!-- /.blog-sidebar -->
  </div>
  <!-- /.row -->
  </main>
  </div>
  <!-- /.container -->
  @endsection