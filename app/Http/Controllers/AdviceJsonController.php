<?php

namespace App\Http\Controllers;
use App\Models\Advice;
use Illuminate\Http\Request;

class AdviceJsonController extends Controller
{
    public function index(){
        $advice = Advice::all();
        return json_encode($advice);
    }

    public function advice(){
        $advice = Advice::all();
        return view('advice.advice', ['data'=>$advice]);
    }

    public function addAdvice(Request $request){
        return view('advice.addAdvice');
    }

    public function submitAdvice(Request $request){
        $advice = new Advice();
        $advice->advice = $request->input('advice');
        $advice->title = $request->input('title');

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
        return redirect()->route('advice')->with('success','Հաջողությամբ ավելացվել է');
    }


    public function deleteAdvice($id){
        Advice::find($id)->delete();
        return redirect()->route('advice')->with('deleted','Հաջողությամբ ջնջվել է');
    }

    public function updateAdvice($id){
        $advice = Advice::find($id);
        return view('advice.updateAdvice', ['data' => $advice]);

    }

    public function updateFormAdvice($id, Request $req){
        $advice = Advice::find($id);
        $advice->advice = $req->input('advice');
        $advice->title = $req->input('title');

        if ($req->hasfile('image')){
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('uploads/advice/', $filename);
            $advice->image = $filename;
        }else{
            $advice = Advice::find($id);
            $advice->advice = $req->input('advice');
            $advice->title = $req->input('title');
        }

        $advice->save();
        return redirect()->route('advice',$id)->with('updated','Հաջողությամբ փոփոխվել է');
    }
}
