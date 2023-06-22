@extends('layouts.app')

@section('content')

@include('Modulos.Mapa.body')

<script>


    let map;
    let mapStyles;
    let geoJsonFeatures;
    let polygon;
    let puntos;
    let heatmap;
    let trafficLayer;

    /* Variables de estado para activar o desactivar las capas del mapa */

    let mapStates = {
        alarmas: false,
        cais: false,
        camaras: false,
        puestosVotacion: false,
        salud: false
    }
    let trafficLayerVisible = true;
    let heatmapVisible = true;

    /* Variables de estado para activar o desactivar los infowindows del mapa */

    let openInfoWindows = {
        alarmas: [],
        cais: [],
        camaras: [],
        puestosVotacion: [],
        salud: []
    };

    // Transformar el GeoJSON a un objeto JavaScript

    let geoJson = JSON.parse(@json($geoJsonGeometry))

    /* Funcion para cargar el mapa */

    function initMap() {
        loadMapStyles('js/mapStylesNormal.json');
        loadHeadMap();

    }

    /* Carga el mapa de calor */

    function loadHeadMap(){
            fetch('js/GeoJson/locations.json')
            .then(response => response.json())
            .then(json => {
                var locations = [];
                for (var i = 0; i < json.features.length; i++) {
                    var coords = json.features[i].geometry.coordinates;
                    locations.push(new google.maps.LatLng(coords[1], coords[0]));
                }

                // Aplica estilo al mapa
                heatmap = new google.maps.visualization.HeatmapLayer({
                    data: locations,
                    map: null,
                });
            });
    }

     /* Funcion para cargar los estilos del mapa */

     function loadMapStyles(stylePath) {
        fetch(stylePath)
            .then(response => response.json())
            .then(styles => {

                inicializarMap();

            });
    }

    /* Funcion para inicializar mapa */

    function inicializarMap(){

        // Si el mapa no ha sido inicializado aun, lo crea

        if (!map) {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 4.1340,
                    lng: -73.6257
                },
                zoom: 14
            });
            
            loadButtonsMap();

            // Aplica estilo al mapa
            map.setOptions({
                styles: styles
            });
        }
    }

    /* Carga la funcionalidad de los botones para el mapa */

    function loadButtonsMap(){

        trafficLayer = new google.maps.TrafficLayer();
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

        /* Añade EventListener a cada boton */

        toggleAlarmas.addEventListener('click', () => {
            toggleData(alarmasData, 'alarmas', 'js/GeoJson/alarmas.json', toggleAlarmas, '<span class="material-icons">upcoming</span>', '<span class="material-icons">upcoming</span>');
         });

        toggleCais.addEventListener('click', () => {
            toggleData(caisData, 'cais', 'js/GeoJson/cais.json', toggleCais, '<span class="material-icons">local_police</span>', '<span class="material-icons">local_police</span>');
        });

        toggleCamaras.addEventListener('click', () => {
            toggleData(camarasData, 'camaras', 'js/GeoJson/camaras.json', toggleCamaras, '<span class="material-icons">videocam</span>', '<span class="material-icons">videocam</span>');
        });

        togglePuestosVotacion.addEventListener('click', () => {
            toggleData(puestosVotacionData, 'puestosVotacion', 'js/GeoJson/puestosVotacion.json', togglePuestosVotacion, '<span class="material-icons">where_to_vote</span>', '<span class="material-icons">where_to_vote</span>');
        });

        toggleSalud.addEventListener('click', () => {
            toggleData(saludData, 'salud', 'js/GeoJson/salud.json', toggleSalud, '<span class="material-icons">local_hospital</span>', '<span class="material-icons">local_hospital</span>');
        });
    }

    // Interaccion para botones de filtros

    document.getElementById('toggle-dark').addEventListener('click', () => {
        loadMapStyles('js/mapStylesDark.json');
    });

    document.getElementById('toggle-normal').addEventListener('click', () => {
        loadMapStyles('js/mapStylesNormal.json');
    });

    document.getElementById('toggle-bonito').addEventListener('click', () => {
        loadMapStyles('js/mapStylesBonito.json');
    });

    // Interaccion para boton de mapa de calor

    document.getElementById('toggle-heatmap').addEventListener('click', () => {
        if (heatmap) {
            if (heatmapVisible) {
                heatmap.setMap(map);
            } else {
                heatmap.setMap(null);
            }
            heatmapVisible = !heatmapVisible;
        }
    });

    // Interaccion para boton de trafico

    document.getElementById('toggle-trafic').addEventListener('click', () => {
        if (trafficLayer) {
            if (trafficLayerVisible) {
                trafficLayer.setMap(map);
            } else {
                trafficLayer.setMap(null);
            }
            trafficLayerVisible = !trafficLayerVisible;
        }
    });

    /* Funcion para cargar la informacion de cada marcador segun corresponda */

    function toggleData(dataInstance, key, url, button, showHtml, hideHtml) {
        if (mapStates[key]) {

            /* Apaga los marcadores si el boton se apaga */

            dataInstance.setMap(null);
            button.innerHTML = hideHtml;

            // Cerrar todas las infowindows abiertas cuando se apague boton.

            openInfoWindows[key].forEach((infoWindow) => infoWindow.close());
            openInfoWindows[key] = [];

        } else {

            /* Carga informacion del .json */

            dataInstance.loadGeoJson(url);

            // Agrega la informacion a cada infowindow

            dataInstance.addListener('click', function(event) {
                const properties = event.feature.h;
                let contentString = '<div id="content" class="card" style="color:#000">';
                console.log(properties);
                for (const key in properties) {
                    console.log(key);
                    const value = properties[key];
                    if (key != "URL") {
                        contentString += '<div class="card-body">' + '<h1 class="hinfo">' + key + ': ' + '</h1>' + value + '</div>';
                    }
                }

                /*Si son marcadores de camara muestra una camara en infowindow  */

                if (key == "camaras") {
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
<script
    src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps.key') }}&libraries=visualization&callback=initMap"
    async defer>
</script>
@endpush

@endsection