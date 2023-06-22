<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">

                {{-- Titulo proyecto--}}

                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">MEDUSA</h3>
                    </div>
                </div>

                {{-- Aqui va el mapa--}}

                <div class="card">
                    <div class="card-body">
                        <div id="map" style="height: 800px; width: 100%;"></div>
                    </div>
                </div>

                {{-- Botones para activar filtros del mapa (Estilos)--}}

                <div class="card">
                    <div class="card-body">
                        <button id="toggle-dark" class="btn btn-primary">Dark</button>
                        <button id="toggle-normal" class="btn btn-primary">Normal</button>
                        <button id="toggle-bonito" class="btn btn-primary">Bonito</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Botones para activar capas en el mapa --}}

    <div id="floating-panel">
        <div class="divmap">
            <div class="carta">
                <button id="toggle-Alarmas" class="button-74" data-tooltip="Alarmas">
                    <span class="material-icons">upcoming</span>
                </button>
            </div>
            <div class="carta">
                <button id="toggle-Cais" class="button-74" data-tooltip="Cais">
                    <span class="material-icons">local_police</span>
                </button>
            </div>
            <div class="carta">
                <button id="toggle-Camaras" class="button-74" data-tooltip="Camaras">
                    <span class="material-icons">videocam</span>
                </button>
            </div>
            <div class="carta">
                <button id="toggle-PuestosVotacion" class="button-74" data-tooltip="Puestos de Votacion">
                    <span class="material-icons">where_to_vote</span>
                </button>
            </div>
            <div class="carta">
                <button id="toggle-Salud" class="button-74" data-tooltip="Salud">
                    <span class="material-icons">local_hospital</span>
                </button>
            </div>
            <div class="carta">
                <button id="toggle-heatmap" class="button-74" data-tooltip="Calor">
                    <span class="material-icons">local_fire_department</span>
                </button>
            </div>
            <div class="carta">
                <button id="toggle-trafic" class="button-74" data-tooltip="Trafico">
                    <span class="material-icons">traffic</span>
                </button>
            </div>
        </div>
    </div>


</section>