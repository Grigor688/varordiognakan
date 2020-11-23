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
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="mapDiv">
                    <div id="map"></div>
                </div>
                <div>
                    <select id="apps" class="form-control">
                        <option value="0">Ծառայություններ</option>
                        <option value="1">էվակուատոր</option>
                        <option value="2">Վուլկանացում</option>
                    </select>
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
                .setHTML('<h6>Ձեր գտնվելու վայրը</h6>');

            var marker = new mapboxgl.Marker()
                .setLngLat([{{ $data->lng }}, {{ $data->lat }}])
                .setPopup(popupLoc) // sets a popup on this marker
                .addTo(map)


            $("#apps").change(function(){
                var value = $(this).val()
                if (value == 1) {
                    $('.mapboxgl-marker').slice(1).hide();
                    $.ajax({
                        type:"POST",
                        url:'{{route('postEvakuators')}}',
                        data:{
                            '_token': "{{ csrf_token() }}",
                            'value': value
                        },
                        success: function(data) {
                            var data = JSON.parse(data);

                            if(data.type == 1){
                                $(data.content).each(function(index, value){

                                    // create the popup
                                    var popup = new mapboxgl.Popup({ offset: 25 })
                                        .setHTML('<h6><u>Անուն</u> - '+value.name+'</h6>'+
                                                '<h6><u>Հեռախոսահամար</u> - '+value.phone+'</h6>'+
                                                '<h6><u>Հասցե</u> - '+value.adress+'</h6>'
                                               );





                                    var marker = new mapboxgl.Marker({color:"red"})
                                    .setLngLat([value['lng'], value['lat']])
                                    .setPopup(popup) // sets a popup on this marker
                                    .addTo(map);

                                    // var el = marker._element;
                                    // el.classList.add('hidden');


                                });

                            }

                        }


                        }
                    )

                }else if (value == 2) {
                    $('.mapboxgl-marker').slice(1).hide();
                    $.ajax({
                            type:"POST",
                            url:'{{route('postEvakuators')}}',
                            data:{
                                '_token': "{{ csrf_token() }}",
                                'value': value
                            },
                            success: function(data) {
                                var data = JSON.parse(data);

                                if(data.type == 1){
                                    $(data.content).each(function(index, value){

                                        // create the popup
                                        var popup = new mapboxgl.Popup({ offset: 25 })
                                            .setHTML('<h6>Անուն - '+value.name+'</h6>'+
                                                '<h6>Հեռախոսահամար - '+value.phone+'</h6>'+
                                                '<h6>Հասցե - '+value.adress+'</h6>'
                                            );


                                        var marker = new mapboxgl.Marker({color:"red"})
                                            .setLngLat([value['lng'], value['lat']])
                                            .setPopup(popup) // sets a popup on this marker
                                            .addTo(map);

                                        // var el = marker._element;
                                        // el.classList.add('hidden');


                                    });

                                }

                            }


                        }
                    )

                }


            })



        })

        {{--@foreach($evakuator as $el)--}}
                {{--var marker{{$el->id}} = new mapboxgl.Marker()--}}
                {{--.setLngLat([{{$el->lng}}, {{$el->lat}}])--}}
                {{--.addTo(map);--}}
        {{--@endforeach--}}
    </script>
@endsection
