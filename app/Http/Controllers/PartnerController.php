<?php

namespace App\Http\Controllers;

use App\Models\Spasarkum;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(){

        $spasarkum = Spasarkum::select('*')->where('partner', '1')->get();
        return view('partner.partner', [
            'data' => $spasarkum
        ]);
    }

    public function updatePartner($id){
        $spasarkum = new Spasarkum();
        return view('partner.updatePartner', ['data'=>$spasarkum->find($id)]);
    }

    public function updatePartnerForm($id, Request $req){
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
        return redirect()->route('partner',$id)->with('updated','Հաջողությամբ փոփոխվել է');
    }


}
