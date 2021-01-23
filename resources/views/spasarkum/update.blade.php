@extends('layouts.app')
@section('content')
    <i onclick="goBack()" class="far fa-arrow-alt-circle-left goBack"></i>
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
                                <option>Ավտոլվացում</option>
                                <option>Վուլկանացում </option>
                                <option>Լվա ինքդ</option>
                                <option>Յուղման կետ</option>
                                <option>Ավտոտեխսպասարկման կետ</option>
                                <option>Էլեկտրիկ</option>
                                <option>Մատորիստ</option>
                                <option>Խադավիկ</option>
                                <option>Դզող-փչող</option>
                                <option>Գազավիկ</option>
                                <option>Պլաստմասե իրերի վերանորգում</option>
                                <option>Մեքենաների քանդման կետեր</option>
                                <option>Ռադիատորի վերանորոգում</option>
                                <option>Կոնդիցիոների լիցքավորում</option>
                                <option>Մեքենայի կերամիկապատում/փայլեցում</option>
                                <option>Ապակիների թաղանթապատում</option>
                                <option>Սրահի վերանորոգում/քիմ մաքրում</option>
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
                            <label for="lat">Լատիտուդ</label>
                            <input type="text"  name="lat" class="form-control" id="lat" aria-describedby="emailHelp" value="{{$data->lat}}">
                        </div>
                        <div class="form-group">
                            <label for="lng">Լոնգիտուդ</label>
                            <input type="text" name="lng" class="form-control" id="lng" aria-describedby="emailHelp" value="{{$data->lng}}">
                        </div>
                        <div class="form-group">
                            <label for="partner">Գործընկեր</label>
                            <select name="partner" id="partner" class="form-control">
                                <option></option>
                                <option value="Այո" @if($data->partner == 'Այո') selected @endif>Այո</option>
                                <option value="Ոչ" @if($data->partner == 'Ոչ') selected @endif>Ոչ</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 formDiv design">
                        <div class="form-group">
                            <label for="work_day_from">Աշխատանքային օրեր սկսած</label>
                            <select name="work_day_from" id="work_day_from" class="form-control">
                                <option>Երկուշաբթի</option>
                                <option>Երեքշաբթի</option>
                                <option>Չորեքշաբթի</option>
                                <option>Հինգշաբթի</option>
                                <option>Ուրբաթ</option>
                                <option>Շաբաթ</option>
                                <option>Կիրակի</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="work_day_to">Աշխատանքային օրեր մինչև</label>
                            <select name="work_day_to" id="work_day_to" class="form-control">
                                <option>Երկուշաբթի</option>
                                <option>Երեքշաբթի</option>
                                <option>Չորեքշաբթի</option>
                                <option>Հինգշաբթի</option>
                                <option>Ուրբաթ</option>
                                <option>Շաբաթ</option>
                                <option>Կիրակի</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="work_time_from" style="color: #a2865f">Աշխատանքային ժամեր սկսած</label>
                            <input type="time" name="work_time_from" class="form-control" id="work_time_from" aria-describedby="emailHelp" value="{{$data->work_time_from}}">
                            <label for="work_time_to" style="color: #a2865f">Աշխատանքային ժամեր մինչև</label>
                            <input type="time" name="work_time_to" class="form-control" id="work_time_to" aria-describedby="emailHelp" value="{{$data->work_time_to}}">
                        </div>

                        @if($data->saturday_work_time_from)
                                <div class="form-group" style="margin-bottom: -3px">
                                    <label for="addDay">Շաբաթ օրվա աշխատաժամերը</label>
                                </div>
                                <div class="form-group">
                                    <label for="saturday_work_time_from" style="color: #a2865f">Աշխատանքային ժամեր սկսած</label>
                                    <input type="time" name="saturday_work_time_from" class="form-control" id="saturday_work_time_from" aria-describedby="emailHelp" value="{{$data->saturday_work_time_from}}">
                                    <label for="saturday_work_time_to" style="color: #a2865f">Աշխատանքային ժամեր մինչև</label>
                                    <input type="time" name="saturday_work_time_to" class="form-control" id="saturday_work_time_to" aria-describedby="emailHelp" value="{{$data->saturday_work_time_to}}">
                                </div>

                        @endif
                        @if($data->partner == 'Այո')
                        <div class="form-group">
                            <h5>Հատուկ առաջարկ</h5>
                            <label style="color: #a2865f">Հատուկ առաջարկի վերնագիր</label>
                            <input type="text" name="special_offer_title" class="form-control" value="{{$data->special_offer_title}}">
                            @if($data->special_offer_image)
                                <div style="width: 249px;height: 205px;position: relative">
                                    <a href="{{route('deleteImageSpecial', $data->id)}}">
                                        <span class="deleteImage">X</span>
                                    </a>
                                    <img style="width: 100%;height: 100%;border-radius: 12px" src="/uploads/news/{{$data->special_offer_image}}">
                                </div>
                            @else

                            @endif
                            <input type="file" name="special_offer_image" class="form-control">
                            <br>
                            <label style="color: #a2865f">Հատուկ առաջարկ</label>
                            <textarea  name="special_offer" class="form-control changeInput" id="special_offer" aria-describedby="emailHelp">{{$data->special_offer}}</textarea>
                            <label for="special_offer_time_from" style="color: #a2865f">Հատուկ առաջարկի սկիզբ</label>
                            <input type="datetime-local" id="special_offer_time_from" class="form-control" name="special_offer_time_from" value="{{$data->special_offer_time_from}}">
                            <br>
                            <label  style="color: #a2865f">Հատուկ առաջարկի ավարտ</label>
                            <input type="datetime-local" class="form-control" name="special_offer_time_to" value="{{$data->special_offer_time_to}}">
                        </div>
                        <div class="thumbnail">
                            <label>Ուղղվածություն</label>
                            @if($data->image)
                                <div style="width: 249px;height: 205px;position: relative">
                                    <a href="{{route('deleteImage', $data->id)}}">
                                        <span class="deleteImage">X</span>
                                    </a>
                                    <img style="width: 100%;height: 100%;border-radius: 12px" src="/uploads/news/{{$data->image}}">
                                </div>
                            @else

                            @endif

                            <div class="caption">
                                <input type="file" name="image" class="form-control">
                                <br>
                                <label style="color: #a2865f">Ուղղվածության վերնագիր</label>
                                <input type="text" name="title_orientation" class="form-control" value="{{$data->title_orientation}}">
                                <br>
                                <label style="color: #a2865f">Բովանդակություն</label>
                                <textarea  name="orientation" class="form-control" id="orientation" aria-describedby="emailHelp">{{$data->orientation}}</textarea>
                            </div>
                        </div>
                        @endif

                        <br>
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
