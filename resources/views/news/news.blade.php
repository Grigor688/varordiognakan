@extends('layouts.app')
@section('content')
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
        <h4 class="formDiv">Նորություններ</h4>
        <div class="container formDiv">
            <div class="row">
                @foreach($data as $news)
                    <div class="col-md-3 divNews">
                            <div class="thumbnail">
                                <div style="width: 200px;height: 200px;">
                                    <img style="width: 100%;height: 100%;border-radius: 12px" src="/uploads/news/{{$news->image}}">
                                </div>

                                <div class="caption">
                                    <div style="font-size: 18px;border-radius: 10px;width: 200px">{{$news->title}}</div>
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
            <a href="{{route('addnews')}}" class="nav-link" style="padding: 0.5rem 0rem !important;">
                <button style="width: 108px;height: 31px;padding: 3px" id="send-mail-list" class="form-control btn-primary">Ավելացնել</button>
            </a>
        </div>

    </div>


@endsection
