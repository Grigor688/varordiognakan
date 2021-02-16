<?php

namespace App\Http\Controllers;

use App\Models\Ogtater;
use App\Models\Spasarkum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OgtaterController extends Controller
{
    public function index(){
       return view('ogtater.ogtater',[
            'data'=>Ogtater::all()->sortKeysDesc()
        ]);
    }

    public function registerogtater(){
        $register =  DB::table('ogtaters')->whereNotNull('firstname')->get();
        return view('ogtater.registerOgtater',[
            'data'=> $register->sortKeysDesc()
        ]);
    }

    public function updateregisterOgtater($id){
        $data = Ogtater::find($id);
        return view('ogtater.updateregisterOgtater', [
            'data' => $data,
            'data2' => Spasarkum::all()]);
    }

    public function updateregisterOgtaterForm($id, Request $req){
        $ogtater = Ogtater::find($id);
        $ogtater->user_id = $req->input('user_id');
        $ogtater->firstname = $req->input('firstname');
        $ogtater->lastname = $req->input('lastname');
        $ogtater->phone_number = $req->input('phone_number');
        $ogtater->car_number = $req->input('car_number');
        $ogtater->appa = $req->input('appa');
        $ogtater->car_company = $req->input('car_company');
        $ogtater->car_year = $req->input('car_year');
        $ogtater->car_model = $req->input('car_model');
        $ogtater->car_engine = $req->input('car_engine');
        $ogtater->vin_code = $req->input('vin_code');
        $ogtater->service_point = $req->input('service_point');

        $ogtater->save();

        return redirect()->route('registerogtater',$id)->with('updated','Հաջողությամբ փոփոխվել է');
    }


    public function deleteUser($id){
        Ogtater::find($id)->delete();
        return redirect()->route('ogtater')->with('deleted','Հաջողությամբ ջնջվել է');
    }

    public function deleteregisterOgtater($id){
        Ogtater::find($id)->delete();
        return redirect()->route('registerogtater')->with('deleted','Հաջողությամբ ջնջվել է');
    }

    public function ogtatergetId($id){
        $ogtater = Ogtater::where(['user_id' => $id])->get();
        return json_encode($ogtater);
    }

    public function update($id){
        $ogtater = new Ogtater();
        return view('ogtater.update',[
            'data'=>$ogtater->find($id),
            'data2'=>Spasarkum::all()
        ]);
    }

    public function updateOgtaterForm($id, Request $req){
        $ogtater = Ogtater::find($id);
        $ogtater->user_id = $req->input('user_id');
        $ogtater->firstname = $req->input('firstname');
        $ogtater->lastname = $req->input('lastname');
        $ogtater->phone_number = $req->input('phone_number');
        $ogtater->car_number = $req->input('car_number');
        $ogtater->appa = $req->input('appa');
        $ogtater->car_company = $req->input('car_company');
        $ogtater->car_year = $req->input('car_year');
        $ogtater->car_model = $req->input('car_model');
        $ogtater->car_engine = $req->input('car_engine');
        $ogtater->vin_code = $req->input('vin_code');
        $ogtater->service_point = $req->input('service_point');

        $ogtater->save();

        return redirect()->route('ogtater',$id)->with('updated','Հաջողությամբ փոփոխվել է');
    }

    public function addOgtater(Request $request){
        $ogtater = new Ogtater();
        $ogtater->user_id = $request->user_id;
        $ogtater->firstname = $request->firstname;
        $ogtater->lastname = $request->lastname;
        $ogtater->phone_number = $request->phone_number;
        $ogtater->car_number = $request->car_number;
        $ogtater->appa = $request->appa;
        $ogtater->car_company = $request->car_company;
        $ogtater->car_year = $request->car_year;
        $ogtater->car_model = $request->car_model;
        $ogtater->car_engine = $request->car_engine;
        $ogtater->vin_code = $request->vin_code;
        $ogtater->lat = $request->lat;
        $ogtater->lng = $request->lng;
        if ($ogtater->save()){
            return json_encode($ogtater);
        }else{
            return "0";
        }


    }

    public function updateOgtater(Request $request){
        $user_id = $request->user_id;
        $ogtater = Ogtater::where(['user_id' => $user_id])->first();
        $ogtater->firstname = $request->firstname;
        $ogtater->lastname = $request->lastname;
        $ogtater->phone_number = $request->phone_number;
        $ogtater->car_number = $request->car_number;
        $ogtater->appa = $request->appa;
        $ogtater->car_company = $request->car_company;
        $ogtater->car_year = $request->car_year;
        $ogtater->car_model = $request->car_model;
        $ogtater->car_engine = $request->car_engine;
        $ogtater->vin_code = $request->vin_code;
        $ogtater->lat = $request->lat;
        $ogtater->lng = $request->lng;
        if ($ogtater->save()){
            return json_encode($ogtater);
        }else{
            return "0";
        }


    }
}
