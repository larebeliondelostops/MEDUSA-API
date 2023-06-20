@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Google Maps</h3>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <!-- aqui va el mapa -->
                            <div id="map" style="height: 800px; width: 100%;"></div>
                            <button id="toggle-dark" class="btn btn-primary">Dark</button>
                            <button id="toggle-normal" class="btn btn-primary">Normal</button>
                            <button id="toggle-bonito" class="btn btn-primary">Bonito</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="floating-panel">
            <button id="toggle-Alarmas" class="btn btn-primary invisible">
                <i class="fas fa-eye"></i>Alarmas
            </button>
            <button id="toggle-Cais" class="btn btn-primary invisible">
                <i class="fas fa-eye"></i>Cais
            </button>
            <button id="toggle-Camaras" class="btn btn-primary invisible">
                <i class="fas fa-eye"></i>Camaras
            </button>
            <button id="toggle-PuestosVotacion" class="btn btn-primary invisible">
                <i class="fas fa-eye"></i>PuestosVotacion
            </button>
            <button id="toggle-Salud" class="btn btn-primary invisible">
                <i class="fas fa-eye"></i>Salud
            </button>
            <button id="toggle-heatmap" class="btn btn-primary invisible">
                <i class="fas fa-eye"></i>Calor
            </button>
        </div>
    </section>

    <!-- Define la función de inicialización del mapa -->
    <script>
        let map;
        let mapStyles;
        let geoJsonFeatures;
        let polygon;
        let puntos;
        let mapStates = {
            alarmas: false,
            cais: false,
            camaras: false,
            puestosVotacion: false,
            salud: false
        }
        let openInfoWindows = {
            alarmas: [],
            cais: [],
            camaras: [],
            puestosVotacion: [],
            salud: []
        };
        // Transformar el GeoJSON a un objeto JavaScript
        let geoJson = JSON.parse(@json($geoJsonGeometry))
        let heatmap;
        let heatmapVisible = true;

        function initMap() {
            loadMapStyles('js/mapStylesNormal.json');
            
            fetch('js/GeoJson/locations.json')
            .then(response => response.json())
            .then(json => {
                var locations = [];
                for (var i = 0; i < json.features.length; i++) {
                    var coords = json.features[i].geometry.coordinates;
                    locations.push(new google.maps.LatLng(coords[1], coords[0]));
                }

                // Add a new heatmap layer
                heatmap = new google.maps.visualization.HeatmapLayer({
                    data: locations,
                    map: map,
                });
            });
        }

        function loadMapStyles(stylePath) {
        fetch(stylePath)
            .then(response => response.json())
            .then(styles => {

                // If the map hasn't been initialized yet, create it
                if (!map) {
                    map = new google.maps.Map(document.getElementById("map"), {
                        center: { lat: 4.1340, lng: -73.6257 },
                        zoom: 14
                    });

                    let alarmasData = new google.maps.Data();
                    let caisData = new google.maps.Data();
                    let camarasData = new google.maps.Data();
                    let puestosVotacionData = new google.maps.Data();
                    let saludData = new google.maps.Data();

                    const toggleAlarmas = document.getElementById('toggle-Alarmas');
                    const toggleCais = document.getElementById('toggle-Cais');
                    const toggleCamaras = document.getElementById('toggle-Camaras');
                    const togglePuestosVotacion = document.getElementById('toggle-PuestosVotacion');
                    const toggleSalud = document.getElementById('toggle-Salud');
                    const toggleHeatmap = document.getElementById('toggle-heatmap');

                    map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(toggleAlarmas);
                    map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(toggleCais);
                    map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(toggleCamaras);
                    map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(togglePuestosVotacion);
                    map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(toggleSalud);
                    map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(toggleHeatmap);

                    map.addListener('tilesloaded', function() {
                        toggleAlarmas.classList.remove('invisible');
                        toggleCais.classList.remove('invisible');
                        toggleCamaras.classList.remove('invisible');
                        togglePuestosVotacion.classList.remove('invisible');
                        toggleSalud.classList.remove('invisible');
                        toggleHeatmap.classList.remove('invisible');
                    });

                    toggleAlarmas.addEventListener('click', () => {
                        toggleData(alarmasData, 'alarmas', 'js/GeoJson/alarmas.json', toggleAlarmas, '<i class="fas fa-eye-slash"></i>alarmas', '<i class="fas fa-eye"></i>alarmas');
                    });

                    toggleCais.addEventListener('click', () => {
                        toggleData(caisData, 'cais', 'js/GeoJson/cais.json', toggleCais, '<i class="fas fa-eye-slash"></i>cais', '<i class="fas fa-eye"></i>cais');
                    });

                    toggleCamaras.addEventListener('click', () => {
                        toggleData(camarasData, 'camaras', 'js/GeoJson/camaras.json', toggleCamaras, '<i class="fas fa-eye-slash"></i>camaras', '<i class="fas fa-eye"></i>camaras');
                    });

                    togglePuestosVotacion.addEventListener('click', () => {
                        toggleData(puestosVotacionData, 'puestosVotacion', 'js/GeoJson/puestosVotacion.json', togglePuestosVotacion, '<i class="fas fa-eye-slash"></i>PuestosVotacion', '<i class="fas fa-eye"></i>PuestosVotacion');
                    });

                    toggleSalud.addEventListener('click', () => {
                        toggleData(saludData, 'salud', 'js/GeoJson/salud.json', toggleSalud, '<i class="fas fa-eye-slash"></i>Salud', '<i class="fas fa-eye"></i>Salud');
                    });

                }

                // Apply the new styles to the map
                map.setOptions({ styles: styles });

            });
        }
        // Event listeners for the style toggle buttons
        document.getElementById('toggle-dark').addEventListener('click', () => {
            loadMapStyles('js/mapStylesDark.json');
        });

        document.getElementById('toggle-normal').addEventListener('click', () => {
            loadMapStyles('js/mapStylesNormal.json');
        });

        document.getElementById('toggle-bonito').addEventListener('click', () => {
            loadMapStyles('js/mapStylesBonito.json');
        });
                    
        // Event listener for the heatmap toggle button
        document.getElementById('toggle-heatmap').addEventListener('click', () => {
            if (heatmap) {
                if (heatmapVisible) {
                    heatmap.setMap(null);
                } else {
                    heatmap.setMap(map);
                }
                heatmapVisible = !heatmapVisible;
            }
        });

        function toggleData(dataInstance, key, url, button, showHtml, hideHtml) {
            if (mapStates[key]) {
                dataInstance.setMap(null);
                button.innerHTML = hideHtml;
                
                // Cerrar todas las infowindows abiertas de este tipo de datos.
                openInfoWindows[key].forEach((infoWindow) => infoWindow.close());
                openInfoWindows[key] = [];
            } else {
                dataInstance.loadGeoJson(url);

                // Agrega un listener para el evento 'click' a dataInstance.
                dataInstance.addListener('click', function(event) {
                    const properties = event.feature.h;
                    let contentString = '<div id="content">';
                    console.log(properties);
                    for (const key in properties) {
                        console.log(key);
                        const value = properties[key];
                        contentString += '<p class="card-text">' + key + ': ' + value + '</p>'; 
                    }
                    if(key=="camaras"){
                        contentString += '<iframe width="560" height="315" src="https://cam.xcom.kz:8081/9ring/embed.html" frameborder="0" allowfullscreen></iframe>'
                    }
                    contentString += '</div>';

                    const infowindow = new google.maps.InfoWindow({
                        content: contentString,
                        position: event.latLng, // Posición del marcador
                    });

                    infowindow.open({
                        anchor: event.feature,
                        map,
                        shouldFocus: false,
                    });
                    
                    // Agrega la infowindow al array de infowindows abiertas.
                    openInfoWindows[key].push(infowindow);
                });

                dataInstance.setMap(map);
                button.innerHTML = showHtml;
            }
            mapStates[key] = !mapStates[key];
        }


    </script>

    @push('scripts')
        <!-- Carga la API de Google Maps -->
        <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps.key') }}&libraries=visualization&callback=initMap" async defer>
        </script>
    @endpush
    
@endsection

