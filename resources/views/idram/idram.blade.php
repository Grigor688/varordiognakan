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
                                <th  data-sortable="true">ID</th>
                                <th  data-sortable="true">Վճարային քարտ</th>
                                <th  data-sortable="true">Թվային հասցե</th>
                                <th  data-sortable="true">Գումար</th>
                                <th  data-sortable="true">Ժամկետի ավարտ</th>
                                <th  data-sortable="true">Տարբերակում</th>
                                <th data-sortable="true">Մեկնաբանություն</th>
                                <th data-sortable="true">Վճարումներ</th>
                                <th class="disabled-sorting text-right"></th>
                                </thead>
                                <tbody class="tbody">
                                @foreach($data as $element)
                                    <tr style="background-color: {{$element->getTest()}}">
                                        <td scope="col">{{$element->user_id}}</td>
                                        <td scope="col">{{$element->payment}}</td>
                                        <td scope="col">{{$element->number_adress}}</td>
                                        <td scope="col">{{$element->sum}}</td>
                                        <td scope="col">{{$element->end_of_term}}</td>
                                        @if($element->status == 'active')
                                            <td scope="col">{{$element->status}}</td>
                                        @else
                                            <td style="color: red" scope="col">{{$element->status}}</td>
                                        @endif
                                        <td scope="col">{{$element->comment}}</td>
                                        <td scope="col">{{$element->pay}}</td>
                                        <td class='text-right'>
                                            <a href='{{route('updateIdram', $element->id)}}' class='edit a_edit'><i style="color: inherit;font-size: 17px;" class='fas fa-eye'></i></a>
                                            @if(auth()->user()->is_admin == 1)
                                                <a href='{{route('updateIdramEdit', $element->id)}}' class='edit a_edit'><i style="color: #b9a206;font-size: 17px;" class='fa fa-edit'></i></a>
                                                <a href='{{route('deleteIdram', $element->id)}}' class='btn btn-link remove'><i class='fa fa-times iclass'></i></a>
                                            @endif
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
{{--@section('content6')--}}
    {{--<script>--}}
        {{--@foreach($data as $element)--}}
           {{--var json = @json($element->name);--}}
           {{--var data = JSON.parse(json);--}}
           {{--var date = data['own_phone'];--}}
           {{--console.log(date);--}}
        {{--$(".tbody").append(--}}
            {{--'<tr>\n' +--}}
            {{--'<td scope="col"><b>'+data['EDP_BILL_NO']+'</b></td>\n' +--}}
            {{--'<td scope="col">'+data['payment']+'</td>\n' +--}}
            {{--'<td scope="col">'+data['own_name']+'</td>\n' +--}}
            {{--'<td scope="col">'+data['total']+'</td>\n' +--}}
            {{--'<td scope="col">'+data['own_phone']+'</td>\n' +--}}
            {{--'   @if($element->status == 'active')\n' +--}}
                    {{--'<td scope="col">{{ $element->status}}</td>\n' +--}}
            {{--'   @else\n' +--}}
                    {{--'<td style="color: red" scope="col">{{ $element->status}}</td>\n' +--}}
            {{--'   @endif\n' +--}}
            {{--'<td scope="col">{{ $element->comment}}</td>\n' +--}}
            {{--'<td class="text-right" scope="col">'+--}}
            {{--"   <a href='{{route('updateIdram', $element->id)}}' class='edit a_edit'><i style=\"color: inherit;font-size: 17px;\" class='fas fa-eye'></i></a>\n"+--}}
            {{--'   @if(auth()->user()->is_admin == 1)\n' +--}}
            {{--'    <a href="{{route('updateIdramEdit', $element->id)}}?date='+date+'" class=\'edit a_edit\'><i style="color: #b9a206;font-size: 17px;" class=\'fa fa-edit\'></i></a>\n' +--}}
            {{--'    <a href="{{route('deleteIdram', $element->id)}}" class=\'btn btn-link remove\'><i class=\'fa fa-times iclass\'></i></a>\n' +--}}
            {{--'   @endif'+--}}
            {{--'</td>\n' +--}}

            {{--'</tr>'--}}
        {{--)--}}
        {{--@endforeach--}}

    {{--</script>--}}
{{--@endsection--}}
@section('content6')
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection