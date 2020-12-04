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
        $spasarkum->work_day_from = $req->input('work_day_from');
        $spasarkum->work_day_to = $req->input('work_day_to');
        $spasarkum->phone_number = $req->input('phone_number');
        $spasarkum->email = $req->input('email');
        $spasarkum->site = $req->input('site');
        $spasarkum->adress = $req->input('adress');
        $spasarkum->number_adress = $req->input('number_adress');
        $spasarkum->partner = $req->input('partner');
        $spasarkum->special_offer = $req->input('special_offer');
        $spasarkum->special_offer_time_from = $req->input('special_offer_time_from');
        $spasarkum->special_offer_time_to = $req->input('special_offer_time_to');
        $spasarkum->orientation = $req->input('orientation');
        $spasarkum->title_orientation = $req->input('title_orientation');
        $spasarkum->lat = $req->input('lat');
        $spasarkum->lng = $req->input('lng');

        if ($req->hasfile('image')){
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('uploads/news/', $filename);
            $spasarkum->image = $filename;
        }else{
            $spasarkum = new Spasarkum();
            $spasarkum->name_company = $req->input('name_company');
            $spasarkum->name = $req->input('name');
            $spasarkum->activity = $req->input('activity');
            $spasarkum->work_day_from = $req->input('work_day_from');
            $spasarkum->work_day_to = $req->input('work_day_to');
            $spasarkum->phone_number = $req->input('phone_number');
            $spasarkum->email = $req->input('email');
            $spasarkum->site = $req->input('site');
            $spasarkum->adress = $req->input('adress');
            $spasarkum->number_adress = $req->input('number_adress');
            $spasarkum->partner = $req->input('partner');
            $spasarkum->special_offer = $req->input('special_offer');
            $spasarkum->special_offer_time_from = $req->input('special_offer_time_from');
            $spasarkum->special_offer_time_to = $req->input('special_offer_time_to');
            $spasarkum->orientation = $req->input('orientation');
            $spasarkum->title_orientation = $req->input('title_orientation');
            $spasarkum->lat = $req->input('lat');
            $spasarkum->lng = $req->input('lng');
        }

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

//        $data = Spasarkum::with(['advices', 'newses'])->where(['id' => $id])->first();
        $data = Spasarkum::find($id);
        $data->work_day_from = date('Y-m-d\TH:i:s', strtotime($data->work_day_from));
        $data->work_day_to = date('Y-m-d\TH:i:s', strtotime($data->work_day_to));
        $data->special_offer_time_from = date('Y-m-d\TH:i:s', strtotime($data->special_offer_time_from));
        $data->special_offer_time_to = date('Y-m-d\TH:i:s', strtotime($data->special_offer_time_to));
        return view('spasarkum.update', ['data' => $data]);
    }


    public function updateForm($id, Request $req){
        $spasarkum = Spasarkum::find($id);
        $spasarkum->name_company = $req->input('name_company');
        $spasarkum->name = $req->input('name');
        $spasarkum->activity = $req->input('activity');
        $spasarkum->work_day_from = $req->input('work_day_from');
        $spasarkum->work_day_to = $req->input('work_day_to');
        $spasarkum->phone_number = $req->input('phone_number');
        $spasarkum->email = $req->input('email');
        $spasarkum->site = $req->input('site');
        $spasarkum->adress = $req->input('adress');
        $spasarkum->number_adress = $req->input('number_adress');
        $spasarkum->partner = $req->input('partner');
        $spasarkum->special_offer = $req->input('special_offer');
        $spasarkum->special_offer_time_from = $req->input('special_offer_time_from');
        $spasarkum->special_offer_time_to = $req->input('special_offer_time_to');
        $spasarkum->orientation = $req->input('orientation');
        $spasarkum->title_orientation = $req->input('title_orientation');
        $spasarkum->lat = $req->input('lat');
        $spasarkum->lng = $req->input('lng');

        if ($req->hasfile('image')){
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('uploads/news/', $filename);
            $spasarkum->image = $filename;
        }else{
//            return $req;
//            $spasarkum->image = "";
            $spasarkum = Spasarkum::find($id);
            $spasarkum->name_company = $req->input('name_company');
            $spasarkum->name = $req->input('name');
            $spasarkum->activity = $req->input('activity');
            $spasarkum->work_day_from = $req->input('work_day_from');
            $spasarkum->work_day_to = $req->input('work_day_to');
            $spasarkum->phone_number = $req->input('phone_number');
            $spasarkum->email = $req->input('email');
            $spasarkum->site = $req->input('site');
            $spasarkum->adress = $req->input('adress');
            $spasarkum->number_adress = $req->input('number_adress');
            $spasarkum->partner = $req->input('partner');
            $spasarkum->special_offer = $req->input('special_offer');
            $spasarkum->special_offer_time_from = $req->input('special_offer_time_from');
            $spasarkum->special_offer_time_to = $req->input('special_offer_time_to');
            $spasarkum->orientation = $req->input('orientation');
            $spasarkum->title_orientation = $req->input('title_orientation');
            $spasarkum->lat = $req->input('lat');
            $spasarkum->lng = $req->input('lng');
        }

        $spasarkum->save();
        return redirect()->route('update',$id)->with('updated','Հաջողությամբ փոփոխվել է');
    }
}
