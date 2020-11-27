<?php

namespace App\Http\Controllers;

use App\Models\Spasarkum;
use App\Models\Advice;
use App\Models\News;
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

        $data = Spasarkum::with(['advices', 'newses'])->where(['id' => $id])->first();
        return view('spasarkum.update', ['data' => $data]);
    }

    //SPASARKUM//NORUTYUN

    public function addnews(Request $request){
        return view('spasarkum.addNews', [
            'spasarkum_id' => $request->id
        ]);
    }
    public function submitNews(Request $request){
        $news = new News();
        $news->newses = $request->input('newses');
        $news->spasarkums_id = $request->input('spasarkum_id');

        if ($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('uploads/news/', $filename);
            $news->image = $filename;
        }else{
            return $request;
            $news->image = "";
        }

        $news->save();
        return redirect()->back()->with('success','Հաջողությամբ ավելացվել է');
    }

    public function deleteNews($id){
        News::find($id)->delete();
        return redirect()->route('spasarkum')->with('deleted','Հաջողությամբ ջնջվել է');
    }

    public function updateNews($id, Request $req){
        $news = News::find($id);
        $news->newses = $req->input('newses');
        $news->save();
        return redirect()->route('spasarkum',$id)->with('updated','Հաջողությամբ փոփոխվել է');
    }

    //SPASARKUM//XORHURD

    public function addAdvice(Request $request){
        return view('spasarkum.addAdvice', [
            'spasarkum_id' => $request->id
        ]);
    }

    public function submitAdvice(Request $request){
        $advice = new Advice();
        $advice->advice = $request->input('advice');
        $advice->spasarkums_id = $request->input('spasarkum_id');

        if ($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('uploads/advice/', $filename);
            $advice->image = $filename;
        }else{
            return $request;
            $advice->image = "";
        }

        $advice->save();
        return redirect()->back()->with('success','Հաջողությամբ ավելացվել է');
    }




    public function deleteAdvice($id){
        Advice::find($id)->delete();
        return redirect()->route('spasarkum')->with('deleted','Հաջողությամբ ջնջվել է');
    }

    public function updateAdvice($id, Request $req){
        $advice = Advice::find($id);
        $advice->advice = $req->input('advice');
        $advice->save();
        return redirect()->route('spasarkum',$id)->with('updated','Հաջողությամբ փոփոխվել է');
    }
    //SPASARKUM//XORHURD

    public function updateForm($id, Request $req){
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
        return redirect()->route('spasarkum',$id)->with('updated','Հաջողությամբ փոփոխվել է');
    }
}
