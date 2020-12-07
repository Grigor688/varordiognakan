@extends('layouts.app')
@section('content')
    <div class="form-group">
        @if(session('updated'))
            <div class="alert alert-success sesionDiv">
                {{session('updated')}}
            </div>
        @endif
        <h4 class="formDiv">Նորություններ</h4>
        <div class="container formDiv">
            <div class="row">
                @foreach($data as $news)
                    <div class="col-md-3 divNews">
                            <div class="thumbnail">
                                <div style="width: 249px;height: 205px;">
                                    <img style="width: 100%;height: 100%;border-radius: 12px" src="/uploads/news/{{$news->image}}">
                                </div>

                                <div class="caption">
                                    <div style="font-size: 20px;border: 1px solid powderblue;border-radius: 10px">{{$news->title}}</div>
                                    <br>
                                </div>
                            </div>
                            <a href="{{route('updateNews', $news->id)}}" class="btn astyle">Փոփոխել</a>
                            <a href="{{route('deleteNews', $news->id)}}" class='btn btn-link  remove'><i class='fa fa-times iclass'></i></a>
                    </div>
                    <br>
                @endforeach
            </div>
            <br>
            <a href="{{route('addnews')}}" class="nav-link">
                <button id="send-mail-list" class="form-control btn-primary">Ավելացնել</button>
            </a>
        </div>

    </div>


@endsection
