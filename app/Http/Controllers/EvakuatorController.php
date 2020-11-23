<?php

namespace App\Http\Controllers;
use App\Models\Evakuator;
use Illuminate\Http\Request;

class EvakuatorController extends Controller
{
    public function index(){
        return view('sos.evakuator',[
            'all'=>Evakuator::all()
        ]);
    }

    public function add(){
        return view('sos.addevakuator');
    }

    public function submitEv(Request $req){

        $evakuator = new Evakuator();
        $evakuator->name = $req->input('name');
        $evakuator->phone = $req->input('phone');
        $evakuator->adress = $req->input('adress');
        $evakuator->lat = $req->input('lat');
        $evakuator->lng = $req->input('lng');

        $evakuator->save();
        return redirect()->route('evakuator')->with('success','Հաջողությամբ ավելացվել է');
    }

    public function deleteEvakuator($id){
        Evakuator::find($id)->delete();
        return redirect()->route('evakuator')->with('deleted','Հաջողությամբ ջնջվել է');
    }

    public function updateEvakuator($id){
        $evakuator = new Evakuator();
        return view('sos.updateEvakuator', ['data'=>$evakuator->find($id)]);
    }

    public function updateEvakuatorForm($id, Request $req){
        $evakuator = Evakuator::find($id);
        $evakuator->name = $req->input('name');
        $evakuator->phone = $req->input('phone');
        $evakuator->adress = $req->input('adress');
        $evakuator->lat = $req->input('lat');
        $evakuator->lng = $req->input('lng');

        $evakuator->save();
        return redirect()->route('evakuator',$id)->with('updated','Հաջողությամբ փոփոխվել է');
    }
}
