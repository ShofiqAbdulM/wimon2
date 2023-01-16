
@extends('layouts.front')
<style>
#blog-header{
  background-image: url("img/scale2.jpg");
  background-repeat: no-repeat;
  height: 200px;

}
</style>

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
                    <img src="{{ asset('gambar') }}/{{'1671312705.jpg'}}" class="img-fluid" alt="">
                  </td>
                  <td colspan="2">
                    <h4>Jatim Park 2</h4>
                  </td>
                </tr>
                <tr>
                  <td width="10%" align="center"><strong><i class="fa-solid fa-location-dot"></i></strong></td>
                  <td width="43%"> Jl. Raya Oro-Oro Ombo No. 9, Kota Wisata Batu, Jawa Timur. <br> Lokasi Jatim Park 2 berada dekat dengan Jatim Park 1 yakni sekitar 1 km saja.</td>
                </tr>
                <tr>
                  <td align="center"><strong><i class="fa-solid fa-phone"></i></strong></td>
                  <td>03141-596666</td>
                </tr>
                 <tr>
                  <td colspan="3">
                  <a href="#" class="fa fa-facebook">
                  <a href="#" class="fa fa-instagram"></a>
                  <a href="#" class="fa fa-youtube"></a>
                </td>
                     </td>
                </tr>
                <tr>
                  <td colspan="3">
                    <p align="justify">Jatim Park 2 berada di dataran tinggi, tepatnya di Kota Batu, Jawa Timur. Selain memiliki hawa yang sejuk Jatim Park 2 ini memiliki banyak sekali destinasi wisata yang harus kamu datangi.

                      Sehingga menjadikan Jatim Park 2 ini menjadi tujuan wisata para pengunjung yang ingin berlibur bersama keluarga tercinta.</p>
                  </td>
                </tr>
              </table>
            </div>
            <!-- .table-responsive -->
          </div>
          <!-- /.blog-main -->
          <aside class="col-md-2 blog-sidebar">
            <div class="p-2">
               <h4 class="font-italic">Highlight</h4>
               <ol class="list-unstyled">
                <div class="col-md-5">
                  <img class="rounded-circle" src="{{ asset('gambar') }}/{{'1671312705.jpg'}}" width="80px" />
                </div>
                <br>
                <div class="col-md-5">
                  <img class="rounded-circle" src="{{ asset('gambar') }}/{{'1671312705.jpg'}}" width="80px" />
                </div>
                <br>
                <div class="col-md-5">
                  <img class="rounded-circle" src="{{ asset('gambar') }}/{{'1671312705.jpg'}}" width="80px" />
                </div>

               </ol>
             </div>
           </aside> <!-- /.blog-sidebar -->

         </div><!-- /.row -->

          {{-- <section id="katalog-wrapper">
            <aside class="col-md-3 katalog-sidebar">
              <div class="pl-6 pb-5">
                <h4 class="font-italic">Highlight</h4>
                <div class="row">
                  <div class="col-md-5">
                    <img class="rounded-circle" src="{{ asset('gambar') }}/{{'1671312705.jpg'}}" width="30px" />
                  </div>
                  <div class="col-sm-5">
                    <img class="rounded-circle" src="{{ asset('gambar') }}/{{'1671312705.jpg'}}" width="30px"/>
                  </div>
                  <div class="col-sm-1">
                    <img class="rounded-circle" src="{{ asset('gambar') }}/{{'1671312705.jpg'}}" width="30px"/>
                  </div>
                </div>
              </div>

          </section>
        </div>
        </aside> --}}
        <!-- /.blog-sidebar -->
  </div>
  <!-- /.row -->
  </main>
  </div>
  <!-- /.container -->
  @endsection
