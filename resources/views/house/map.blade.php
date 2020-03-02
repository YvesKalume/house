@extends('layouts.main')
@section('content')
    <main class="page">
        <section class="clean-block slider">
            <div class="container">
                <!-- Start: Intro -->
                <div class="intro">
                    <h2 class="text-center">Résultats</h2>
                    <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. </p>
                </div>
                <!-- End: Intro -->
                <div class="m-auto" id="map"></div>
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
        navigator.geolocation.getCurrentPosition(function(location) {
            var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

            var mymap = L.map('map').setView(latlng, 16);
            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/">Noblart</a> ',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoieXZlc2thbHVtZSIsImEiOiJjazczM3o3ZDIwOGNqM2ZxZWloODZqYzB3In0.ogvXbq39v5mFwS5LBb-1FA'
            }).addTo(mymap);
            const myPosition = L.marker(latlng).addTo(mymap);

            var circle = L.circle(latlng, {
                color: 'rgba(255,0,51,0.4)',
                fillColor: 'rgba(255,0,51,0)',
                fillOpacity: 0.5,
                radius: 250
            }).addTo(mymap);



            var houses = @json($houses);
            houses.forEach((house)=>{
                let marker = L.marker([house.lat,house.long]).addTo(mymap);
                marker.bindPopup(`<b>${house.price}$</b><br>${house.pieces} pieces <br><a href="/house/${house.id}">Voir</a>`).openPopup();
            })


        });
    </script>
@endsection

@section('header-style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>
    <style>
        #map{ height: 550px; }
    </style>
@endsection

