@extends('layouts.main')
@section('content')
    <main class="page product-page">
        <section class="clean-block clean-product dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Preview Page</h2>
                </div>
                <div class="block-content">
                    <div class="product-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <div><img class="img-fluid d-block mx-auto" src="/storage/{{$house->picture}}"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info">
                                    <h3>{{$house->avenue}}</h3>
                                    <ul class="list-group">
                                        <li class="list-group-item">Quartier : {{$house->square}}</li>
                                        <li class="list-group-item">Status : {{$house->status->name}}</li>
                                        <li class="list-group-item">Pieces : {{$house->pieces}}</li>
                                        <li class="list-group-item">Posté Par : {{$house->user->name}} </li>
                                        <li class="list-group-item">Prix : <span class="text-danger">{{$house->price}}</span> Fc</li>
                                    </ul>
                                    <div class="price">
                                    </div><button class="btn btn-primary" type="button"><i class="fas fa-home"></i>Je suis interesser</button></div>
                            </div>
                        </div>
                    </div>
                    <div class="product-info">
                        <div>
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" id="reviews-tab" href="#mapcontainer">Localisation</a></li>
                                <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" id="description-tab" href="#description">Description</a></li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane active fade show" role="tabpanel" id="mapcontainer">
                                    <div class="reviews">
                                        <div class="review-item" id="map">
                                         {{--map--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show description" role="tabpanel" id="description">
                                    {{$house->description}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('footer-script')

    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin="">
    </script>

    <script>
        var mymap = L.map('map').setView(['{{$house->lat}}','{{$house->long}}'], 16);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/">Noblart</a> ',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoieXZlc2thbHVtZSIsImEiOiJjazczM3o3ZDIwOGNqM2ZxZWloODZqYzB3In0.ogvXbq39v5mFwS5LBb-1FA'
        }).addTo(mymap);
        var marker = L.marker(['{{$house->lat}}','{{$house->long}}']).addTo(mymap);

        marker.bindPopup("<b>Hey ! je suis là</b>").openPopup();
    </script>
@endsection

@section('header-style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>
    <style>
        #map{ height: 300px; }
    </style>
@endsection
