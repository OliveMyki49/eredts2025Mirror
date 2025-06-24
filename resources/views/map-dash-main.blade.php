<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/logoAlone.webp">
    <link rel="icon" href="../assets/img/logoAlone.webp" type="image/x-icon">
    <link rel="icon" type="image/png" href="../assets/img/logoAlone.webp">
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

        /* region sidebar-btn-cont */
        .sidebar-btn-cont {
            position: fixed;
            top: 55px;
            left: -15px;
            z-index: 1044;
        }

        /* notifications */
        .top-notification {
            position: fixed;
            top: 55px;
            right: -15px;
            z-index: 1046;
        }

        .map-list-style {
            background-color: rgba(0, 0, 0, 0.1) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            color: #fff;
        }

        /* endregion sidebar-btn-cont */
    </style>

    <!-- Leaflet (JS/CSS) -->
    <link rel="stylesheet" href="{{ asset('assets/css/leaflet.css') }}">
    <script src="{{ asset('assets/js/leaflat_map/leaflet.js') }}"></script>
    <!-- Leaflet-KMZ -->
    <script src="{{ asset('assets/js/leaflat_map/leaflet-kmz.js') }}"></script>
</head>

<body>
    {{-- region map --}}
    <div id="map"></div>
    {{-- endregion map --}}

    {{-- region notification  --}}
    <div class="text-center top-notification bg-transparent p-4 d-flex justify-content-center">
        {{-- notifications will appear here --}}
        <ul class="list-group top-notification-list">
        </ul>
    </div>
    {{-- endregion notification  --}}

    {{-- region side bar button --}}
    <div class="text-center sidebar-btn-cont bg-transparent p-4 d-flex justify-content-center">
        <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
            <button class="btn btn-secondary btn-show-side-bar btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#FSDsidebar" aria-controls="FSDsidebar" title="Select Maps">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <button type="button" class="btn btn-secondary btn-show-side-bar btn-sm" data-bs-toggle="offcanvas" data-bs-target="#FSDsidebarSetting" aria-controls="FSDsidebarSetting" title="Setting">
                <i class="fa fa-cog" aria-hidden="true"></i>
            </button>

            <a class="mt-1 btn btn-success btn-show-side-bar btn-sm" href="/" target="_self" title="Go back to RFSOATS">
                <i class="fa fa-home" aria-hidden="true"></i>
            </a>
        </div>

    </div>
    {{-- endregion side bar button --}}

    {{-- region side bar main --}}
    <div class="offcanvas offcanvas-start" style="background: linear-gradient(to right, rgb(146 189 122 / 90%), rgba(51, 139, 147, 0.9))" tabindex="-1" id="FSDsidebar" aria-labelledby="FSDsidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title text-white fw-bold" id="FSDsidebarLabel">DENR V - Forestry Spatial Datasets</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <p class="d-inline-flex gap-1">
                <a class="link-light link-offset-2 link-underline link-underline-opacity-0" data-bs-toggle="collapse" href="#whatIsFsd" role="button" aria-expanded="false" aria-controls="whatIsFsd">
                    What is forestry spatial datasets?
                </a>
            </p>
            <div class="collapse" id="whatIsFsd">
                <div class="card card-body">
                    <h5>Forestry Spatial Datasets, Data Dictionary, Naming Convention, and Style</h5>

                    <p>
                        This section describes the different spatial datasets used in the mapping and
                        monitoring of forestry plans and programs and how they should be reorted when
                        being uploaded to the cloud or being sent to other DENR Offices.
                    </p>


                    <b>Spatial Datasets (FSD)</b>

                    <p>
                        FSD refers to the datasets being managed by the forestry sector which can be
                        in six (6) major categories/themes to
                    </p>

                    <ol type="1">
                        <li>
                            <span class="text-success">Investments</span> - datasets pertaining to management and utilization of
                            forestlands in terms of ptential investment opportunities and commercial
                            production and extraction of timber or other forest
                        </li>
                        <li>
                            <span class="text-success">Reforestation and Forest Rehabilitation</span> - datasets pertaining to plans and
                            programs intended to address emerging issues in deforestation and forest
                            degradation
                        </li>
                        <li>
                            <span class="text-success">Forest Monitoring and Protection</span> - datasets pertaining to forest monitoring
                            and strategies on conservation plans and impact of forest threats
                            such as logging activities.
                        </li>
                        <li>
                            <span class="text-success">Watershed Ecosystem Management</span> - datasets pertaining to forest
                            ecosystem services and integrated watershed management
                        </li>
                        <li>
                            <span class="text-success">Forest Resource use and Assessrnent</span> - datasets to information
                            on the quantification of forest resources and assessment of forest resource use
                        </li>
                        <li>
                            <span class="text-success">Forest Land Use and Allocation</span> - datasets pertaining to forest land use and
                            allocation such as tenure agreements, management arrangements and
                            other projects.
                        </li>
                    </ol>

                    <span>Source: <span class="text-success">Forestry Geospatial Data Guidebook <b>EMB-DENR</b></span></span>
                </div>
            </div>

            <hr style="display: block; height: 1px; border: 0; border-top: 2px solid #ffffff; margin: 0.5em 0; padding: 0;">

            <h5 class="text-white">Maps</h5>

            {{-- This will fetch file folder list in the given directory --}}
            @php
                $folder_path = 'assets/doc/map_layer_files';
                $folder_directory = public_path($folder_path);
                // Initialize an array to store file names
                $folder_list = [];

                // Check if the map directories exists
                if (is_dir($folder_directory)) {
                    // Open the directory
                    if ($handle = opendir($folder_directory)) {
                        // Loop through each file in the directory
                        while (false !== ($file = readdir($handle))) {
                            // Exclude "." and ".." entries
                            if ($file != '.' && $file != '..') {
                                // Increment the counter
                                $folder_list[] = str_replace('.txt', '', $file);
                            }
                        }

                        // Close the directory handle
                        closedir($handle);

                        // Output the total count and list of file names
                        // $totalCount = count($folder_list);
                    } else {
                        echo "Unable to open directory: $folder_directory";
                    }
                } else {
                    echo "Directory does not exist: $folder_directory";
                }
            @endphp

            {{-- display data as list tags --}}
            @php
                $collapsible_counter = 0;
                foreach ($folder_list as $folderName) {
                    // {{-- This will fetch maps list in the given directory --}}
                    $map_path = 'assets/doc/map_layer_files/' . $folderName;
                    $map_directory = public_path($map_path);
                    // Initialize an array to store file names
                    $map_list = [];

                    // Check if the directory exists
                    if (is_dir($map_directory)) {
                        // Open the directory
                        if ($handle = opendir($map_directory)) {
                            // Loop through each file in the directory
                            while (false !== ($file = readdir($handle))) {
                                // Exclude "." and ".." entries
                                if ($file != '.' && $file != '..') {
                                    // Increment the counter
                                    $map_list[] = str_replace('.txt', '', $file);
                                }
                            }

                            // Close the directory handle
                            closedir($handle);

                            // Output the total count and list of file names
                            // $totalCount = count($map_list);
                        } else {
                            echo "Unable to open directory: $map_directory";
                        }
                    } else {
                        echo "Directory does not exist: $map_directory";
                    }

                    echo '<p class="d-inline-flex gap-1">';
                    echo '    <a class="link-light link-offset-2 link-underline link-underline-opacity-0" data-bs-toggle="collapse" href="#mapFolder' . $collapsible_counter . '" role="button" aria-expanded="false" aria-controls="mapFolder' . $collapsible_counter . '">';
                    echo '        <i class="fa fa-folder" aria-hidden="true"></i> ' . $folderName . '';
                    echo '    </a>';
                    echo '    <a ';
                    echo '      class="link-light link-offset-2 link-underline link-underline-opacity-0"';
                    echo '      href="/map-dashboard-main?map='; //start of href

                    // populate maps per folder
                    foreach ($map_list as $mapName) {
                        echo '' . $folderName . '/' . $mapName . ',';
                    }

                    echo '      "'; //end of href
                    echo '      target="_self"';
                    echo '      >';
                    echo '      <span title="View all"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span>';
                    echo '    </a>';
                    echo '</p>';

                    echo '<div class="collapse mb-3" id="mapFolder' . $collapsible_counter . '">';
                    echo '    <div class="border p-2">';

                    // populate maps per folder
                    foreach ($map_list as $mapName) {
                        echo '<div class="text-truncate" style="max-width: 100%;" title="' . $mapName . '"><a href="/map-dashboard-main?map=' . $folderName . '/' . $mapName . '" class="link-light link-offset-2 link-underline link-underline-opacity-0 pb-2"><span class="fa fa-map" aria-hidden="true"></span> ' . $mapName . '</a><br></div>';
                    }

                    echo '    </div>';
                    echo '</div>';

                    $collapsible_counter += 1;
                }
            @endphp
        </div>
    </div>
    {{-- endregion side bar main --}}

    {{-- region side bar setting --}}
    <div class="offcanvas offcanvas-start" style="background: linear-gradient(to right, rgb(146 189 122 / 90%), rgba(51, 139, 147, 0.9))" tabindex="-1" id="FSDsidebarSetting" aria-labelledby="FSDsidebarSettingLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title text-white fw-bold" id="FSDsidebarLabel">Settings</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

            <hr style="display: block; height: 1px; border: 0; border-top: 2px solid #ffffff; margin: 0.5em 0; padding: 0;">

            <div class="d-grid gap-2">
                <button class="btn btn-primary btn-go-back-to-region-v" type="button" data-bs-dismiss="offcanvas" aria-label="Close">Go back to Region V</button>
            </div>

            <hr style="display: block; height: 1px; border: 0; border-top: 2px solid #ffffff; margin: 0.5em 0; padding: 0;">

            <div class="form-check">
                <input class="form-check-input show-location" type="checkbox" value="" id="showLocation">
                <label class="form-check-label text-white" for="flexCheckDefault">
                    Show My Location
                </label>
            </div>

            <hr style="display: block; height: 1px; border: 0; border-top: 2px solid #ffffff; margin: 0.5em 0; padding: 0;">

            <h5 class="text-white">Map Layer / View</h5>

            <ul class="list-group">
                <li class="list-group-item bg-transparent text-white" style="cursor: pointer;">
                    <input class="form-check-input btn-googleLayer" data-map_layer_checker="0" data-map_layer="/vt/lyrs=m&x={x}&y={y}&z={z}" type="radio" name="radio_map_layer" id="radio_map_layer_0">
                    Google Streets <span class="fw-bold text-light">(default)</span> 
                    <div class="float-sm-end"><img src="../assets/css/images/sat0.png" alt="No image found" height="50px"></div>
                </li>
                <li class="list-group-item bg-transparent text-white" style="cursor: pointer;">
                    <input class="form-check-input btn-googleLayer" data-map_layer_checker="1" data-map_layer="/vt/lyrs=s,h&x={x}&y={y}&z={z}" type="radio" name="radio_map_layer" id="radio_map_layer_1">
                    Google Hybrid
                    <div class="float-sm-end"><img src="../assets/css/images/sat1.png" alt="No image found" height="50px"></div>
                </li>
                <li class="list-group-item bg-transparent text-white" style="cursor: pointer;">
                    <input class="form-check-input btn-googleLayer" data-map_layer_checker="2" data-map_layer="/vt/lyrs=s&x={x}&y={y}&z={z}" type="radio" name="radio_map_layer" id="radio_map_layer_2">
                    Google Satellite
                    <div class="float-sm-end"><img src="../assets/css/images/sat2.png" alt="No image found" height="50px"></div>
                </li>
                <li class="list-group-item bg-transparent text-white" style="cursor: pointer;">
                    <input class="form-check-input btn-googleLayer" data-map_layer_checker="3" data-map_layer="/vt/lyrs=p&x={x}&y={y}&z={z}" type="radio" name="radio_map_layer" id="radio_map_layer_3">
                    Google Terrain
                    <div class="float-sm-end"><img src="../assets/css/images/sat3.png" alt="No image found" height="50px"></div>
                </li>
            </ul>

            <hr style="display: block; height: 1px; border: 0; border-top: 2px solid #ffffff; margin: 0.5em 0; padding: 0;">

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary btn-save-changes" type="button">Save changes</button>
            </div>
        </div>
    </div>
    {{-- endregion side bar setting --}}

    {{-- region fetch data by url --}}
    @if (request()->has('map'))
        <input id="map_name" type="hidden" value="{{ request('map') }}">

        {{-- break --}}
    @else
        <input id="map_name" type="hidden" value="na">

        {{-- break --}}
    @endif
    {{-- endregion fetch data by url --}}

    {{-- region footer rights reserved --}}
    <div class="text-center transition-header bg-transparent p-4 d-flex justify-content-center" style="position: fixed; bottom: 0; z-index: 1044;">
        <div style="background-color: rgba(0, 0, 0, 0.7); border-radius: 5px; padding-left: 5px; padding-right: 5px; color: #fff; font-size: 15px">All rights reserved 2024 | <span style="background: -webkit-linear-gradient(#20c997, #009688); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Made with Leaflet</span>🍃 & <span style="background: -webkit-linear-gradient(#20c997, #009688); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Google
                Map</span>🌎
            by DENR V
        </div>
    </div>
    {{-- endregion footer rights reserved --}}

    <script src="/assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.2_dist_js_bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        let map = L.map('map', {
            preferCanvas: true // recommended when loading large layers.
        });

        // zoom to my location
        // map.locate({setView: true, maxZoom: 16});

        // region get session data
        let getMyLocation = sessionStorage.getItem("showLocation");
        let getSatelliteLayer = sessionStorage.getItem("satelliteLayer");
        // endregion get session data

        // get location and pinpoint
        if (getMyLocation == "true") {
            navigator.geolocation.getCurrentPosition(position => {
                const {
                    coords: {
                        latitude,
                        longitude
                    }
                } = position;
                var marker = new L.marker([latitude, longitude], {
                    draggable: true,
                    autoPan: true
                }).addTo(map);
                // console.log(marker);
            })
        }

        // initial start 
        map.setView(new L.LatLng(13.2380864, 123.2900907), 9);

        // region set map view
        $(function() {
            // Go back to region V coordinates
            $('.btn-go-back-to-region-v').click(function() {
                map.setView(new L.LatLng(13.2380864, 123.2900907), 9);

                $('.top-notification-list').empty().append('' +
                    '<li class="list-group-item alert bg-info text-white alert-dismissible fade show" role="alert">' +
                    '       Coordinates has been set to Region V &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' +
                    '       <button type="button" class="pt-2 btn btn-outline-danger btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                    '</li>'
                );
            });
        });
        // endregion set map view

        let transition_time = 5000; //milli seconds 1000 milli seconds = 1 second

        // google map satellite image hybrid: https://stackoverflow.com/questions/9394190/leaflet-map-api-with-google-satellite-layer
        /* 
            googleStreets http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}
            googleHybrid http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}
            googleSat http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}
            googleTerrain http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}
        */

        if (getSatelliteLayer != null) {
            //set custom satellite setting
            OpenTopoMap = L.tileLayer(getSatelliteLayer, {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            });
        } else {
            //set default satellie
            OpenTopoMap = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            });
        }
        // google satellite
        OpenTopoMap.addTo(map);

        // Instantiate KMZ layer (async)
        let kmz = L.kmzLayer().addTo(map);

        kmz.on('load', function(e) {
            control.addOverlay(e.layer, e.name);
            // e.layer.addTo(map);
        });

        // Get the value from the input tag
        let mapName = document.getElementById("map_name").value;
        let mapNameArr = mapName.split(",");
        mapNameArr.forEach(mn => {
            if (mn != "na" && mn != "") { //fetch nothing when value is na(not available) or it contains blank name
                // Add remote KMZ files as layers
                kmz.add('assets/doc/map_layer_files/' + mn);
            }
        });

        let control = L.control.layers(null, null, {
            collapsed: false
        }).addTo(map);

        // region hide layers control
        // $('#map').find('.leaflet-control-layers').hide();
        $('#map').find('.leaflet-control-attribution').hide(); //leaflet link
        // endregion hide layers control
    </script>

    <script src="{{ url('assets/js/fontawesome.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            /* region execute on load */
            let session_showLocation = sessionStorage.getItem('showLocation');
            if (session_showLocation == 'true') {
                $('#showLocation').prop('checked', true);
            }
            /* endregion execute on load */

            // sessionStorage.removeItem('itemName');
            // sessionStorage.getItem('itemName');
            // sessionStorage.setItem('itemName', 'value');

            /* region execute settings */
            $('.btn-save-changes').click(function() {
                let showLocation = $('#showLocation').is(":checked");
                if (showLocation == true) {
                    sessionStorage.setItem('showLocation', true);

                    $('.top-notification-list').empty().append('' +
                        '<li class="list-group-item alert bg-info text-white alert-dismissible fade show" role="alert">' +
                        '       The <strong>"Show Location"</strong> option was set to active. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' +
                        '       <button type="button" class="pt-2 btn btn-outline-danger btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</li>'
                    );
                } else {
                    sessionStorage.removeItem('showLocation');
                }

                // show notifications
                $('.top-notification-list').append('' +
                    '<li class="list-group-item alert bg-info text-white alert-dismissible fade show" role="alert">' +
                    '   <strong>Changes has been saved.</strong> please reload page.   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' +
                    '   <button type="button" class="pt-2 btn btn-outline-danger btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                    '</li>'
                );
            });
            /* endregion execute settings */

            /* region change map layer */
            $('.btn-googleLayer').click(function() {
                let map_layer = 'http://{s}.google.com' + $(this).data('map_layer');
                let map_layer_checker = $(this).data('map_layer_checker')

                // set map layer
                sessionStorage.setItem('satelliteLayer', map_layer);
                sessionStorage.setItem('map_layer_checker', map_layer_checker);
            });
            /* endregion change map layer */

            /* region map layer checker execute during load*/

            // region get session data
            let get_map_layer_checker = sessionStorage.getItem("map_layer_checker");
            // endregion get session data

            if (get_map_layer_checker != null) {
                $('#radio_map_layer_' + get_map_layer_checker).prop('checked', true);
            } else {
                $('#radio_map_layer_0').prop('checked', true);
            }
            /* endregion map layer checker execute during load*/
        });
    </script>
</body>

</html>
