@extends('layouts.app')
@section('content')
    <i onclick="goBack()" class="far fa-arrow-alt-circle-left goBack"></i>
    @if(session('success'))
        <div class="alert alert-success sesionDiv">
            {{session('success')}}
        </div>
    @endif
    <form action="{{route('submitAdvice')}}" method="post" enctype="multipart/form-data">
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
                            <label for="advice">Տեքստ</label>
                            <input type="text" name="advice" class="form-control" id="advice" aria-describedby="emailHelp" placeholder="Գրեք խորհուրդ">
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
@section('content6')
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection


