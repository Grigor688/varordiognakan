<?php

namespace App\Http\Controllers;

use App\Models\Ogtater;
use Illuminate\Http\Request;

class OgtaterController extends Controller
{
    public function index(){
       return view('ogtater.ogtater',[
            'data'=>Ogtater::all()->sortKeysDesc()
        ]);
    }

    public function deleteUser($id){
        Ogtater::find($id)->delete();
        return redirect()->route('ogtater')->with('deleted','Հաջողությամբ ջնջվել է');
    }

    public function update($id){
        $ogtater = new Ogtater();
        return view('ogtater.update',[
            'data'=>$ogtater->find($id),
            'data2'=>Ogtater::all()
        ]);
    }

    public function updateOgtaterForm($id, Request $req){
        $ogtater = Ogtater::find($id);
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
}
