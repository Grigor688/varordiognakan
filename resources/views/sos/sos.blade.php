@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bootstrap-table">
                        <div class="card-body table-full-width">
                            <table id="datatables" class="table">
                                    <a href="{{route('evakuator')}}" class="btn btn-primary">Էվակուատոր</a>
                                    <a href="{{route('vulkanacum')}}" style="margin-left: 10px" class="btn btn-primary">Վուլկանացում</a>
                                @if(session('deleted'))
                                    <div class="alert alert-danger sesionDiv">
                                        {{session('deleted')}}
                                    </div>
                                @elseif(session('updated'))
                                    <div class="alert alert-success sesionDiv">
                                        {{session('updated')}}
                                    </div>
                                @endif

                                <thead>
                                <th  data-sortable="true">#</th>
                                <th class="disabled-sorting text-right"></th>
                                <th  data-sortable="true">Անուն</th>
                                <th  data-sortable="true">Ազգանուն</th>
                                <th data-sortable="true" class="text-center">Հեռ․համար</th>
                                <th  data-sortable="true">Ավտոմեքենայի համար</th>
                                <th  data-sortable="true">ԱՊՊԱ</th>
                                <th  data-sortable="true">Մեքենայի արտ․</th>
                                <th  data-sortable="true">Տարեթիվ</th>
                                <th  data-sortable="true">Մոդել</th>
                                <th  data-sortable="true">Շարժիչ</th>
                                <th  data-sortable="true">Վին կոդ</th>
                                <th  data-sortable="true">Կցված սպս․ կետ</th>
                                <th  data-sortable="true">Latitude</th>
                                <th  data-sortable="true">Longitude</th>
                                </thead>
                                <tbody>

                                @foreach($data as $element)

                                    <tr>
                                        <th scope="col">{{$element->id}}</th>
                                        <td class='text-right'>
                                            <a href='{{route('google', $element->id)}}' class='btn btn-link btn-primary edit a_edit'><i style="color: white" class='fa fa-edit'></i></a>
                                            <a href='#' class='btn btn-link btn-danger remove'><i class='fa fa-times'></i></a>
                                        </td>
                                        <td scope="col">{{$element->firstname}}</td>
                                        <td scope="col">{{$element->lastname}}</td>
                                        <td scope="col">{{$element->phone_number}}</td>
                                        <td scope="col">{{$element->car_number}}</td>
                                        <td scope="col">{{$element->appa}}</td>
                                        <td scope="col">{{$element->car_company}}</td>
                                        <td scope="col">{{$element->car_year}}</td>
                                        <td scope="col">{{$element->car_model}}</td>
                                        <td scope="col">{{$element->car_engine}}</td>
                                        <td scope="col">{{$element->vin_code}}</td>
                                        <td scope="col">{{$element->service_point}}</td>
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
    </script>
@endsection