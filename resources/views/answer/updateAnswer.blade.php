@extends('layouts.app')
@section('content')
    <form action="{{route('updateFormAnswer', $data->id)}}" method="post" enctype="multipart/form-data">
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
                            <label for="question">Հարց</label>
                            <textarea  name="question" class="form-control" id="question" aria-describedby="emailHelp">{{$data->question}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="answer">Պատասխան</label>
                            <textarea  name="answer" class="form-control" id="answer" aria-describedby="emailHelp">{{$data->answer}}</textarea>
                        </div>

                        <button type="submit" name="send" class="btn btn-success">Պատասխանել</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
