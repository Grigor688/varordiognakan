@extends('layouts.app')
@section('content')
    @if(session('success'))
        <div class="alert alert-success sesionDiv">
            {{session('success')}}
        </div>
    @endif
    <form action="{{route('submitNews')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 formDiv">
                        <div class="form-group">
                            <label for="title">Վերնագիր</label>
                            <br>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Գրեք վերնագիր">
                            <br>
                            <label for="news">Տեքստ</label>
                            <textarea name="newses" class="form-control" id="news" aria-describedby="emailHelp" placeholder="Գրեք Նորություն"></textarea>
                            <input type="hidden" name="spasarkum_id"  value="{{ $spasarkum_id }}">
                        </div>
                        <div class="form-group">
                            <label for="file">Նկար</label>
                            <input type="file" name="image" class="form-control" id="file" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" name="send" class="btn btn-success">Ավելացնել</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


