@extends('layouts.app')
@section('content4')
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no"/>
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" rel="stylesheet"/>
    <style>
        .mapboxgl-popup-content{
            border: 1px solid #7e6161;
            width: 20vw;
            word-break: break-all;
        }
    </style>
@endsection

@section('content')
    <i onclick="goBack()" class="far fa-arrow-alt-circle-left goBack"></i>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="mapDiv">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content6')
    <script>
        $(document).ready(function () {

            mapboxgl.accessToken = 'pk.eyJ1IjoiaGF5a2JhZ2hkYXNhcnlhbiIsImEiOiJja2N4aWl4encwMGR2MnZsYWhqZmZwbmFqIn0.TqqvzhGk3yJQlWzFeH2rqA';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [{{ $data->lng }}, {{ $data->lat }}],
                zoom: 14,
            });

            var popupLoc = new mapboxgl.Popup({ offset: 25 })
                .setHTML('<h6>Սպասարկման կետի հասցե</h6>');

            var marker = new mapboxgl.Marker()
                .setLngLat([{{ $data->lng }}, {{ $data->lat }}])
                .setPopup(popupLoc) // sets a popup on this marker
                .addTo(map)





        })
        function goBack() {
            window.history.back();
        }
    </script>
@endsection
