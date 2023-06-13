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
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="floating-panel">
            <button id="show-geojson" class="btn btn-primary">
                <i class="fas fa-eye"></i> Show GeoJSON
            </button>
            <button id="hide-geojson" class="btn btn-primary">
                <i class="fas fa-eye-slash"></i> Hide GeoJSON
            </button>
        </div>
    </section>

    <!-- Define la función de inicialización del mapa -->
    <script>
        let map;
        let geoJsonFeatures;
        let polygon;
        // Transformar el GeoJSON a un objeto JavaScript
        let geoJson = JSON.parse(@json($geoJsonGeometry));
        
        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 4.1340, lng: -73.6257 },
                zoom: 14,
            });
            map.data.loadGeoJson('js/Cabeceras.json');

            // Crea un nuevo polígono de Google Maps
            let polygon = new google.maps.Polygon({
                paths: geoJson.coordinates[0].map(function(coord) {
                    // Recuerda que Google Maps usa la estructura {lat: Number, lng: Number}, y el orden de las coordenadas es latitud, luego longitud
                    return {lat: coord[1], lng: coord[0]};
                }),
                map: map,
            });

            // Crear los elementos de control (botones)
            const showGeoJsonButton = document.getElementById('show-geojson');
            const hideGeoJsonButton = document.getElementById('hide-geojson');

            // Crear una nueva div para contener los elementos de control
            const controlDiv = document.createElement('div');
            controlDiv.style.margin = '10px';
            controlDiv.appendChild(showGeoJsonButton);
            controlDiv.appendChild(hideGeoJsonButton);

            // Añadir la div de control al mapa
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(controlDiv);

            // Añadir funcionalidad a los botones
            showGeoJsonButton.addEventListener('click', () => {
                polygon.setMap(map);
                map.data.setMap(map);
            });
            hideGeoJsonButton.addEventListener('click', () => {
                polygon.setMap(null);
                map.data.setMap(null);
            });
        }
    </script>

    @push('scripts')
        <!-- Carga la API de Google Maps con tu clave -->
        <script async src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps.key') }}&callback=initMap">
        </script>
    @endpush
@endsection

