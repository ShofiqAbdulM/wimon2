<script>
    var geoLayer;
    $.getJSON('geojson/map.geojson',
        function(json) {
            geoLayer = L.geoJson(json, {
                style: function(feature) {
                    return {
                        fillOpacity: 0.5,
                        opacity: 1,
                        weight: 2,
                        color: "#ff0000"
                    };
                },
                onEachFeature: function(feature, layer) {
                    layer.on('click', (e) => {
                        $.getJSON('wisata/' + feature.properties.id, function(detail) {
                            // console.log(detail.sensor_masuk[0].jumlah_masuk);
                            var html =
                                '<div align="center"><p style="color:#FF0000;  font-family:Helvetica Neue; font-size:25px;" class="text-uppercase"><strong>' +
                                detail.lokasi[0].nama +
                                '</strong></p>';
                            html += '<img src="gambar/' + detail.lokasi[0]
                                .gambar +
                                '" width="500em" height="350em"></div>';

                            var style = {
                                'maxWidth': '5000',
                            }
                            L.popup(style)
                                .setLatLng(layer.getBounds()
                                    .getCenter())
                                .setContent(html)
                                .addTo(map);

                            $("#masuk").val(detail.sensor_masuk)
                                .keyup();
                            $("#keluar").val(detail.sensor_keluar)
                                .keyup();
                            $("#saat_ini").val(detail.pengunjung).keyup();
                            // console.log(detail.index.pengunjung);

                        });
                    })
                    layer.addTo(map);
                }
            });
        })
</script>
