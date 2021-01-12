@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bootstrap-table">
                        <div class="card-body table-full-width">
                            <span>
                                <i class="fas fa-search"></i>
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder=" Փնտրել ID" title="Type in a name">
                            </span>
                            <table id="myTable" class="table">
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
                                    <tr>
                                        <th  data-sortable="true">ID</th>
                                        <th  data-sortable="true">Վերնագիր</th>
                                        <th  data-sortable="true">Հարց</th>
                                        <th data-sortable="true" class="text-center">Պատասխան</th>
                                        <th data-sortable="true" class="text-center">Տարբերակում</th>
                                        <th data-sortable="true" class="text-center">Մեկնաբանություն</th>
                                        <th class="disabled-sorting text-right"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $element)

                                    <tr>
                                        <td scope="col">{{$element->user_id}}</td>
                                        <td scope="col">{{$element->title}}</td>
                                        <td scope="col">{{$element->question}}</td>
                                        <td scope="col">{{$element->answer}} </td>
                                        @if($element->status == 'active')
                                            <td scope="col">{{$element->status}}</td>
                                        @else
                                            <td style="color: red" scope="col">{{$element->status}}</td>
                                        @endif
                                        <td scope="col"><b>{{$element->comment}}</b> </td>
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
@section('content6')
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection