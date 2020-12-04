@extends('layouts.app')
@section('content')

    <div class="form-group">
        <h4 class="formDiv">Խորհուրդներ</h4>
        <div class="container formDiv">
            <div class="row">
                @foreach($data as $advice)
                    <div class="col-md-3 divNews">
                            <div class="thumbnail">
                                <div style="width: 249px;height: 205px;">
                                    <img style="width: 100%;height: 100%;border-radius: 12px" src="/uploads/advice/{{$advice->image}}">
                                </div>
                                <div class="caption">
                                    <div style="font-size: 20px;border: 1px solid powderblue;border-radius: 10px">{{$advice->title}}</div>
                                    <br>
                                    <div style="border: 1px solid powderblue;border-radius: 10px;word-break: break-all">{{$advice->advice}}</div>
                                </div>
                            </div>
                            <br>
                            <a href="{{route('updateAdvice', $advice->id)}}" class="btn astyle">Փոփոխել</a>
                            <a href='{{route('deleteAdvice',$advice->id )}}' class='btn btn-link  remove'><i class='fa fa-times iclass'></i></a>
                    </div>
                @endforeach
            </div>
            <br>
            <a href="{{route('addAdvice')}}" class="nav-link">
                <button id="send-mail-list" class="form-control btn-primary">Ավելացնել</button>
            </a>
        </div>

    </div>


@endsection
