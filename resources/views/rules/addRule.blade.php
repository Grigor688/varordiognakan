@extends('layouts.app')
@section('content')
    @if(session('success'))
        <div class="alert alert-success sesionDiv">
            {{session('success')}}
        </div>
    @endif
    <form action="{{route('submitRule')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 formDiv">
                        <div class="form-group">
                            <label for="rule">Կանոն</label>
                            <textarea name="rule" class="form-control" id="rule" aria-describedby="emailHelp" placeholder="Գրեք կանոն"></textarea>
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


