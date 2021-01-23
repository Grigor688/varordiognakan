@extends('layouts.app')
@section('content')
    <i onclick="goBack()" class="far fa-arrow-alt-circle-left goBack"></i>
    @if(session('success'))
        <div class="alert alert-success sesionDiv">
            {{session('success')}}
        </div>
    @endif
    <form action={{route('updateIdramEditForm', $data->id)}} method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 formDiv">
                        <div class="form-group">
                            <label for="end_of_term">Ժամկետի ավարտ</label>
                            <input type="date"  name="end_of_term" class="form-control" id="end_of_term" aria-describedby="emailHelp" value="{{$data->end_of_term}}">
                            <label for="comment">Մեկնաբանություն</label>
                            <textarea  name="comment" class="form-control" id="comment" aria-describedby="emailHelp">{{$data->comment}}</textarea>
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



