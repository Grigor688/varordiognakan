@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bootstrap-table">
                        <div class="card-body table-full-width">
                            <table id="datatables" class="table">
                                <i onclick="goBack()" class="far fa-arrow-alt-circle-left goBack"></i>
                                <br>
                                    <a href="{{route('evakuator')}}" class="btn astyle">Էվակուատոր</a>
                                    <a href="{{route('vulkanacum')}}" style="margin-left: 10px" class="btn astyle">Վուլկանացում</a>
                                @if(session('deleted'))
                                    <div class="alert sesionDivdel">
                                        {{session('deleted')}}
                                    </div>
                                @elseif(session('updated'))
                                    <div class="alert sesionDiv">
                                        {{session('updated')}}
                                    </div>
                                @endif

                                <thead>
                                <th class="disabled-sorting"></th>
                                <th  data-sortable="true">ID</th>
                                <th data-sortable="true">Մասնագիտացում</th>
                                <th data-sortable="true">Հեռ․համար</th>
                                <th  data-sortable="true">Latitude</th>
                                <th  data-sortable="true">Longitude</th>
                                </thead>
                                <tbody>

                                @foreach($data as $element)

                                    <tr>
                                        <td>
                                            <a href='{{route('sosGoogle', $element->id)}}' class='edit a_edit'><i style="color: inherit;font-size: 17px;" class='fas fa-eye'></i></a>
                                            <a href='{{route('google', $element->id)}}' class='edit a_edit'><i style="color: #b9a206;font-size: 17px;" class='fa fa-globe'></i></a>
                                            <a href='{{route('deleteSosUser', $element->id)}}' class='btn btn-link remove'><i class='fa fa-times iclass'></i></a>
                                        </td>
                                        <th scope="col">{{$element->user_id}}</th>
                                        <td scope="col">{{$element->name}}</td>
                                        <td scope="col">{{$element->phone_number}}</td>
                                        <td scope="col">{{$element->lat}}</td>
                                        <td scope="col">{{$element->lng}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('content6')
    <script>
        $(document).ready(function(){
            $(".remove").click(function(){
                $(this).closest("tr");
            })
        })

        function goBack() {
            window.history.back();
        }
    </script>
@endsection