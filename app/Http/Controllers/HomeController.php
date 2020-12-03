<?php

namespace App\Http\Controllers;

use App\Models\Ogtater;
use App\Models\Evakuator;
use App\Models\Vulkanacum;
use App\Models\Appa;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function gmaps($id)
    {
        $ogtId = new Ogtater();
        return view('gmaps',[
            'evakuator'=> Evakuator::all(),
            'data' => $ogtId->find($id)
        ]);
    }

    public function gmapsSelect()
    {
       if ($_POST['value'] == 1){
            $service = Evakuator::all();
           $data = [
               'type' => 1,
               'content' => $service
           ];
           return json_encode($data);

       }elseif ($_POST['value'] == 2){
           $service = Vulkanacum::all();
           $data = [
               'type' => 1,
               'content' => $service
           ];
           return json_encode($data);
       }
    }

    public function appa(){
        return view('appa.appa',['data'=>Appa::all()]);
    }

    public function addAppa(){
        return view('appa.addAppa');
    }

    public function submitAppa(Request $req){

        $appa = new Appa();
        $appa->name = $req->input('name');
        $appa->phone = $req->input('phone');

        if ($req->hasfile('image')){
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('uploads/news/', $filename);
            $appa->image = $filename;
        }else{
            $appa = new Appa();
            $appa->name = $req->input('name');
            $appa->phone = $req->input('phone');
        }

        $appa->save();
        return redirect()->route('appa')->with('success','Հաջողությամբ ավելացվել է');
    }

    public function deleteAppa($id){
        Appa::find($id)->delete();
        return redirect()->route('appa')->with('deleted','Հաջողությամբ ջնջվել է');
    }

    public function updateAppa($id){
        $appa = new Appa();
        return view('appa.updateAppa', ['data'=>$appa->find($id)]);
    }

    public function updateAppaForm($id, Request $req){
        $appa = Appa::find($id);
        $appa->name = $req->input('name');
        $appa->phone = $req->input('phone');

        if ($req->hasfile('image')){
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('uploads/news/', $filename);
            $appa->image = $filename;
        }else{
            $appa = Appa::find($id);
            $appa->name = $req->input('name');
            $appa->phone = $req->input('phone');
        }

        $appa->save();
        return redirect()->route('appa',$id)->with('updated','Հաջողությամբ փոփոխվել է');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function service()
    {
        return view('spasarkum');
    }

}
