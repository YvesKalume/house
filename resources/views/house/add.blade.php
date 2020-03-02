@extends('layouts.main')
@section('content')
    <main class="page payment-page">
        <section class="clean-block payment-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Payment</h2>
                    <p>Cliquez sur l'icone de recherche '<i class="fas fa-search"></i>" et entrez l'addresse du batiment que vous voulez ajouter</p>
                </div>
                <form id="houseForm" action="{{route('house.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div id="map" class="title"></div>
                    <div class="card-details">
                        <h3 class="title">Information</h3>
                        <div class="form-row">
                            <div class="col-sm-12">
                                {{--hidden inputs for longitude and latitude--}}
                                <input type="text" name="lat" id="latInput" hidden>
                                <input type="text" name="long" id="longInput" hidden>

                                <div class="form-group">
                                    <label for="avenue">Avenue</label>
                                    <input name="avenue" class="form-control" id="avenue" type="text">
                                </div>
                            </div>

                            <div class="form-group col-sm-7">
                                <label for="number">Numero du batiment</label>
                                <input name="number" class="form-control" id="number" type="text">
                            </div>

                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="price">Prix ($)</label>
                                        <input id="price" name="price" class="form-control" type="number">
                                </div>
                            </div>

                            <div class="col-sm-8">
                                <div class="form-group"><label for="status">Status</label>
                                    <select id="status" name="status" class="form-control">
                                        @foreach($statuses as $status)
                                            <option value="{{$status->id}}">{{$status->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <label for="pieces">Nobre des pieces</label>
                                <input class="form-control" name="pieces" id="pieces" type="number">
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="square">Quartier</label>
                                    <input class="form-control" type="text" id="square" name="square" placeholder="Quartier">
                                </div>
                            </div>

                            <div class="col">
                                <label for="picture">Image</label>
                                <input id="picture" name="picture" class="border rounded form-control" type="file" accept="image/*">
                            </div>

                            <div class="col-sm-12">
                                <label for="descrition">Description</label>
                                <textarea id="descrition" name="description" class="form-control"></textarea>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Ajouter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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

            var mymap = L.map('map').setView(latlng, 16)
            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://mapbox.com">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox.streets',
                accessToken: 'pk.eyJ1IjoieXZlc2thbHVtZSIsImEiOiJjazczM3o3ZDIwOGNqM2ZxZWloODZqYzB3In0.ogvXbq39v5mFwS5LBb-1FA'
            }).addTo(mymap);

            var marker = L.marker(latlng).addTo(mymap);

            mymap.on('click',function(e){
                marker.setLatLng(e.latlng).addTo(mymap);
                $('#latInput').val(marker.getLatLng().lat)
                $('#longInput').val(marker.getLatLng().lng)
            });

        });
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

