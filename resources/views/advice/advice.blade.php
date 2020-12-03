@extends('layouts.app')
@section('content')

    <div class="form-group">
        <h4 class="formDiv">Խորհուրդներ</h4>
        <div class="container formDiv">
            <div class="row">
                @foreach($data as $advice)
                    <div class="col-md-3 divNews">
                        <form action="{{route('updateAdvice',$advice->id)}}" method="post">
                            @csrf
                            <div class="thumbnail">
                                <div style="width: 249px;height: 205px;">
                                    <img style="width: 100%;height: 100%;border-radius: 12px" src="/uploads/advice/{{$advice->image}}">
                                </div>
                                <div class="caption">
                                    <input type="text" name="title" class="form-control" value="{{$advice->title}}">
                                    <textarea name="advice" class="form-control" id="advice" aria-describedby="emailHelp">{{$advice->advice}}</textarea>
                                </div>
                            </div>
                            <button type="submit" style="margin-top: 4px;color: white" class='btn btn-link btn-primary edit a_edit'>Փոփոխել</button>
                            <a href='{{route('deleteAdvice',$advice->id )}}' class='btn btn-link btn-danger remove'><i class='fa fa-times'></i></a>
                        </form>
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
