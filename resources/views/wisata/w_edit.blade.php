@extends('layouts.back')

@section('content')
    <div class="container">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header pb-0">
                            <h3 class="card-title">Edit Wisata</h3>

                            <div class="card-tools pt-0 mt-0">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <form action="{{ route('detail_wisata', ['id' => $detail_wisata->id_wisata]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="kode">Kode Wisata</label>
                                            <input type="text" id="kode" value="{{ $detail_wisata->id_wisata }}"
                                                name="kode_wisata" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputName">Nama Wisata</label>
                                            <input type="text" value="{{ $detail_wisata->nama }}" id="inputName"
                                                name="nama_wisata" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                            <input type="file" id="gambar" name="gambar_wisata"
                                                class="form-control border-0 pl-0 pt-1">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group ">
                                            <label for="inputDescription">Alamat Wisata</label>
                                            <textarea id="inputDescription" name="alamat_wisata" class="form-control"
                                                rows="5">{{ $detail_wisata->alamat }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="geo">Data Json</label>
                                            <textarea id="geo" name="geoJson" class="form-control" rows="5" readonly>{{ $detail_wisata->map }}</textarea>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="map">Map Geojson</label>
                                            <div id='map' name="geo" style="height:250px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="/home" class="btn btn-secondary">Cancel</a>
                                        <input type="submit" value="Update" class="btn btn-success float-right"
                                            id="convert">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
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
        var polygon = @json($detail_wisata->map);
        var drawnItems = L.geoJson(JSON.parse(polygon)).addTo(map);

        map.addLayer(drawnItems);
        var drawControl = new L.Control.Draw({
            edit: {
                featureGroup: drawnItems
            },
            remove: false
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

            $("[name=geoJson]").html(JSON.stringify(drawnItems.toGeoJSON()));
            // document.getElementById("convert").addEventListener("click", function() {
            //     var hasil = $("#geo").html(JSON.stringify(drawnItems.toGeoJSON()));
            //     var data_wisata = document.getElementById("geo").innerHTML;
            //     if (data_wisata == '{"type":"FeatureCollection","features":[]}') {
            //         alert('data kosong');
            //     } else {
            //         alert('data ada')
            //     }
            // })
        });
        map.on('draw:edited', function(event) {
            $("[name=geoJson]").html(JSON.stringify(drawnItems.toGeoJSON()));
        });
        map.on('draw:deleted', function(event) {
            $("[name=geoJson]").html("");
        });
    </script>
@endsection
