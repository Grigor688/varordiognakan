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
                                <div name="title" class="form-control" id="title" aria-describedby="emailHelp">{{$data->title}}</div>
                            </div>
                            <div class="form-group">
                                <label for="question">Բովանդակություն</label>
                                <div class="form-control" id="question" aria-describedby="emailHelp">{{$data->question}}</div>
                            </div>
                            <div class="form-group">
                                <label for="answer">Պատասխան</label>
                                <textarea  name="answer" class="form-control" id="answer" aria-describedby="emailHelp">{{$data->answer}}</textarea>
                            </div>
                            <button type="submit" name="send" class="btn btn-success">Պահպանել</button>
                            </div>

                        <div class="col-md-6 formDiv">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="comment">Մեկնաբանություն</label>
                                    <input type="text" name="comment" class="form-control" id="comment" aria-describedby="emailHelp" value="{{$data->comment}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </form>
@endsection
