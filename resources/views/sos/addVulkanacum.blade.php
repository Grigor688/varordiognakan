@extends('layouts.app')
@section('content')
    @if(session('success'))
        <div class="alert alert-success sesionDiv">
            {{session('success')}}
        </div>
    @endif
    <form action="{{route('submitVulkanacum')}}" method="post">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 formDiv">
                        <div class="form-group">
                            <label for="name">Անվանում</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Գրեք անվանումը">
                        </div>
                        <div class="form-group">
                            <label for="phone">Հեռախոսահամար</label>
                            <input type="text" name="phone" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Գրեք հեռախոսահամարը">
                        </div>
                        <div class="form-group">
                            <label for="adress">Հասցե</label>
                            <input type="text" name="adress" class="form-control" id="adress" aria-describedby="emailHelp" placeholder="Գրեք հասցեն">
                        </div>
                        <div class="form-group">
                            <label for="lat">Լատիտուդ</label>
                            <input type="text"  name="lat" class="form-control" id="lat" aria-describedby="emailHelp" placeholder="Գրեք լատիտուդե հասցեն">
                        </div>
                        <div class="form-group">
                            <label for="lng">Լոնգիտուդ</label>
                            <input type="text" name="lng" class="form-control" id="lng" aria-describedby="emailHelp" placeholder="Գրեք լոնգիտուդե հասցեն">
                        </div>
                        <button type="submit" name="send" class="btn btn-success">Ավելացնել</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection



