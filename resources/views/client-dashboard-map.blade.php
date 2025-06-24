<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFSOATS FORESTRY SPATIAL DATASETS</title>
    {{-- boostrap and jquery --}}
    <link id="pagestyle2" href="{{ asset('assets/css/cdn.jsdelivr.net_npm_bootstrap@5.3.2_dist_css_bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/jquery.3.2.1.min.js') }}"></script>

    <style>
        html,
        body,
        #map {
            height: 100%;
            width: 100%;
            padding: 0;
            margin: 0;
        }

        /* region for go FSDs button */
        .go-to-fsd span{
            display: none;
        }

        .go-to-fsd .btn-go-to-fsd{
            border-radius: 50%!important;
            opacity: 40%;
        }

        .go-to-fsd:hover span{
            display: block;
        }

        .go-to-fsd:hover .btn-go-to-fsd{
            border-radius: 10%!important;
            opacity: 100%;
        }
        /* endregion for go FSDs button */
    </style>

    <!-- Leaflet (JS/CSS) -->
    <link rel="stylesheet" href="{{ asset('assets/css/leaflet.css') }}">
    <script src="{{ asset('assets/js/leaflat_map/leaflet.js') }}"></script>
    <!-- Leaflet-KMZ -->
    <script src="{{ asset('assets/js/leaflat_map/leaflet-kmz.js') }}"></script>
</head>

<body>
    <div id="map"></div>
    <div class="text-center transition-header bg-transparent p-4 d-flex justify-content-center" style="position: fixed; bottom: 0; z-index: 9999;">
    </div>

    <div class="text-center navigator go-to-fsd p-4 d-flex justify-content-center" style="position: fixed; top: 0; right: 0; z-index: 9999;">
        <a href="/map-dashboard-main" target="_blank" class="btn btn-primary btn-sm btn-go-to-fsd rounded">
            <i class="fa fa-map" aria-hidden="true"></i> <span>View Other FSDs</span>
        </a>
    </div>

    <script src="/assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.2_dist_js_bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        let  map = L.map('map', {
            preferCanvas: true // recommended when loading large layers.
        });
        // initial start 
        $('.transition-header').fadeOut(500, function() {
            $(this).empty().append('' +
                '<div class="alert alert-info fs-3 fw-bold" role="alert">' +
                'Ticao Burias Pass Protected Seascape' +
                '</div>'
            ).show();
        });
        map.setView(new L.LatLng(12.8139637, 123.5552141), 9);

        let transition_time = 5000; //milli seconds 1000 milli seconds = 1 second

        // region sample change coordinates
        setInterval(function() {
            // ticao burias protected seacape
            $('.transition-header').fadeOut(500, function() {
                $(this).empty().append('' +
                    '<div class="alert alert-info fs-3 fw-bold" role="alert">' +
                    'Ticao Burias Pass Protected Seascape' +
                    '</div>'
                ).show();
            });
            map.setView(new L.LatLng(12.8139637, 123.5552141), 9);
            setTimeout(function() {
                // mount mayon
                $('.transition-header').fadeOut(500, function() {
                    $(this).empty().append('' +
                        '<div class="alert alert-info fs-3 fw-bold" role="alert">' +
                        'Mount Mayon' +
                        '</div>'
                    ).show();
                });
                map.setView(new L.LatLng(13.2535670, 123.6857830), 11);
            }, transition_time);
            setTimeout(function() {
                // mount isarog
                $('.transition-header').fadeOut(500, function() {
                    $(this).empty().append('' +
                        '<div class="alert alert-info fs-3 fw-bold" role="alert">' +
                        'Mount Isarog' +
                        '</div>'
                    ).show();
                });
                map.setView(new L.LatLng(13.6566691, 123.3809766), 11);
            }, transition_time * 2); // Adjusted delay to 20 seconds
            setTimeout(function() {
                // catanduanes nature park
                $('.transition-header').fadeOut(500, function() {
                    $(this).empty().append('' +
                        '<div class="alert alert-info fs-3 fw-bold" role="alert">' +
                        'Catanduanes Nature Park' +
                        '</div>'
                    ).show();
                });
                map.setView(new L.LatLng(13.7900185, 124.2623403), 10);
            }, transition_time + 3); // Adjusted delay to 30 seconds
        }, transition_time * 4); // Total interval set to 30 seconds\
        // endregion sample change coordinates

        // complex
        /* var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
            maxZoom: 17,
            attribution: 'Map data: &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)',
            opacity: 0.90
        }); */

        // google map satellite image: https://stackoverflow.com/questions/9394190/leaflet-map-api-with-google-satellite-layer
        /* OpenTopoMap = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }); */
        
        // google map satellite image hybrid: https://stackoverflow.com/questions/9394190/leaflet-map-api-with-google-satellite-layer
        OpenTopoMap = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        });
        // google satellite
        OpenTopoMap.addTo(map);

        // Instantiate KMZ layer (async)
        var kmz = L.kmzLayer().addTo(map);

        kmz.on('load', function(e) {
            control.addOverlay(e.layer, e.name);
            // e.layer.addTo(map);
        });

        // Add remote KMZ files as layers (NB if they are 3rd-party servers, they MUST have CORS enabled)
        kmz.add('assets/doc/map_layer_files/Protected%20Areas/Region%20V.kmz');

        var control = L.control.layers(null, null, {
            collapsed: false
        }).addTo(map);

        // region hide layers control
        $('#map').find('.leaflet-control-layers').hide();
        $('#map').find('.leaflet-control-attribution').hide(); //leaflet link
        // endregion hide layers control
    </script>
    
    <script src="{{ url('assets/js/fontawesome.js') }}"></script>
</body>

</html>
