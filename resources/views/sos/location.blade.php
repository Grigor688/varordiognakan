@extends('layouts.app')
@section('content')
    <i onclick="goBack()" class="far fa-arrow-alt-circle-left goBack"></i>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bootstrap-table">
                        <div class="card-body table-full-width">
                            {{--<a href="https://www.google.com/maps/search/?api=1&query={{$data->lat}},{{$data->lng}}&query_place_id=ChIJKxjxuaNqkFQR3CK6O1HNNqY">Օգտատիրոջ հասցեն</a>--}}
                            <a target="_blank." style="font-size: 22px;" href="https://yandex.ru/maps/?pt={{$data->lng}},{{$data->lat}}&z=18&l=map">Օգտատիրոջ հասցե</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content6')
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection