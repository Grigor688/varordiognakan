<?php

namespace App\Http\Controllers;

use App\Models\BuyModel;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function success_result(){
        echo 'ok';
    }
    public function success(Request $request){

        BuyModel::create([
           'name'=>'Exav'
        ]);
        return 'ok success';
    }
    public function error(){
        BuyModel::create([
            'name'=>'Chexav'
        ]);
        return 'error payment';
    }
}
