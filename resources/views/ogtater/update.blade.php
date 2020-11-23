@extends('layouts.app')
@section('content')
    <form action="{{route('updateOgtaterForm',$data->id)}}" method="post">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 formDiv">
                        <div class="form-group">
                            <label for="firstname">Անուն</label>
                            <input type="text" name="firstname" class="form-control" id="firstname" aria-describedby="emailHelp" value="{{$data->firstname}}">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Ազգանուն</label>
                            <input type="text" name="lastname" class="form-control" id="lastname" aria-describedby="emailHelp" value="{{$data->lastname}}">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Հեռախոսահամար</label>
                            <input type="text" name="phone_number" class="form-control" id="phone_number" aria-describedby="emailHelp" value="{{$data->phone_number}}">
                        </div>
                        <div class="form-group">
                            <label for="car_number">Ավտոմեքենայի համար</label>
                            <input type="text" name="car_number" class="form-control" id="car_number" aria-describedby="emailHelp" value="{{$data->car_number}}">
                        </div>
                        <div class="form-group">
                            <label for="appa">ԱՊՊԱ</label>
                            <input type="text" name="appa" class="form-control" id="appa" aria-describedby="emailHelp" value="{{$data->appa}}">
                        </div>
                        <div class="form-group">
                            <label for="car_company">Մեքենայի արտադրություն</label>
                            <input type="text" name="car_company" class="form-control" id="car_company" aria-describedby="emailHelp" value="{{$data->car_company}}">
                        </div>
                        <div class="form-group">
                            <label for="car_year">Տարեթիվ</label>
                            <input type="text" maxlength="4" name="car_year" class="form-control" id="car_year" aria-describedby="emailHelp" value="{{$data->car_year}}">
                        </div>
                        <div class="form-group">
                            <label for="car_model">Մոդել</label>
                            <input type="text" maxlength="4" name="car_model" class="form-control" id="car_model" aria-describedby="emailHelp" value="{{$data->car_model}}">
                        </div>
                        <div class="form-group">
                            <label for="car_engine">Շարժիչ</label>
                            <input type="text" maxlength="4" name="car_engine" class="form-control" id="car_engine" aria-describedby="emailHelp" value="{{$data->car_engine}}">
                        </div>
                        <div class="form-group">
                            <label for="vin_code">Վին կոդ</label>
                            <input type="text" maxlength="4" name="vin_code" class="form-control" id="vin_code" aria-describedby="emailHelp" value="{{$data->vin_code}}">
                        </div>

                        <button type="submit" name="send" class="btn btn-success">Փոփոխել</button>
                    </div>
                    <div class="col-md-6 formDiv design">
                        <div class="form-group">
                            <label for="point">Կցել սպասարկման կետ</label>
                            <select name="point" id="point" class="form-control">
                                @foreach($data2 as $res)
                                    <option value={{$res->service_point}}>{{$res->service_point}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
