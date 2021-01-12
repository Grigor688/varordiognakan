<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;

class NewsJsonController extends Controller
{
    public function index(){
        $news = News::orderBy('id','desc')->get();
        return json_encode($news);
    }

    public function news(){
        $news = News::all()->sortKeysDesc();
        return view('news.news', ['data'=>$news]);
    }

    public function updateNews($id){
        $news = News::find($id);
        return view('news.updateNews', ['data' => $news]);
    }

    public function updateFormNews($id, Request $req){
        $news = News::find($id);
        $news->newses = $req->input('newses');
        $news->title = $req->input('title');

        if ($req->hasfile('image')){
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('uploads/news/', $filename);
            $news->image = $filename;
        }else{
            $news = News::find($id);
            $news->newses = $req->input('newses');
            $news->title = $req->input('title');
        }

        $news->save();
        return redirect()->route('news',$id)->with('updated','Հաջողությամբ փոփոխվել է');
    }

    public function addnews(Request $request){
        return view('news.addNews');
    }

    public function submitNews(Request $request){
        $news = new News();
        $news->newses = $request->input('newses');
        $news->title = $request->input('title');

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
        return redirect()->route('news')->with('success','Հաջողությամբ փոփոխվել է');
    }

    public function deleteNews($id){
        News::find($id)->delete();
        return redirect()->route('news')->with('deleted','Հաջողությամբ ջնջվել է');
    }
}
