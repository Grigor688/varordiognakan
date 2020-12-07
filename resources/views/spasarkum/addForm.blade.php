@extends('layouts.app')
@section('Validation_errors')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
@section('content')
    @if(session('success'))
        <div class="alert alert-success sesionDiv">
            {{session('success')}}
        </div>
    @endif
    <form action="{{route('submit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 formDiv">
                        <div class="form-group">
                            <label for="name_company">Անվանում</label>
                            <input type="text" name="name_company" class="form-control" id="name_company" aria-describedby="emailHelp" placeholder="Գրեք ընկերության անվանումը">
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
                            <input type="text" name="activity" class="form-control" id="activity" aria-describedby="emailHelp" placeholder="Գրեք գործունեությունը">
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Հեռախոսահամար</label>
                            <input type="text" name="phone_number" class="form-control" id="phone_number" aria-describedby="emailHelp" value="+374">
                        </div>
                        <div class="form-group">
                            <label for="email">Էլ․փոստ</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Գրեք էլ․փոստը">
                        </div>
                        <div class="form-group">
                            <label for="site">Վեբ կայք</label>
                            <input type="text" name="site" class="form-control" id="site" aria-describedby="emailHelp" placeholder="Գրեք վեբ կայքը">
                        </div>
                        <div class="form-group">
                            <label for="adress">Հասցե</label>
                            <input type="text" name="adress" class="form-control" id="adress" aria-describedby="emailHelp" placeholder="Գրեք հասցեն">
                        </div>
                        <div class="form-group">
                            <label for="number_adress">Թվային հասցե</label>
                            <input type="text" minlength="4" maxlength="4" name="number_adress" class="form-control" id="number_adress" aria-describedby="emailHelp" placeholder="Գրեք թվային հասցեն">
                        </div>
                        <div class="form-group">
                            <label for="lat">Լատիտուդ</label>
                            <input type="text"  name="lat" class="form-control" id="lat" aria-describedby="emailHelp" placeholder="Գրեք լատիտուդե հասցեն">
                        </div>
                        <div class="form-group">
                            <label for="lng">Լոնգիտուդ</label>
                            <input type="text" name="lng" class="form-control" id="lng" aria-describedby="emailHelp" placeholder="Գրեք լոնգիտուդե հասցեն">
                        </div>
                        <div class="form-group">
                            <label for="partner">Գործընկեր</label>
                            <select name="partner" id="partner" class="form-control">
                                <option></option>
                                <option value="1">1</option>
                                <option value="0">0</option>
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
                                <option>ՈՒրբաթ</option>
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
                                <option>ՈՒրբաթ</option>
                                <option>Շաբաթ</option>
                                <option>Կիրակի</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="work_time_from" style="color: antiquewhite">Աշխատանքային ժամեր սկսած</label>
                            <input type="time" name="work_time_from" class="form-control" id="work_time_from" aria-describedby="emailHelp">
                            <label for="work_time_to" style="color: antiquewhite">Աշխատանքային ժամեր մինչև</label>
                            <input type="time" name="work_time_to" class="form-control" id="work_time_to" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group" style="margin-bottom: -3px">
                            <label for="addDay">Ավելացնել շաբաթ օրվա աշխատաժամեր</label>
                        </div>
                        <div class="form-group">
                            <span class="addDay">+</span>
                        </div>
                        <div id="hiddenSaturdayForm" class="form-group">
                            <label for="saturday_work_time_from" style="color: antiquewhite">Աշխատանքային ժամեր սկսած</label>
                            <input type="time" name="saturday_work_time_from" class="form-control" id="saturday_work_time_from" aria-describedby="emailHelp">
                            <label for="saturday_work_time_to" style="color: antiquewhite">Աշխատանքային ժամեր մինչև</label>
                            <input type="time" name="saturday_work_time_to" class="form-control" id="saturday_work_time_to" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <h5>Հատուկ առաջարկ</h5>
                            <label style="color: antiquewhite">Հատուկ առաջարկի սկիզբ</label>
                            <input type="datetime-local" class="form-control changeInput" name="special_offer_time_from">
                            <br>
                            <textarea  name="special_offer" class="form-control changeInput" id="special_offer" aria-describedby="emailHelp" placeholder="Գրեք հատուկ առաջարկը"></textarea>
                            <br>
                            <label style="color: antiquewhite">Հատուկ առաջարկի ավարտ</label>
                            <input type="datetime-local" class="form-control changeInput" name="special_offer_time_to">
                        </div>
                        <div class="thumbnail">
                            <label>Ուղղվածություն</label>
                            <div class="caption">
                                <input type="file" name="image" class="form-control changeInput">
                                <br>
                                <input type="text" name="title_orientation" class="form-control changeInput" placeholder="Գրեք ուղղվածության վերնագիրը">
                                <br>
                                <textarea  name="orientation" class="form-control changeInput" id="orientation" aria-describedby="emailHelp" placeholder="Գրեք Ուղղվածությունը"></textarea>
                            </div>
                        </div>
                        <br>
                        <button type="submit" name="send" class="btn btn-success">Ավելացնել</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


