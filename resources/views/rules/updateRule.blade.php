@extends('layouts.app')
@section('content')
    @if(session('success'))
        <div class="alert alert-success sesionDiv">
            {{session('success')}}
        </div>
    @endif
    <form action="{{route('updateRuleForm', $data->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 formDiv">
                        <div class="form-group">
                            <label for="rule">Կանոն</label>
                            <textarea  name="rule" class="form-control" id="rule" aria-describedby="emailHelp">{{$data->rule}}</textarea>
                        </div>
                        <div style="width: 249px;height: 205px;">
                            <img style="width: 100%;height: 100%;border-radius: 12px" src="/uploads/news/{{$data->image}}">
                        </div>
                        <br>
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


