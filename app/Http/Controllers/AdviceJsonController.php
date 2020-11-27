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
}
