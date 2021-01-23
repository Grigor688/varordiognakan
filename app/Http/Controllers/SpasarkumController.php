<?php

namespace App\Http\Controllers;

use App\Models\Spasarkum;
use Illuminate\Http\Request;

class SpasarkumController extends Controller
{
    public function  __construct() {
        Spasarkum::where('special_offer_time_to','<',\Illuminate\Support\Carbon::now())->update([
            'special_offer_time_to'=>null,
            'special_offer_time_from'=>null,
            'special_offer'=>null,
        ]);
    }

    public function deleteImage($id){
        Spasarkum::where(['id' => $id])->update(['image' => null]);
        return redirect()->route('update',$id);
    }

    public function deleteImageSpecial($id){
        Spasarkum::where(['id' => $id])->update(['special_offer_image' => null]);
        return redirect()->route('update',$id);
    }

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
        $spasarkum->work_time_from = $req->input('work_time_from');
        $spasarkum->work_time_to = $req->input('work_time_to');
        $spasarkum->saturday_work_time_from = $req->input('saturday_work_time_from');
        $spasarkum->saturday_work_time_to = $req->input('saturday_work_time_to');
        $spasarkum->phone_number = $req->input('phone_number');
        $spasarkum->email = $req->input('email');
        $spasarkum->site = $req->input('site');
        $spasarkum->adress = $req->input('adress');
        $spasarkum->number_adress = $req->input('number_adress');
        $spasarkum->partner = $req->input('partner');
        $spasarkum->special_offer = $req->special_offer;
        $spasarkum->special_offer_title = $req->input('special_offer_title');
        $spasarkum->special_offer_time_from = $req->special_offer_time_from;
        $spasarkum->special_offer_time_to = $req->special_offer_time_to;
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
        }
        if ($req->hasfile('special_offer_image')){
            $file = $req->file('special_offer_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('uploads/news/', $filename);
            $spasarkum->special_offer_image = $filename;
        }

//        dd($spasarkum);
        $spasarkum->save();
        return redirect()->route('addForm')->with('success','Հաջողությամբ ավելացվել է');
    }

    public function allData(){
//        dd(auth()->user());
        return view('spasarkum.spasarkum',['data'=>Spasarkum::all()->sortKeysDesc()]);
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
//        $data->work_day_from = date('Y-m-d\TH:i:s', strtotime($data->work_day_from));
//        $data->work_day_to = date('Y-m-d\TH:i:s', strtotime($data->work_day_to));
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
        $spasarkum->work_time_from = $req->input('work_time_from');
        $spasarkum->work_time_to = $req->input('work_time_to');
        $spasarkum->saturday_work_time_from = $req->input('saturday_work_time_from');
        $spasarkum->saturday_work_time_to = $req->input('saturday_work_time_to');
        $spasarkum->phone_number = $req->input('phone_number');
        $spasarkum->email = $req->input('email');
        $spasarkum->site = $req->input('site');
        $spasarkum->adress = $req->input('adress');
        $spasarkum->number_adress = $req->input('number_adress');
        $spasarkum->partner = $req->input('partner');
        $spasarkum->special_offer = $req->input('special_offer');
        $spasarkum->special_offer_title = $req->input('special_offer_title');
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
        }elseif ($req->hasfile('special_offer_image')){
                $file = $req->file('special_offer_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/news/', $filename);
                $spasarkum->special_offer_image = $filename;
            }else{
//            return $req;
//            $spasarkum->image = "";
            $spasarkum = Spasarkum::find($id);
            $spasarkum->name_company = $req->input('name_company');
            $spasarkum->name = $req->input('name');
            $spasarkum->activity = $req->input('activity');
            $spasarkum->work_day_from = $req->input('work_day_from');
            $spasarkum->work_day_to = $req->input('work_day_to');
            $spasarkum->work_time_from = $req->input('work_time_from');
            $spasarkum->work_time_to = $req->input('work_time_to');
            $spasarkum->saturday_work_time_from = $req->input('saturday_work_time_from');
            $spasarkum->saturday_work_time_to = $req->input('saturday_work_time_to');
            $spasarkum->phone_number = $req->input('phone_number');
            $spasarkum->email = $req->input('email');
            $spasarkum->site = $req->input('site');
            $spasarkum->adress = $req->input('adress');
            $spasarkum->number_adress = $req->input('number_adress');
            $spasarkum->partner = $req->input('partner');
            $spasarkum->special_offer = $req->input('special_offer');
            $spasarkum->special_offer_title = $req->input('special_offer_title');
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
