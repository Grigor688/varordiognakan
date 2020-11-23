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
    <form action="{{route('submit')}}" method="post">
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
                            <input type="text" name="activity" class="form-control" id="activity" aria-describedby="emailHelp" placeholder="Գրեք գործունեությունը">
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Հեռախոսահամար</label>
                            <input type="text" name="phone_number" class="form-control" id="phone_number" aria-describedby="emailHelp" placeholder="Գրեք հեռախոսահամարը">
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
                            <input type="text" maxlength="4" name="number_adress" class="form-control" id="number_adress" aria-describedby="emailHelp" placeholder="Գրեք թվային հասցեն">
                        </div>
                        <div class="form-group">
                            <label for="lat">Լատիտուդե</label>
                            <input type="text"  name="lat" class="form-control" id="lat" aria-describedby="emailHelp" placeholder="Գրեք լատիտուդե հասցեն">
                        </div>
                        <div class="form-group">
                            <label for="lng">Լոնգիտուդե</label>
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
                        <button type="submit" name="send" class="btn btn-success">Ավելացնել</button>
                    </div>
                    <div class="col-md-6 formDiv design">
                        <div class="form-group">
                            <label for="work_day_time">Աշխատանքային օրեր/ժամեր</label>
                            <input type="text"  name="work_day_time" class="form-control changeInput" id="work_day_time" aria-describedby="emailHelp" placeholder="Հետևյալ տարբերակով\ Երկ․-Ուրբ․ 9:00-19:00">
                        </div>
                        <div class="form-group">
                            <label for="special_offer">Հատուկ առաջարկ</label>
                            <textarea  name="special_offer" class="form-control changeInput" id="special_offer" aria-describedby="emailHelp" placeholder="Գրեք հատուկ առաջարկը"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="orientation">Ուղղվածություն</label>
                            <textarea  name="orientation" class="form-control changeInput" id="orientation" aria-describedby="emailHelp" placeholder="Գրեք ուղղվածությունը"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


