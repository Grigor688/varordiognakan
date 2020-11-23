@extends('layouts.app')
@section('content')
    @if(session('success'))
        <div class="alert alert-success sesionDiv">
            {{session('success')}}
        </div>
    @endif
    <form action="{{route('updateEvakuatorForm',$data->id)}}" method="post">
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
                        <div class="form-group">
                            <label for="adress">Հասցե</label>
                            <input type="text" name="adress" class="form-control" id="adress" aria-describedby="emailHelp" value="{{$data->adress}}">
                        </div>
                        <div class="form-group">
                            <label for="lat">Լատիտուդե</label>
                            <input type="text"  name="lat" class="form-control" id="lat" aria-describedby="emailHelp" value="{{$data->lat}}">
                        </div>
                        <div class="form-group">
                            <label for="lng">Լոնգիտուդե</label>
                            <input type="text" name="lng" class="form-control" id="lng" aria-describedby="emailHelp" value="{{$data->lng}}">
                        </div>
                        <button type="submit" name="send" class="btn btn-success">Փոփոխել</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection