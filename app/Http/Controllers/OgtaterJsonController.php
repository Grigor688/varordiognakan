<?php

namespace App\Http\Controllers;
use App\Models\Ogtater;
use Illuminate\Http\Request;

class OgtaterJsonController extends Controller
{
    public function index(){
        $ogtater = Ogtater::all();
        return json_encode($ogtater);
    }
}
