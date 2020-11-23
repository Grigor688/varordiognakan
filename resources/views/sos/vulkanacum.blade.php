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
                                    <a href="{{route('addVulkanacum')}}" class="nav-link">
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
                                <th  data-sortable="true">Անվանում</th>
                                <th  data-sortable="true">Հեռ․համար</th>
                                <th  data-sortable="true">Հասցե</th>
                                <th  data-sortable="true">Latitude</th>
                                <th  data-sortable="true">Longitude</th>
                                <th class="disabled-sorting text-right"></th>
                                </thead>
                                <tbody>
                                @foreach($all as $element)
                                    <tr>
                                        <th scope="col">{{$element->id}}</th>
                                        <td scope="col">{{$element->name}}</td>
                                        <td scope="col">{{$element->phone}}</td>
                                        <td scope="col">{{$element->adress}}</td>
                                        <td scope="col">{{$element->lat}}</td>
                                        <td scope="col">{{$element->lng}}</td>
                                        <td class='text-right'>
                                            <a href='{{route('updateVulkanacum', $element->id)}}' class='btn btn-link btn-warning edit a_edit'><i class='fa fa-edit'></i></a>
                                            <a href='{{route('deleteVulkanacum', $element->id)}}' class='btn btn-link btn-danger remove'><i class='fa fa-times'></i></a>
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