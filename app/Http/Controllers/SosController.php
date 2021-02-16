<?php

namespace App\Http\Controllers;

use App\Models\Ogtater;
use App\Models\Sos;
use Illuminate\Http\Request;

class SosController extends Controller
{
    public function index(){
        return view('sos.sos',[
            'data'=>Sos::all()->sortKeysDesc()
        ]);
    }

    public function sosGoogle($id){
        $data = Sos::find($id);
        return view('sos.location', ['data'=>$data]);
    }

    public function addSosUser($user_id, $type, $phone_number, $lat, $lng){
        $sos = new Sos;
        $sos->user_id = $user_id;
        $sos->phone_number = $phone_number;
        $sos->name = $type;
        $sos->lat = $lat;
        $sos->lng = $lng;

        $sos->save();
        return json_encode('1');
    }

    public function deleteSosUser($id){
        Sos::find($id)->delete();
        return redirect()->route('sos')->with('deleted','Հաջողությամբ ջնջվել է');
    }
}
