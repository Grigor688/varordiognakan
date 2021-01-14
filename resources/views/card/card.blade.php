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
                                <th  data-sortable="true">Վճարային քարտ</th>
                                <th  data-sortable="true">Idram</th>
                                <th  data-sortable="true">Թվային հասցե</th>
                                <th  data-sortable="true">Գումար</th>
                                <th  data-sortable="true">Ժամկետի ավարտ</th>
                                <th  data-sortable="true">Տարբերակում</th>
                                <th class="disabled-sorting text-right"></th>
                                </thead>
                                <tbody>
                                @foreach($data as $element)
                                    <tr style="background-color: {{$element->getTest()}}">
                                        <th scope="col">{{$element->id}}</th>
                                        <td scope="col">{{$element->payment_card}}</td>
                                        <td scope="col">{{$element->payment_idram}}</td>
                                        <td scope="col">{{$element->number_adress}}</td>
                                        <td scope="col">{{$element->sum}}</td>
                                        <td scope="col">{{$element->end_of_term}}</td>
                                        @if($element->status == 'active')
                                            <td scope="col">{{$element->status}}</td>
                                        @else
                                            <td style="color: red" scope="col">{{$element->status}}</td>
                                        @endif
                                        <td class='text-right'>
                                            <a href='{{route('updateCard', $element->id)}}' class='edit a_edit'><i style="color: inherit;font-size: 17px;" class='fas fa-eye'></i></a>
                                            <a href='{{route('updateCardEdit', $element->id)}}' class='edit a_edit'><i style="color: #b9a206;font-size: 17px;" class='fa fa-edit'></i></a>
                                            <a href='{{route('deleteCard', $element->id)}}' class='btn btn-link remove'><i class='fa fa-times iclass'></i></a>
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