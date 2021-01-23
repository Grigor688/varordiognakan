@extends('layouts.app')
@section('content')
    <i onclick="goBack()" class="far fa-arrow-alt-circle-left goBack"></i>
    <form action="{{route('updateAppaForm',$data->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 formDiv">
                        <div class="form-group">
                            <label for="name">Անվանում</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" value="{{$data->name}}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Հեռախոսահամար</label>
                            <input type="text" name="phone" class="form-control" id="phone" aria-describedby="emailHelp" value="{{$data->phone}}">
                        </div>
                        <div style="width: 249px;height: 205px;">
                            <img style="width: 100%;height: 100%;border-radius: 12px" src="/uploads/news/{{$data->image}}">
                        </div>
                        <br>
                        <div class="caption">
                            <input type="file" name="image" class="form-control">
                            <br>
                        </div>

                        <button type="submit" name="send" class="btn btn-success">Փոփոխել</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('content6')
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection
