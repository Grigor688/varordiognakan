<?php

namespace App\Http\Controllers;
use App\Models\Spasarkum;
use Illuminate\Http\Request;
use Psy\Util\Json;

class SpasarkumJsonController extends Controller
{
    public function index(){
        $spasarkum = Spasarkum::all();
        return json_encode($spasarkum);
    }
}
