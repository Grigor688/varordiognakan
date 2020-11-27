<?php

namespace App\Http\Controllers;
use App\Models\Evakuator;
use Illuminate\Http\Request;

class EvakuatorJsonController extends Controller
{
    public function index(){
        $evakuator = Evakuator::all();
        return json_encode($evakuator);
    }
}
