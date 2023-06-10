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
                            <x-maps-google :markers="[['lat' => 4.1340, 'long' => -73.6257]]" :zoomLevel="14" :centerPoint="['lat' => 4.1340, 'long' => -73.6257]"></x-maps-google> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

