@extends('layouts.app')
<styles>
    .info-window {
    max-width: 200px;
    }
</styles>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="floating-panel">
            <button id="toggle-Alarmas" class="btn btn-primary invisible">
                <i class="fas fa-eye-slash"></i>Alarmas
            </button>
            <button id="toggle-Cais" class="btn btn-primary invisible">
                <i class="fas fa-eye-slash"></i>Cais
            </button>
            <button id="toggle-Camaras" class="btn btn-primary invisible">
                <i class="fas fa-eye-slash"></i>Camaras
            </button>
            <button id="toggle-PuestosVotacion" class="btn btn-primary invisible">
                <i class="fas fa-eye-slash"></i>PuestosVotacion
            </button>
            <button id="toggle-Salud" class="btn btn-primary invisible">
                <i class="fas fa-eye-slash"></i>Salud
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
        // Transformar el GeoJSON a un objeto JavaScript
        let geoJson = JSON.parse(@json($geoJsonGeometry))

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 4.1340, lng: -73.6257 },
                zoom: 14,
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

            map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(toggleAlarmas);
            map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(toggleCais);
            map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(toggleCamaras);
            map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(togglePuestosVotacion);
            map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(toggleSalud);

            map.addListener('tilesloaded', function() {
                toggleAlarmas.classList.remove('invisible');
                toggleCais.classList.remove('invisible');
                toggleCamaras.classList.remove('invisible');
                togglePuestosVotacion.classList.remove('invisible');
                toggleSalud.classList.remove('invisible');
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

        function toggleData(dataInstance, key, url, button, showHtml, hideHtml) {
            if (mapStates[key]) {
                dataInstance.setMap(null);
                button.innerHTML = hideHtml;
            } else {
                dataInstance.loadGeoJson(url);

                    // Agrega un listener para el evento 'click' a dataInstance.
                    dataInstance.addListener('click', function(event) {

                    const nombre = event.feature.getProperty('Nombre');
                    const direccion = event.feature.getProperty('Direccion');

                    const contentString = '<div id="content">' +
                    '<div id="siteNotice">' +
                    '<p class="card-title">' + "Nombre: "+ nombre + '</p>' +
                    '<p class="card-text">' + "Direccion: "+ direccion + '</p>' +
                    "</div>" +
                    "</div>";

                    const infowindow = new google.maps.InfoWindow({
                        content: contentString,
                        position: event.latLng, // Posición del marcador
                    });

                    infowindow.open({
                        anchor: event.feature,
                        map,
                        shouldFocus: false,
                    });
                    
                });
                
                dataInstance.setMap(map);
                button.innerHTML = showHtml;
            }
            mapStates[key] = !mapStates[key];
        }


    </script>

    @push('scripts')
        <!-- Carga la API de Google Maps -->
        <script async src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps.key') }}&callback=initMap">
        </script>
    @endpush
    
@endsection

