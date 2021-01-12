<?php

namespace App\Http\Controllers;

use App\Models\Ogtater;
use Illuminate\Http\Request;

class SosController extends Controller
{
    public function index(){
        return view('sos.sos',[
            'data'=>Ogtater::all()->sortKeysDesc()
        ]);
    }
}
