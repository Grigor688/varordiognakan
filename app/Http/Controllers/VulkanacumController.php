<?php

namespace App\Http\Controllers;
use App\Models\Vulkanacum;
use Illuminate\Http\Request;

class VulkanacumController extends Controller
{
    public function index(){
        return view('sos.vulkanacum',[
            'all'=>Vulkanacum::all()
        ]);
    }

    public function add(){
        return view('sos.addVulkanacum');
    }

    public function submitVulkanacum(Request $req){

        $vulkanacum = new Vulkanacum();
        $vulkanacum->name = $req->input('name');
        $vulkanacum->phone = $req->input('phone');
        $vulkanacum->adress = $req->input('adress');
        $vulkanacum->lat = $req->input('lat');
        $vulkanacum->lng = $req->input('lng');

        $vulkanacum->save();
        return redirect()->route('vulkanacum')->with('success','Հաջողությամբ ավելացվել է');
    }

    public function deleteVulkanacum($id){
        Vulkanacum::find($id)->delete();
        return redirect()->route('vulkanacum')->with('deleted','Հաջողությամբ ջնջվել է');
    }

    public function updateVulkanacum($id){
        $vulkanacum = new Vulkanacum();
        return view('sos.updateVulkanacum', ['data'=>$vulkanacum->find($id)]);
    }


    public function updateVulkanacumrForm($id, Request $req){
        $vulkanacum = Vulkanacum::find($id);
        $vulkanacum->name = $req->input('name');
        $vulkanacum->phone = $req->input('phone');
        $vulkanacum->adress = $req->input('adress');
        $vulkanacum->lat = $req->input('lat');
        $vulkanacum->lng = $req->input('lng');

        $vulkanacum->save();
        return redirect()->route('vulkanacum',$id)->with('updated','Հաջողությամբ փոփոխվել է');
    }
}
