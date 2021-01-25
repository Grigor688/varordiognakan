@extends('layouts.app')
@section('content')
    <i onclick="goBack()" class="far fa-arrow-alt-circle-left goBack"></i>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bootstrap-table">
                        <div class="card-body table-full-width">
                            <table id="datatables" class="table">
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
                                            <a href='{{route('sosGoogle', $element->id)}}' class='edit a_edit'><i style="color: inherit;font-size: 17px;" class='fas fa-eye'></i></a>
                                            <a href='{{route('google', $element->id)}}' class='edit a_edit'><i style="color: #b9a206;font-size: 17px;" class='fa fa-edit'></i></a>
                                            <a href='#' class='btn btn-link remove'><i class='fa fa-times iclass'></i></a>
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

        function goBack() {
            window.history.back();
        }
    </script>
@endsection