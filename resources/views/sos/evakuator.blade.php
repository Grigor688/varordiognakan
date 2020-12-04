@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bootstrap-table">
                        <div class="card-body table-full-width">
                            <table id="datatables" class="table">
                                <div class="toolbar">
                                    <a href="{{route('addevakuator')}}" class="nav-link">
                                        <button id="send-mail-list" class="form-control btn-success">Ավելացնել</button>
                                    </a>
                                </div>
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
                                    <th  data-sortable="true">Անվանում</th>
                                    <th  data-sortable="true">Մասնագիտացում</th>
                                    <th data-sortable="true" class="text-center">Գործունեություն</th>
                                    <th  data-sortable="true">Աշխատանքի օրերը սկսած</th>
                                    <th  data-sortable="true">Աշխատանքի օրերը մինչև</th>
                                    <th  data-sortable="true">Հեռ․համար</th>
                                    <th  data-sortable="true">Էլ․փոստ</th>
                                    <th  data-sortable="true">Վեբ կայք</th>
                                    <th  data-sortable="true">Հասցե</th>
                                    <th  data-sortable="true">Թվային հասցե</th>
                                    <th  data-sortable="true">Գործընկեր</th>
                                    <th  data-sortable="true">Առաջարկի սկիզբ</th>
                                    <th  data-sortable="true">Առաջարկի ավարտ</th>
                                    <th  data-sortable="true">Հատուկ առաջարկ</th>
                                    <th  data-sortable="true">Ուղղվածություն</th>
                                    <th  data-sortable="true">Latitude</th>
                                    <th  data-sortable="true">Longitude</th>
                                    <th class="disabled-sorting text-right"></th>
                                </thead>
                                <tbody>

                                @foreach($data as $element)

                                    <tr>
                                        <th scope="col">{{$element->id}}</th>
                                        <td class='text-right'>
                                            <a href='{{route('serviceMap', $element->id)}}' class='btn btn-link btn-succes edit a_edit'><i class="fa fa-globe" aria-hidden="true"></i></a>
                                        </td>
                                        <td scope="col">{{$element->name_company}}</td>
                                        <td scope="col">{{$element->name}}</td>
                                        <td scope="col">{{$element->activity}}</td>
                                        <td scope="col">{{$element->work_day_from}}</td>
                                        <td scope="col">{{$element->work_day_to}}</td>
                                        <td scope="col">{{$element->phone_number}}</td>
                                        <td scope="col">{{$element->email}}</td>
                                        <td scope="col">{{$element->site}}</td>
                                        <td scope="col">{{$element->adress}}</td>
                                        <td scope="col">{{$element->number_adress}}</td>
                                        <td scope="col">{{$element->getStatus($element->partner)}}</td>
                                        <td scope="col">{{$element->special_offer_time_from}}</td>
                                        <td scope="col">{{$element->special_offer_time_to}}</td>
                                        <td scope="col">{{$element->special_offer}}</td>
                                        <td scope="col">{{$element->orientation}}</td>
                                        <td scope="col">{{$element->lat}}</td>
                                        <td scope="col">{{$element->lng}}</td>
                                        <td class='text-right'>
                                            <a href='{{route('updateEvakuator', $element->id)}}' class='btn btn-link btn-primary edit a_edit'><i style="color: white" class='fa fa-edit'></i></a>
                                            <a href='{{route('deleteEvakuator', $element->id)}}' class='btn btn-link btn-danger remove'><i class='fa fa-times'></i></a>
                                        </td>
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