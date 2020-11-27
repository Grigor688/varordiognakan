<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;

class NewsJsonController extends Controller
{
    public function index(){
        $news = News::all();
        return json_encode($news);
    }
}
