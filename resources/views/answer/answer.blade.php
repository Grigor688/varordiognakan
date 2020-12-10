@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bootstrap-table">
                        <div class="card-body table-full-width">
                            <table id="datatables" class="table">
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
                                <th  data-sortable="true">Վերնագիր</th>
                                <th  data-sortable="true">Հարց</th>
                                <th data-sortable="true" class="text-center">Պատասխան</th>
                                <th data-sortable="true" class="text-center">Տարբեարակում</th>
                                <th class="disabled-sorting text-right"></th>
                                </thead>
                                <tbody>
                                @foreach($data as $element)

                                    <tr>
                                        <th scope="col">{{$element->id}}</th>
                                        <td scope="col">{{$element->title}}</td>
                                        <td scope="col">{{$element->question}}</td>
                                        <td scope="col">{{$element->answer}} </td>
                                        <td scope="col">{{$element->status}} </td>
                                        <td class='text-right'>
                                            <a href='{{route('updateAnswer', $element->id)}}' class='edit a_edit'><i style="color: #b9a206;font-size: 17px;" class='fa fa-edit'></i></a>
                                            <a href='{{route('deleteAnswer', $element->id)}}' class='btn btn-link remove'><i class='fa fa-times iclass'></i></a>
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