<script>
    

    $.getJSON('wisata/geojson', function(json) {
        $.each(json, function(index) {
            // alert(json[index].map);
            geoLayer = L.geoJson(JSON.parse(json[index].map), {
                style: function(feature) {
                    return {
                        fillOpacity: 0.5,
                        opacity: 1,
                        weight: 2,
                        color: "#ff0000"
                    };
                },
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
                                        '" width="300px"><br> <a href="#">Lihat Selengkapnya Mengenai Jatim Park ' +
                                        detail.lokasi[0].nama +
                                        '</a></div>';

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
                        }),
                        layer.on('click', (e) => {
                            sidebar.toggle()
                        });
                    layer.addTo(map);
                }
            });
            // alert(geoLayer);
        })
    });
</script>
