<?php

namespace App\Http\Controllers;
use App\Models\Rule;
use Illuminate\Http\Request;

class RulesController extends Controller
{
    public function index(){
        $rules = Rule::all();
        return view('rules.rules', ['data'=>$rules]);
    }

    public function indexJson(){
        $data = Rule::all();
        return json_encode($data);
    }

    public function deleteRule($id){
        Rule::find($id)->delete();
        return redirect()->route('rules')->with('deleted','Հաջողությամբ ջնջվել է');
    }

    public function addRule(){
        return view('rules.addRule');
    }

    public function submitRule(Request $req){

        $rules = new Rule();
        $rules->rule = $req->input('rule');

            if ($req->hasfile('image')){
                $file = $req->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/news/', $filename);
                $rules->image = $filename;
            }else{
                $rules = new Rule();
                $rules->rule = $req->input('rule');
            }

        $rules->save();
            return redirect()->route('rules')->with('success','Հաջողությամբ ավելացվել է');
        }


    public function updateRule($id){
        $rules = Rule::find($id);
        return view('rules.updateRule', ['data'=>$rules]);
    }

    public function updateRuleForm($id, Request $req){
        $rules = Rule::find($id);
        $rules->rule = $req->input('rule');

        if ($req->hasfile('image')){
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('uploads/news/', $filename);
            $rules->image = $filename;
        }else{
            $rules = Rule::find($id);
            $rules->rule = $req->input('rule');

        }

        $rules->save();
        return redirect()->route('rules')->with('updated','Հաջողությամբ փոփոխվել է');
    }

}
