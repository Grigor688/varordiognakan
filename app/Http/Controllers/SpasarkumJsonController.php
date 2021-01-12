<?php

namespace App\Http\Controllers;
use App\Models\Spasarkum;
use Illuminate\Http\Request;
use Psy\Util\Json;

class SpasarkumJsonController extends Controller
{
    public function index($service){

        $spasarkum = Spasarkum::where(['name' => $service])->get(['id','number_adress', 'name', 'lng', 'lat', 'partner']);
        return json_encode($spasarkum);
    }

    public function numberAdress($id){
        $number_adress = Spasarkum::where(['number_adress' => $id]) ->first();
        if(isset($number_adress)){
            $spasarkum = Spasarkum::where(['number_adress'=> $id])->first();
            return json_encode($spasarkum);
        }else{
            return json_encode([0]);
        }

    }
}
