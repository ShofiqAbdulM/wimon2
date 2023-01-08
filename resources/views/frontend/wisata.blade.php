@extends('layouts.front')
@section('content')
    <div class="col-lg-12 mb-1">
        {{-- <div id="findbox"></div> --}}
        <div id="findbox" class="row justify-content-center">
        </div>
        <div id='map' style="height:56em;"></div>
    </div>
    <div id="side-bar">
        <div class="row justify-content-center">
            <div class="col-md-12 d-inline text-center">
                <div class="card col-md-12 p-0">
                    <div class="card-header pb-0 bg-primary" style="font-size: 1em;">
                        <p>Jumlah Pengunjung Masuk</p>
                    </div>
                    <div class="card-body pt-2">
                        <p><strong>Total</strong></p>
                        <input class="h4 text-center" name="masuk" id="masuk" style="border: none" placeholder="null"
                            readonly>
                    </div>
                </div>
                <div class="card col-md-12 p-0">
                    <div class="card-header pb-0 bg-success" style="font-size: 1em;">
                        <p>Jumlah Pengunjung Keluar</p>
                    </div>
                    <div class="card-body pt-2">
                        <p><strong>Total</strong></p>
                        <input class="h4 text-center" name="keluar" id="keluar" style="border: none" placeholder="null"
                            readonly>
                    </div>
                </div>
                <div class="card col-md-12 p-0">
                    <div class="card-header pb-0 bg-danger" style="font-size: 1em;">
                        <p>Jumlah Pengunjung Saat Ini</p>
                    </div>
                    <div class="card-body pt-2">
                        <p><strong>Total</strong></p>
                        <input class="h4 text-center" name="saat_ini" id="saat_ini" style="border: none" placeholder="null"
                            readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 mb-1 mt-2">
        <div class="row flex-grow">
            <div class="col-xl-12">
                <select onchange="cari(this.value)" class="form-control selectpicker align-items-center mb-3"
                    data-live-search="true" name="company_id">
                    <option value="">---- Pilih Wisata ----</option>
                    @foreach ($keyword as $key)
                        <option value="{{ $key->id_wisata }}">{{ $key->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>
    <script>
        var peta1 = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: '<a href="https://www.openstreetmap.org/">OpenStreetMap</a>, ' +
                    '<a href="https://www.mapbox.com/">Mapbox</a> Copyright © 2022,' +
                    '<a href="/">WiMoN</a>',
                id: 'mapbox/streets-v11'
            });

        var peta2 = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: '<a href="https://www.openstreetmap.org/">OpenStreetMap</a>, ' +
                    '<a href="https://www.mapbox.com/">Mapbox</a> Copyright © 2022,' +
                    '<a href="https://www.openstreetmap.org/">WiMoN</a>',

                id: 'mapbox/satellite-v9'
            });


        var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '<a href="https://www.openstreetmap.org/">OpenStreetMap</a>, ' +
                '<a href="https://www.mapbox.com/">Mapbox</a> Copyright © 2022,' +
                '<a href="https://www.openstreetmap.org/">WiMoN</a>',
        });

        var peta4 = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: '<a href="https://www.openstreetmap.org/">OpenStreetMap</a>, ' +
                    '<a href="https://www.mapbox.com/">Mapbox</a> Copyright © 2022,' +
                    '<a href="/">WiMoN</a>',
                id: 'mapbox/dark-v10'
            });

        var map = L.map('map', {
            center: [-7.884550294687469, 112.52448965839899],
            zoom: 14,
            zoomControl: false,
            layers: [peta1]
        });

        var baseMaps = {
            "peta1": peta1,
            "peta2": peta2,
            "peta3": peta3,
            "peta4": peta4
        };

        L.control.layers(baseMaps).addTo(map);

        var sidebar = L.control.sidebar('side-bar', {
            closeButton: false,
            position: 'right'
        }).addTo(map);

        // GeoJson
        var geoLayer;
        $.getJSON("wisata/geojson", function(json) {
            $.each(json, function(index) {

                // add GeoJSON layer to the map once the file is loaded
                geoLayer = L.geoJson(JSON.parse(json[index].map), {
                    style: function(feature) {
                        return {
                            fillOpacity: 0.5,
                            opacity: 1,
                            weight: 2,
                            color: "#ff0000"
                        };
                    },
<<<<<<< HEAD
                    onEachFeature: function(feature, layer) {
                        layer.on('click', (f) => {
                            $.getJSON('wisata/' + feature.properties.id,
                                function(
                                    detail) {
                                    var html =
                                        '<div align="center"><p style="color:#FF0000;  font-family:Helvetica Neue; font-size:25px;" class="text-uppercase"><strong>' +
                                        detail.lokasi[0].nama +
                                        '</strong></p>';
                                    html += '<img src="gambar/' + detail.lokasi[0]
                                        .gambar +
                                        '" width="300px"><br> <a href="{{ route('bio_wisata') }}">Lihat Selengkapnya Mengenai Jatim Park ' +
                                        detail.lokasi[0].nama +
                                        '</a></div>';
=======
                    onEachFeature: function(feature, featureLayer) {
                        featureLayer.on('click', (f) => {
                            $.getJSON('wisata/' + feature.properties.id, function(
                                detail) {
                                var html =
                                    '<div align="center"><p style="color:#FF0000;  font-family:Helvetica Neue; font-size:25px;" class="text-uppercase"><strong>' +
                                    detail.lokasi[0].nama +
                                    '</strong></p>';
                                html += '<img src="gambar/' + detail.lokasi[0]
                                    .gambar +
                                    '" width="300px"><br> <a href="#">Lihat Selengkapnya Mengenai Jatim Park ' +
                                    detail.lokasi[0].nama +
                                    '</a></div>';
>>>>>>> 88faf44 (update lagi)

                                L.popup()
                                    .setLatLng(f.latlng)
                                    .setContent(html)
                                    .addTo(map);

                                $("#masuk").val(detail.sensor_masuk)
                                    .keyup();
                                $("#keluar").val(detail.sensor_keluar)
                                    .keyup();
                                $("#saat_ini").val(detail.pengunjung).keyup();
                            });
                        }), featureLayer.on('click', (e) => {
                            sidebar.toggle()
                        })
                    }
                }).addTo(map);
                return geoLayer;
                // alert(geoLayer);
            })
        });


        alert(geoLayer);

<<<<<<< HEAD
        var searchControl = new L.Control.Search({
            // container: 'findbox',
            position: 'topleft',
            initial: true,
            layer: geoLayer,
            zoom: 15,
            collapsed: false,
            marker: false
        });

        map.addControl(searchControl);

        for (i in allwisata) {
            // alert(allwisata[i].map)
            var nama_wisata = allwisata[i].nama; //value searched
            var loc = allwisata[i].map; //position found
            var parselokasi = L.geoJson(JSON.parse(loc), {
                title: nama_wisata
            }); //se property searched
            geoLayer.addLayer(parselokasi);
        }
        // // Script Detail Pencarian
        // function cari(id_wisata) {
        //     geoLayer.eachLayer(function(layer) {
        //         if (layer.feature.properties.id == id_wisata) {
        //             map.flyTo(layer.getBounds().getCenter(), 17);
        //         }
        //     });
        // };
        var searchControl = new L.geoJson.Search({
        style: 'bar',
        searchLabel: 'Sinjai',
    });

    map.addControl(searchControl);
=======
        // Script Detail Pencarian
        function cari(id_wisata) {
            geoLayer.eachLayer(function(layer) {
                // alert(layer.feature.properties.id);
                if (layer.feature.properties.id == id_wisata) {
                    map.fitBounds(layer.getBounds().pad(1), 17);
                }
            });
        };
>>>>>>> 88faf44 (update lagi)
    </script>
@endsection
