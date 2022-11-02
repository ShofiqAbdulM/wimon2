@extends('layouts.back')

@section('content')
    <div class="container">
        @include('layouts/aset/flash')
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header pb-0">
                            <h3 class="card-title">ADD Wisata</h3>

                        </div>
                        <form action="{{ route('add.wisata') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label for="kode">Kode Wisata</label>
                                            <input type="text" id="kode" name="kode_wisata" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="Nama">Nama Wisata</label>
                                            <input type="text" id="Nama" name="nama_wisata" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                            <input type="file" id="gambar" name="gambar_wisata"
                                                class="form-control border-0 pl-0 pt-1">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="alamat">Alamat Wisata</label>
                                            <textarea id="alamat" name="alamat_wisata" class="form-control" rows="5"></textarea>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="geo">Data Json</label>
                                            <textarea id="geo" name="geoJson" class="form-control" rows="5" readonly></textarea>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="map">Map Geojson</label>
                                            <div id='map' style="height:350px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="/home" class="btn btn-secondary">Cancel</a>
                                            <input type="submit" value="Create new Wisata "
                                                class="btn btn-success float-right" id="convert">
                                        </div>
                                    </div>
                                </div>
                        </form>
                        {{-- <div class="col-md-6">
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="geo">GeoJSON</label>
                                <textarea id="geo" name="geoJson" class="form-control" rows="5" readonly></textarea>
                            </div>
                            <button id="convert">cobak</button>

                            <!-- /.form-group -->
                        </div> --}}
                    </div>

                </div>

        </section>
    </div>

    <script>
        var map = L.map('map', {
            center: [-7.884550294687469, 112.52448965839899],
            zoom: 14,
            zoomControl: false
        });
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        // FeatureGroup is to store editable layers
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);
        var drawControl = new L.Control.Draw({
            edit: {
                featureGroup: drawnItems
            }
        });
        map.addControl(drawControl);

        map.on('draw:created', function(event) {
            var layer = event.layer,
                feature = layer.feature = layer.feature || {};

            feature.type = feature.type || "Feature";
            feature.properties = feature.properties || {};

            var props = feature.properties = feature.properties || {};
            props.id = $('#kode').val();
            drawnItems.addLayer(layer);

            document.getElementById("convert").addEventListener("click", function() {
                var hasil = $("#geo").html(JSON.stringify(drawnItems.toGeoJSON()));
                var data_wisata = document.getElementById("#hasil").innerHTML;
                if (data_wisata == '{"type":"FeatureCollection","features":[]}') {
                    alert('datakosng');
                } else {
                    alert('data ada')
                }
            })
        })
    </script>
@endsection
