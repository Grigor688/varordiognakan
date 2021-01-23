@extends('layouts.app')
@section('content')
    <i onclick="goBack()" class="far fa-arrow-alt-circle-left goBack"></i>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bootstrap-table">
                        <div class="card-body table-full-width">
                                    <a href="{{route('card')}}" class="nav-link">
                                        <i class="nav-icon fas fa-book" style="color: cornflowerblue;font-size: 29px;">
                                            <span class="messageCountinto">{{$count}}</span>
                                        </i>
                                        <span style="font-size: 27px;margin-left: 13px;">Քարտային վճարում</span>
                                    </a>
                                    <a href="{{route('idram')}}" class="nav-link">
                                        <i class="nav-icon fas fa-book" style="color: darkorchid;font-size: 29px;">
                                            <span class="messageCountintoIdram">{{$idramcount}}</span>
                                        </i>
                                        <span style="font-size: 27px;margin-left: 13px;color:darkorchid ">Idram</span>
                                    </a>
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