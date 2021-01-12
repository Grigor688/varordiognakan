@extends('layouts.app')
@section('content')
    @if(session('success'))
        <div class="alert alert-success sesionDiv">
            {{session('success')}}
        </div>
    @endif
    <form action="{{route('updateCardEditForm', $data->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 formDiv">
                        <div class="form-group">
                            <label for="end_of_term">Ժամկետի ավարտ</label>
                            <input type="date"  name="end_of_term" class="form-control" id="end_of_term" aria-describedby="emailHelp" value="{{$data->end_of_term}}">
                        </div>
                        <button type="submit" name="send" class="btn btn-success">Փոփոխել</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection



