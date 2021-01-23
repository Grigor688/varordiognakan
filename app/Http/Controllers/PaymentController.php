<?php

namespace App\Http\Controllers;

use App\Models\BuyModel;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function success_result(){
        echo 'ok';
    }

    public function test(){
        dd('test');
    }
    public function success(Request $request){

//        BuyModel::create([
//           'name'=> json_encode($request->all())
//        ]);
        $BuyModel = new BuyModel();
        $BuyModel->user_id = $request->input('EDP_BILL_NO');
        $BuyModel->name = $request->input('own_home');
        $BuyModel->payment = $request->input('payment');
        $BuyModel->number_adress = $request->input('own_name');
        $BuyModel->sum = $request->input('total');
        $BuyModel->end_of_term = $request->input('own_phone');
        $BuyModel->pay = '1';
        $BuyModel->save();

        return 'success_payment';
    }
    public function error(Request $request){
//        BuyModel::create([
//            'name'=>'error'
//        ]);
        $BuyModel = new BuyModel();
        $BuyModel->user_id = $request->input('EDP_BILL_NO');
        $BuyModel->name = $request->input('own_home');
        $BuyModel->payment = $request->input('payment');
        $BuyModel->number_adress = $request->input('own_name');
        $BuyModel->sum = $request->input('total');
        $BuyModel->end_of_term = $request->input('own_phone');
        $BuyModel->pay = '0';
        $BuyModel->save();

        return 'error_payment';
    }

    public function idramView(){
        $data = BuyModel::all()->sortBy('end_of_term');
        return view('idram.idram', ['data'=>$data]);
    }
    public function updateIdram($id){
        BuyModel::find($id)->update([
            'status'=>'active'
        ]);
        return redirect()->route('idram');
    }

    public function deleteIdram($id){
        BuyModel::find($id)->delete();
        return redirect()->route('idram')->with('deleted','Հաջողությամբ ջնջվել է');
    }

    public function updateIdramEdit(Request $request, $id){
        $BuyModel = BuyModel::find($id);
        return view('idram.updateIdram', ['data'=>$BuyModel]);
    }

    public function updateIdramEditForm($id, Request $req){
        $idram = BuyModel::find($id);
        $idram->comment = $req->input('comment');
        $idram->end_of_term = $req->input('end_of_term');
        $idram->save();
        return redirect()->route('idram',$id)->with('updated','Հաջողությամբ փոփոխվել է');
    }

    public function numberAdressJsson($id){
        $idram = BuyModel::where(['user_id' => $id])->get(['user_id','payment', 'number_adress', 'sum', 'end_of_term', 'name', 'pay']);
        return json_encode($idram);
    }

    public function vcharumner(){
        return view('vcharumner.vcharum');
    }
}
