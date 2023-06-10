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
    </section>

    <!-- Define la función de inicialización del mapa -->
    <script>
        let map;
        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 4.1340, lng: -73.6257 },
                zoom: 14,
            });
            map.data.loadGeoJson('js/Cabeceras.json');
        }
    </script>

    @push('scripts')
        <!-- Carga la API de Google Maps con tu clave -->
        <script async src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps.key') }}&callback=initMap">
        </script>
    @endpush
@endsection

