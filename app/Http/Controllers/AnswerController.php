<?php

namespace App\Http\Controllers;
use App\Models\Answer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index(){
        $data = Answer::all();


        return view('answer.answer', compact('data'));
    }

    public function deleteAnswer($id){
        Answer::find($id)->delete();
        return redirect()->route('answer')->with('deleted','Հաջողությամբ ջնջվել է');
    }

    public function createQuestion($title,$question){
        if (!empty($title) && !empty($question)){
            $model = new Answer();
            $model->title = $title;
            $model->question = $question;
            if ($model->save()){
                return json_encode([$model->id]);
            }
        }
        return 'error';
    }

    public function getAnswer($id){
        if(!empty($id)){
            return json_encode(Answer::find($id));
        }
    }

    public function updateAnswer($id){

        Answer::find($id)->update([
            'status'=>'active'
        ]);
        $data = Answer::find($id);
        return view('answer.updateAnswer', ['data' => $data]);
    }

    public function updateFormAnswer($id, Request $req){
        $answer = Answer::find($id);
        $answer->title = $req->input('title');
        $answer->question = $req->input('question');
        $answer->answer = $req->input('answer');

        $answer->save();
        return redirect()->route('answer')->with('updated','Հաջողությամբ փոփոխվել է');
    }
}










