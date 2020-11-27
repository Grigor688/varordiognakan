@extends('layouts.app')
@section('content')
    <form action="{{route('updateForm',$data->id)}}" method="post">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 formDiv">
                        <div class="form-group">
                            <label for="name_company">Անվանում</label>
                            <input type="text" name="name_company" class="form-control" id="name_company" aria-describedby="emailHelp" value="{{$data->name_company}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Մասնագիտացում</label>
                            <select name="name" id="name" class="form-control">
                                <option>Ավտոտեխսպասարկման կետ</option>
                                <option>Էլեկտրիկ/դիագնոստիկա</option>
                                <option>Մատորիստ</option>
                                <option>Վուլկանացում</option>
                                <option>Ընթացագործ</option>
                                <option>Գազավիկներ</option>
                                <option>Թիթեղագործ/ներկարար</option>
                                <option>(Լվա ինքդ)/ լվացման կետ</option>
                                <option>Մեքենաների քանդման կետեր</option>
                                <option>Մեքենայի փայլեցում/ապակիների մգեցում</option>
                                <option>Սրահի վերանորոգում/քիմ մաքրում</option>
                                <option>Մեքենայի պլաստմասե իրերի վերանորգում</option>
                                <option>Ռադիատորի վերանորոգում</option>
                                <option>Յուղման կետ/կոնդիցիոների լիցքավորում</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="activity">Գործունեություն</label>
                            <input type="text" name="activity" class="form-control" id="activity" aria-describedby="emailHelp" value="{{$data->activity}}">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Հեռախոսահամար</label>
                            <input type="text" name="phone_number" class="form-control" id="phone_number" aria-describedby="emailHelp" value="{{$data->phone_number}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Էլ․փոստ</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{$data->email}}">
                        </div>
                        <div class="form-group">
                            <label for="site">Վեբ կայք</label>
                            <input type="text" name="site" class="form-control" id="site" aria-describedby="emailHelp" value="{{$data->site}}">
                        </div>
                        <div class="form-group">
                            <label for="adress">Հասցե</label>
                            <input type="text" name="adress" class="form-control" id="adress" aria-describedby="emailHelp" value="{{$data->adress}}">
                        </div>
                        <div class="form-group">
                            <label for="number_adress">Թվային հասցե</label>
                            <input type="text" maxlength="4" name="number_adress" class="form-control" id="number_adress" aria-describedby="emailHelp" value="{{$data->number_adress}}">
                        </div>
                        <div class="form-group">
                            <label for="lat">Լատիտուդե</label>
                            <input type="text"  name="lat" class="form-control" id="lat" aria-describedby="emailHelp" value="{{$data->lat}}">
                        </div>
                        <div class="form-group">
                            <label for="lng">Լոնգիտուդե</label>
                            <input type="text" name="lng" class="form-control" id="lng" aria-describedby="emailHelp" value="{{$data->lng}}">
                        </div>
                        <div class="form-group">
                            <label for="partner">Գործընկեր</label>
                            <select name="partner" id="partner" class="form-control">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </div>
                        <button type="submit" name="send" class="btn btn-success">Փոփոխել</button>
                    </div>
                    <div class="col-md-6 formDiv design">
                        <div class="form-group">
                            <label for="work_day_time">Աշխատանքային օրեր/ժամեր</label>
                            <input type="text" name="work_day_time" class="form-control" id="work_day_time" aria-describedby="emailHelp" value="{{$data->work_day_time}}">
                        </div>
                        <div class="form-group">
                            <label for="special_offer">Հատուկ առաջարկ</label>
                            <textarea  name="special_offer" class="form-control" id="special_offer" aria-describedby="emailHelp">{{$data->special_offer}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="orientation">Ուղղվածություն</label>
                            <textarea  name="orientation" class="form-control" id="orientation" aria-describedby="emailHelp">{{$data->orientation}}</textarea>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

            <div class="form-group">
                    <h4 class="formDiv">Նորություններ</h4>
                <div class="container formDiv">
                    <div class="row">
                        @foreach($data->newses as $news)
                            <div class="col-md-4 divNews">
                                <form action="{{route('updateNews',$news->id)}}" method="post">
                                    @csrf
                                        <div class="thumbnail">
                                            <div style="width: 336px;height: 205px;">
                                                <img style="width: 100%;height: 100%" src="/uploads/news/{{$news->image}}">
                                            </div>

                                            <div class="caption">
                                                <input type="text" name="title" class="form-control" value="{{$news->title}}">
                                                <textarea name="newses" class="form-control" id="newses" aria-describedby="emailHelp">{{$news->newses}}</textarea>
                                            </div>
                                        </div>
                                <button type="submit" style="margin-top: 4px" class='btn btn-link btn-warning edit a_edit'>Փոփոխել</button>
                                <a href='{{route('deleteNews', $news->id)}}' class='btn btn-link btn-danger remove'><i class='fa fa-times'></i></a>
                                </form>
                            </div>
                            <br>
                        @endforeach
                    </div>
                    <br>
                    <a href="{{route('addnews',$data->id)}}" class="nav-link">
                        <button id="send-mail-list" class="form-control btn-primary">Ավելացնել</button>
                    </a>
                </div>

            </div>

    <div class="form-group">
        <h4 class="formDiv">Խորհուրդներ</h4>
        <div class="container formDiv">
            <div class="row">
                @foreach($data->advices as $advice)
                        <div class="col-md-4 divNews">
                            <form action="{{route('updateAdvice',$advice->id)}}" method="post">
                                @csrf
                            <div class="thumbnail">
                                <div style="width: 336px;height: 205px;">
                                    <img style="width: 100%;height: 100%" src="/uploads/advice/{{$advice->image}}">
                                </div>
                                <div class="caption">
                                    <input type="text" name="title" class="form-control" value="{{$advice->title}}">
                                    <textarea name="advice" class="form-control" id="advice" aria-describedby="emailHelp">{{$advice->advice}}</textarea>
                                </div>
                            </div>
                            <button type="submit" style="margin-top: 4px" class='btn btn-link btn-warning edit a_edit'>Փոփոխել</button>
                            <a href='{{route('deleteAdvice',$advice->id )}}' class='btn btn-link btn-danger remove'><i class='fa fa-times'></i></a>
                            </form>
                        </div>
                @endforeach
            </div>
            <br>
            <a href="{{route('addAdvice',$data->id)}}" class="nav-link">
                <button id="send-mail-list" class="form-control btn-primary">Ավելացնել</button>
            </a>
        </div>

    </div>


@endsection
