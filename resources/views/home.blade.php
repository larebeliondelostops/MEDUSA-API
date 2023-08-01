@extends('layouts.app')

@section('content')

@include('Modulos.Mapa.body')

<input type="text" id="coords" />
<button onclick="exportToJson()">Descargar JSON</button>

<!-- Agregar un elemento para mostrar el contador -->
<div>
    <p>Contador de direcciones almacenadas: <span id="address-counter" class="large-counter">0</span></p>
</div>

<script>
var marker;
var coords = {};
var addressData = [];

initMap = function () {
    navigator.geolocation.getCurrentPosition(
        function (position) {
            coords = {
                lng: position.coords.longitude,
                lat: position.coords.latitude
            };
            setMapa(coords);
            getAddressFromCoords(coords); // Obtener dirección inicial
        },
        function (error) {
            console.log(error);
        }
    );
};

function setMapa(coords) {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        center: new google.maps.LatLng(coords.lat, coords.lng),
    });

    marker = new google.maps.Marker({
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: new google.maps.LatLng(coords.lat, coords.lng),
    });

    marker.addListener('click', toggleBounce);

    marker.addListener('dragend', function (event) {
        var newCoords = {
            lat: this.getPosition().lat(),
            lng: this.getPosition().lng()
        };
        document.getElementById('coords').value = newCoords.lat + ',' + newCoords.lng;
        getAddressFromCoords(newCoords); // Obtener dirección después de arrastrar el marcador
    });
}

function toggleBounce() {
    if (marker.getAnimation() !== null) {
        marker.setAnimation(null);
    } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
    }
}

function getAddressFromCoords(coords) {
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode(
        { location: { lat: coords.lat, lng: coords.lng } },
        function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var address = results[0].formatted_address;
                    addressData.push(address);
                    updateAddressList();
                }
            }
        }
    );
}

function updateAddressList() {
    var addressList = document.getElementById('address-list');
    addressList.innerHTML = addressData.map((address) => '<li>' + address + '</li>').join('');

    // Actualizar el contador
    var addressCounter = document.getElementById('address-counter');
    addressCounter.textContent = addressData.length;
}

function exportToJson() {
    var dataStr = JSON.stringify(addressData, null, 2);
    var dataUri = 'data:application/json;charset=utf-8,' + encodeURIComponent(dataStr);

    var exportFileDefaultName = 'address_data.json';

    var linkElement = document.createElement('a');
    linkElement.setAttribute('href', dataUri);
    linkElement.setAttribute('download', exportFileDefaultName);
    linkElement.click();
}
</script>

@push('scripts')
<!-- Carga la API de Google Maps -->
<script
    src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps.key') }}&libraries=visualization&callback=initMap"
    async defer>
</script>
@endpush

<div>
    <ul id="address-list"></ul>
</div>

<style>
    /* Estilos para el contador grande */
    .large-counter {
        font-size: 24px;
    }
</style>

@endsection
