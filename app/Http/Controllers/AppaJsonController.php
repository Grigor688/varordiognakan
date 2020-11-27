<?php

namespace App\Http\Controllers;
use App\Models\Appa;
use Illuminate\Http\Request;

class AppaJsonController extends Controller
{
    public function index(){
        $appa = Appa::all();
        return json_encode($appa);
    }
}
