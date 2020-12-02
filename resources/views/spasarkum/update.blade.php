@extends('layouts.app')
@section('content')
    <form action="{{route('updateForm',$data->id)}}" method="post" enctype="multipart/form-data">
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
                                <option>Էվակուատոր</option>
                                <option>Շարժական Վուլկանացում</option>
                                <option>Ավտոտեխսպասարկման կետ</option>
                                <option>Վուլկանացում</option>
                                <option>Ավտոլվացում</option>
                                <option>Լվա ինքդ</option>
                                <option>Էլեկտրիկ</option>
                                <option>Մատորիստ</option>
                                <option>Խադավիկ</option>
                                <option>Դզող-փչող</option>
                                <option>Գազավիկ</option>
                                <option>Ապակիների մգեցում</option>
                                <option>Մեքենայի կերամիկապատում/փայլեցում</option>
                                <option>Մեքենաների քանդման կետեր</option>
                                <option>Սրահի վերանորոգում/քիմ մաքրում</option>
                                <option>Մեքենայի պլաստմասե իրերի վերանորգում</option>
                                <option>Ռադիատորի վերանորոգում</option>
                                <option>Կոնդիցիոների լիցքավորում</option>
                                <option>Յուղման կետ</option>
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
                            <label for="work_day_from">Աշխատանքային օրեր սկսած</label>
                            <input type="datetime-local" name="work_day_from" class="form-control" id="work_day_from" aria-describedby="emailHelp" value="{{$data->work_day_from}}">
                        </div>

                        <div class="form-group">
                            <label for="work_day_to">Աշխատանքային օրեր մինչև</label>
                            <input type="datetime-local" name="work_day_to" class="form-control" id="work_day_to" aria-describedby="emailHelp" value="{{$data->work_day_to}}">
                        </div>

                        <div class="form-group">
                            <h5>Հատուկ առաջարկ</h5>
                            <label style="color: antiquewhite">Հատուկ առաջարկի սկիզբ</label>
                            <input type="datetime-local" class="form-control" name="special_offer_time_from" value="{{$data->special_offer_time_from}}">
                            <br>
                            <textarea  name="special_offer" class="form-control changeInput" id="special_offer" aria-describedby="emailHelp" placeholder="Գրեք հատուկ առաջարկը"></textarea>
                            <br>
                            <label style="color: antiquewhite">Հատուկ առաջարկի ավարտ</label>
                            <input type="datetime-local" class="form-control" name="special_offer_time_to" value="{{$data->special_offer_time_to}}">
                        </div>
                        <div class="thumbnail">
                            <label>Ուղղվածություն</label>
                            <div style="width: 249px;height: 205px;">
                                <img style="width: 100%;height: 100%;border-radius: 12px" src="/uploads/news/{{$data->image}}">
                            </div>
                            <div class="caption">
                                <input type="file" name="image" class="form-control">
                                <br>
                                <input type="text" name="title_orientation" class="form-control" value="{{$data->title_orientation}}">
                                <br>
                                <textarea  name="orientation" class="form-control" id="orientation" aria-describedby="emailHelp">{{$data->orientation}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
