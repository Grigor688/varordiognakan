@extends('layouts.app')
@section('content')
    <form action="{{route('updateAppaForm',$data->id)}}" method="post">
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

                        <button type="submit" name="send" class="btn btn-success">Փոփոխել</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
