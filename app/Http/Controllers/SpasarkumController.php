<?php

namespace App\Http\Controllers;

use App\Models\Spasarkum;
use Illuminate\Http\Request;

class SpasarkumController extends Controller
{
    public function submit(Request $req){
        $validatedData = $req->validate([
            'number_adress' => 'required|integer|unique:spasarkums',

        ]);

        $spasarkum = new Spasarkum();
        $spasarkum->name_company = $req->input('name_company');
        $spasarkum->name = $req->input('name');
        $spasarkum->activity = $req->input('activity');
        $spasarkum->work_day_time = $req->input('work_day_time');
        $spasarkum->phone_number = $req->input('phone_number');
        $spasarkum->email = $req->input('email');
        $spasarkum->site = $req->input('site');
        $spasarkum->adress = $req->input('adress');
        $spasarkum->number_adress = $req->input('number_adress');
        $spasarkum->partner = $req->input('partner');
        $spasarkum->special_offer = $req->input('special_offer');
        $spasarkum->orientation = $req->input('orientation');
        $spasarkum->lat = $req->input('lat');
        $spasarkum->lng = $req->input('lng');

        $spasarkum->save();
        return redirect()->route('addForm')->with('success','Հաջողությամբ ավելացվել է');
    }

    public function allData(){
        return view('spasarkum.spasarkum',['data'=>Spasarkum::all()]);
    }

    public function serviceMap($id){
        $spasarkum = new Spasarkum();
        return view('spasarkum.gmapsService',['data'=>$spasarkum->find($id)]);
    }

    public function addForm(){
        return view('spasarkum.addForm');
    }


    public function delete($id){
        Spasarkum::find($id)->delete();
        return redirect()->route('spasarkum')->with('deleted','Հաջողությամբ ջնջվել է');
    }

    public function update($id){
        $spasarkum = new Spasarkum();
        return view('spasarkum.update', ['data'=>$spasarkum->find($id)]);
    }

    public function updateForm($id, Request $req){
        $spasarkum = Spasarkum::find($id);
        $spasarkum->name_company = $req->input('name_company');
        $spasarkum->name = $req->input('name');
        $spasarkum->activity = $req->input('activity');
        $spasarkum->work_day_time = $req->input('work_day_time');
        $spasarkum->phone_number = $req->input('phone_number');
        $spasarkum->email = $req->input('email');
        $spasarkum->site = $req->input('site');
        $spasarkum->adress = $req->input('adress');
        $spasarkum->number_adress = $req->input('number_adress');
        $spasarkum->partner = $req->input('partner');
        $spasarkum->special_offer = $req->input('special_offer');
        $spasarkum->orientation = $req->input('orientation');
        $spasarkum->lat = $req->input('lat');
        $spasarkum->lng = $req->input('lng');

        $spasarkum->save();
        return redirect()->route('spasarkum',$id)->with('updated','Հաջողությամբ փոփոխվել է');
    }
}
