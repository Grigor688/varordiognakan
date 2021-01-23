@extends('layouts.app')
@section('content')
    <i onclick="goBack()" class="far fa-arrow-alt-circle-left goBack"></i>
    <div class="form-group">
        <div class="form-group">
            @if(session('deleted'))
                <div class="alert sesionDivdel">
                    {{session('deleted')}}
                </div>
            @elseif(session('updated'))
                <div class="alert sesionDiv">
                    {{session('updated')}}
                </div>
            @endif
        <h4 class="formDiv">Կանոններ</h4>
        <div class="container formDiv">
            <div class="row">
                @foreach($data as $rules)
                    @if($rules->image)
                        <div class="col-md-2 divNews">
                            <div class="thumbnail">
                                <div style="width: 150px;height: 150px;">
                                    <img style="width: 100%;height: 100%;border-radius: 12px" src="/uploads/news/{{$rules->image}}">
                                </div>
                            </div>
                        </div>
                    @else

                    @endif

                    <div class="col-md-9">
                        <p>{{$rules->rule}}</p>
                    </div>
                    <div class="col-md-1">
                        <a href='{{route('updateRule', $rules->id)}}' class='edit a_edit'><i style="color: #b9a206;font-size: 17px;" class='fa fa-edit'></i></a>
                        <a href='{{route('deleteRule', $rules->id)}}' class='btn btn-link remove'><i class='fa fa-times iclass'></i></a>
                    </div>
                    <br>
                @endforeach
            </div>
            <br>
            <a href="{{route('addRule')}}" class="nav-link" style="padding: 0.5rem 0rem !important;">
                <button style="width: 108px;height: 31px;padding: 3px" id="send-mail-list" class="form-control btn-primary">Ավելացնել</button>
            </a>
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
