@extends('layouts.app')
@section('content')
    <form action="{{route('updateFormNews', $data->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 formDiv">
                        <div class="form-group">
                            <label for="title">Վերնագիր</label>
                            <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp" value="{{$data->title}}">
                        </div>
                        <div class="form-group">
                            <label for="newses">Նորություն</label>
                            <textarea  name="newses" class="form-control" id="newses" aria-describedby="emailHelp">{{$data->newses}}</textarea>
                        </div>
                        <div style="width: 249px;height: 205px;">
                            <img style="width: 100%;height: 100%;border-radius: 12px" src="/uploads/news/{{$data->image}}">
                        </div>
                        <div class="form-group">
                            <input type="file"  name="image" class="form-control"  aria-describedby="emailHelp">
                        </div>
                        <button type="submit" name="send" class="btn btn-success">Փոփոխել</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
