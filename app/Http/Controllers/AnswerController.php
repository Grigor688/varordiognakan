<?php

namespace App\Http\Controllers;
use App\Models\Answer;
use App\Models\Ogtater;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index(){
        $data = Answer::all()->sortKeysDesc();
        return view('answer.answer', compact('data'));
    }

    public function deleteAnswer($id){
        Answer::find($id)->delete();
        return redirect()->route('answer')->with('deleted','Հաջողությամբ ջնջվել է');
    }

    public function newOgtater(){
        $ogtater = new Ogtater();
        if($ogtater->save()){
            return json_encode([$ogtater->id]);
        }
        return "error";
    }

    public function createQuestion($user_id,$title,$question){
        if (!empty($user_id) &&!empty($title) && !empty($question)){
            $model = new Answer();
            $model->user_id = $user_id;
            $model->title = $title;
            $model->question = $question;
            if ($model->save()){
                return json_encode([$model->user_id]);
            }
        }
        return 'error';
    }

    public function getAnswer($id){
        if(!empty($id)){
//            return json_encode(Answer::find($id));
            return json_encode(Answer::where(['user_id' => $id])->orderBy('id','desc')->get(['user_id','question', 'answer', 'title' ,'created_at', 'updated_at', 'status']));
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
//        $answer->title = $req->input('title');
//        $answer->question = $req->input('question');
        $answer->answer = $req->input('answer');
        $answer->comment = $req->input('comment');

        $answer->save();
        return redirect()->route('answer')->with('updated','Հաջողությամբ փոփոխվել է');
    }
}










