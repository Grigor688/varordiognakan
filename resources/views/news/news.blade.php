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
                        <form action="{{route('updateNews',$news->id)}}" method="post">
                            @csrf
                            <div class="thumbnail">
                                <div style="width: 249px;height: 205px;">
                                    <img style="width: 100%;height: 100%;border-radius: 12px" src="/uploads/news/{{$news->image}}">
                                </div>

                                <div class="caption">
                                    <input type="text" name="title" class="form-control" value="{{$news->title}}">
                                    <textarea  name="newses" class="form-control" id="newses" aria-describedby="emailHelp">{{$news->newses}}</textarea>
                                </div>
                            </div>
                            <button type="submit" style="margin-top: 4px" class='btn btn-link btn-warning edit a_edit'>Փոփոխել</button>
                            <a href='{{route('deleteNews', $news->id)}}' class='btn btn-link btn-danger remove'><i class='fa fa-times'></i></a>
                        </form>
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
