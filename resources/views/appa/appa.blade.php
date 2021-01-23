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
                                <div class="toolbar">
                                    <a href="{{route('addAppa')}}" class="nav-link">
                                        <button id="send-mail-list" class="form-control astyle">Ավելացնել</button>
                                    </a>
                                </div>
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
                                <th  data-sortable="true">Անվանում</th>
                                <th  data-sortable="true">Հեռախոսահամար</th>
                                <th class="disabled-sorting text-right"></th>
                                </thead>
                                <tbody>
                                @foreach($data as $element)
                                    <tr>
                                        <th scope="col">{{$element->id}}</th>
                                        <td scope="col">{{$element->name}}</td>
                                        <td scope="col">{{$element->phone}}</td>
                                        <td class='text-right'>
                                            <a href='{{route('updateAppa', $element->id)}}' class='edit a_edit'><i style="color: #b9a206;font-size: 17px;" class='fa fa-edit'></i></a>
                                            <a href='{{route('deleteAppa', $element->id)}}' class='btn btn-link remove'><i class='fa fa-times iclass'></i></a>
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
@section('content6')
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection