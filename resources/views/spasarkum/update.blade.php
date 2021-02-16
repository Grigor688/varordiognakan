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
                                <option value="Ավտոմասերի խանութ" @if($data->name == 'Ավտոմասերի խանութ') selected @endif>Ավտոմասերի խանութ</option>
                                <option value="Էվակուատոր" @if($data->name == 'Էվակուատոր') selected @endif>Էվակուատոր</option>
                                <option value="Շարժական Վուլկանացում" @if($data->name == 'Շարժական Վուլկանացում') selected @endif>Շարժական Վուլկանացում</option>
                                <option value="Ավտոլվացում" @if($data->name == 'Ավտոլվացում') selected @endif>Ավտոլվացում</option>
                                <option value="Վուլկանացում" @if($data->name == 'Վուլկանացում') selected @endif>Վուլկանացում </option>
                                <option value="Լվա ինքդ" @if($data->name == 'Լվա ինքդ') selected @endif>Լվա ինքդ</option>
                                <option value="Յուղման կետ" @if($data->name == 'Յուղման կետ') selected @endif>Յուղման կետ</option>
                                <option value="Ավտոտեխսպասարկում" @if($data->name == 'Ավտոտեխսպասարկում') selected @endif>Ավտոտեխսպասարկում</option>
                                <option value="Էլեկտրիկ" @if($data->name == 'Էլեկտրիկ') selected @endif>Էլեկտրիկ</option>
                                <option value="Շարժիչի մասնագետ(Моторист)" @if($data->name == 'Շարժիչի մասնագետ(Моторист)') selected @endif>Շարժիչի մասնագետ (Моторист)</option>
                                <option value="Ընթացագործ(Ходовик)" @if($data->name == 'Ընթացագործ(Ходовик)') selected @endif>Ընթացագործ (Ходовик)</option>
                                <option value="Թիթեղագործ-ներկարար" @if($data->name == 'Թիթեղագործ-ներկարար') selected @endif>Թիթեղագործ-ներկարար</option>
                                <option value="Գազաբալոնային մասնագետ" @if($data->name == 'Գազաբալոնային մասնագետ') selected @endif>Գազաբալոնային մասնագետ</option>
                                <option value="Մեքենաների քանդման կետեր" @if($data->name == 'Մեքենաների քանդման կետեր') selected @endif>Մեքենաների քանդման կետեր</option>
                                <option value="Ռադիատորի վերանորոգում" @if($data->name == 'Ռադիատորի վերանորոգում') selected @endif>Ռադիատորի վերանորոգում</option>
                                <option value="Անվաբացքի ուղղում(Развал)" @if($data->name == 'Անվաբացքի ուղղում(Развал)') selected @endif>Անվաբացքի ուղղում (Развал)</option>
                                <option value="Մեքենաների կերամիկապատում-փայլեցում" @if($data->name == 'Մեքենաների կերամիկապատում/փայլեցում') selected @endif>Մեքենաների կերամիկապատում-փայլեցում</option>
                                <option value="Ապակիների թաղանթապատում" @if($data->name == 'Ապակիների թաղանթապատում') selected @endif>Ապակիների թաղանթապատում</option>
                                <option value="Սրահի վերանորոգում-քիմ մաքրում" @if($data->name == 'Սրահի վերանորոգում/քիմ մաքրում') selected @endif>Սրահի վերանորոգում-քիմ մաքրում</option>
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
                            <input type="text" minlength="4" maxlength="4" name="number_adress" class="form-control" id="number_adress" aria-describedby="emailHelp" value="{{$data->number_adress}}">
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
                                <option></option>
                                <option value="Երկուշաբթի" @if($data->work_day_from == 'Երկուշաբթի') selected @endif>Երկուշաբթի</option>
                                <option value="Երեքշաբթի" @if($data->work_day_from == 'Երեքշաբթի') selected @endif>Երեքշաբթի</option>
                                <option value="Չորեքշաբթի" @if($data->work_day_from == 'Չորեքշաբթի') selected @endif>Չորեքշաբթի</option>
                                <option value="Հինգշաբթի" @if($data->work_day_from == 'Հինգշաբթի') selected @endif>Հինգշաբթի</option>
                                <option value="Ուրբաթ" @if($data->work_day_from == 'Ուրբաթ') selected @endif>Ուրբաթ</option>
                                <option value="Շաբաթ" @if($data->work_day_from == 'Շաբաթ') selected @endif>Շաբաթ</option>
                                <option value="Կիրակի" @if($data->work_day_from == 'Կիրակի') selected @endif>Կիրակի</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="work_day_to">Աշխատանքային օրեր մինչև</label>
                            <select name="work_day_to" id="work_day_to" class="form-control">
                                <option></option>
                                <option value="Երկուշաբթի" @if($data->work_day_to == 'Երկուշաբթի') selected @endif>Երկուշաբթի</option>
                                <option value="Երեքշաբթի" @if($data->work_day_to == 'Երեքշաբթի') selected @endif>Երեքշաբթի</option>
                                <option value="Չորեքշաբթի" @if($data->work_day_to == 'Չորեքշաբթի') selected @endif>Չորեքշաբթի</option>
                                <option value="Հինգշաբթի" @if($data->work_day_to == 'Հինգշաբթի') selected @endif>Հինգշաբթի</option>
                                <option value="Ուրբաթ" @if($data->work_day_to == 'Ուրբաթ') selected @endif>Ուրբաթ</option>
                                <option value="Շաբաթ" @if($data->work_day_to == 'Շաբաթ') selected @endif>Շաբաթ</option>
                                <option value="Կիրակի" @if($data->work_day_to == 'Կիրակի') selected @endif>Կիրակի</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="work_time_from" style="color: #a2865f">Աշխատանքային ժամեր սկսած</label>
                            <input type="time" name="work_time_from" class="form-control" id="work_time_from" aria-describedby="emailHelp" value="{{$data->work_time_from}}">
                            <label for="work_time_to" style="color: #a2865f">Աշխատանքային ժամեր մինչև</label>
                            <input type="time" name="work_time_to" class="form-control" id="work_time_to" aria-describedby="emailHelp" value="{{$data->work_time_to}}">
                        </div>

                        @if($data->other_day)
                            <label for="other_day">Կարճ օր</label>
                            <select name="other_day" id="other_day" class="form-control">
                                <option value="Երկուշաբթի" @if($data->other_day == 'Երկուշաբթի') selected @endif>Երկուշաբթի</option>
                                <option value="Երեքշաբթի" @if($data->other_day == 'Երեքշաբթի') selected @endif>Երեքշաբթի</option>
                                <option value="Չորեքշաբթի" @if($data->other_day == 'Չորեքշաբթի') selected @endif>Չորեքշաբթի</option>
                                <option value="Հինգշաբթի" @if($data->other_day == 'Հինգշաբթի') selected @endif>Հինգշաբթի</option>
                                <option value="Ուրբաթ" @if($data->other_day == 'Ուրբաթ') selected @endif>Ուրբաթ</option>
                                <option value="Շաբաթ" @if($data->other_day == 'Շաբաթ') selected @endif>Շաբաթ</option>
                                <option value="Կիրակի" @if($data->other_day == 'Կիրակի') selected @endif>Կիրակի</option>
                            </select>
                                <br>
                                <div class="form-group" style="margin-bottom: -3px">
                                    <label for="addDay">Կարճ օրվա աշխատաժամերը</label>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="saturday_work_time_from" style="color: #a2865f">Աշխատանքային ժամեր սկսած</label>
                                    <input type="time" name="saturday_work_time_from" class="form-control" id="saturday_work_time_from" aria-describedby="emailHelp" value="{{$data->saturday_work_time_from}}">
                                    <label for="saturday_work_time_to" style="color: #a2865f">Աշխատանքային ժամեր մինչև</label>
                                    <input type="time" name="saturday_work_time_to" class="form-control" id="saturday_work_time_to" aria-describedby="emailHelp" value="{{$data->saturday_work_time_to}}">
                                </div>
                            @else
                            <div class="form-group">
                                <span id="addDay" class="addDay">+</span>
                            </div>
                            <div id="hiddenSaturdayForm" class="form-group">
                                <label for="other_day" style="color: #a2865f">Կարճ օր</label>
                                <select name="other_day" id="other_day" class="form-control">
                                    <option></option>
                                    <option>Երկուշաբթի</option>
                                    <option>Երեքշաբթի</option>
                                    <option>Չորեքշաբթի</option>
                                    <option>Հինգշաբթի</option>
                                    <option>Ուրբաթ</option>
                                    <option>Շաբաթ</option>
                                    <option>Կիրակի</option>
                                </select>
                                <label for="saturday_work_time_from" style="color: #a2865f">Աշխատանքային ժամեր սկսած</label>
                                <input type="time" name="saturday_work_time_from" class="form-control" id="saturday_work_time_from" aria-describedby="emailHelp">
                                <label for="saturday_work_time_to" style="color: #a2865f">Աշխատանքային ժամեր մինչև</label>
                                <input type="time" name="saturday_work_time_to" class="form-control" id="saturday_work_time_to" aria-describedby="emailHelp">
                            </div>

                        @endif
{{--                        @if($data->partner == 'Այո')--}}
                            <div class="bigdiv">
                                <div class="form-group">
                                    <h5>Հատուկ առաջարկ</h5>
                                    <label style="color: #a2865f">URL հասցե</label>
                                    <div class="caption">
                                        <textarea  name="special_offer_url" class="form-control changeInput2" id="special_offer_url" aria-describedby="emailHelp">{{$data->special_offer_url}}</textarea>
                                    </div>
                                    <br>
                                    <label style="color: #a2865f">Հատուկ առաջարկի վերնագիր</label>
                                    <input type="text" name="special_offer_title" class="form-control changeInput2" value="{{$data->special_offer_title}}">
                                    @if($data->special_offer_image)
                                        <div style="width: 249px;height: 205px;position: relative">
                                            <a href="{{route('deleteImageSpecial', $data->id)}}">
                                                <span class="deleteImage">X</span>
                                            </a>
                                            <img style="width: 100%;height: 100%;border-radius: 12px" src="/uploads/news/{{$data->special_offer_image}}">
                                        </div>
                                    @else

                                    @endif
                                    <input type="file" name="special_offer_image" class="form-control changeInput2">
                                    <br>
                                    <label style="color: #a2865f">Հատուկ առաջարկ</label>
                                    <textarea  name="special_offer" class="form-control changeInput2" id="special_offer" aria-describedby="emailHelp">{{$data->special_offer}}</textarea>
                                    <label for="special_offer_time_from" style="color: #a2865f">Հատուկ առաջարկի սկիզբ</label>
                                    <input type="datetime-local" id="special_offer_time_from" class="form-control changeInput2" name="special_offer_time_from" value="{{$data->special_offer_time_from}}">
                                    <br>
                                    <label for="special_offer_time_to" style="color: #a2865f">Հատուկ առաջարկի ավարտ</label>
                                    <input type="datetime-local" class="form-control changeInput2" name="special_offer_time_to" value="{{$data->special_offer_time_to}}">
                                </div>
                                <div class="thumbnail">
                                    <label>Առավելություն</label>
                                    <br>
                                    <label style="color: #a2865f">URL հասցե</label>
                                    <div class="caption">
                                        <textarea  name="orientation_url" class="form-control changeInput2" id="orientation_url" aria-describedby="emailHelp">{{$data->orientation_url}}</textarea>
                                    </div>
                                    <br>
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
                                        <input type="file" name="image" class="form-control changeInput2">
                                        <br>
                                        <label style="color: #a2865f">Առավելության վերնագիր</label>
                                        <input type="text" name="title_orientation" class="form-control changeInput2" value="{{$data->title_orientation}}">
                                        <br>
                                        <label style="color: #a2865f">Բովանդակություն</label>
                                        <textarea  name="orientation" class="form-control changeInput2" id="orientation" aria-describedby="emailHelp">{{$data->orientation}}</textarea>
                                    </div>
                                </div>
                            </div>
                        {{--@endif--}}
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
