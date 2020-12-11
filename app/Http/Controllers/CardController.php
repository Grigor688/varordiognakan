<?php

namespace App\Http\Controllers;
use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index(Request $req){
        $card = Card::all();
        return view('card.card',['data'=>$card]);
    }

    public function deleteCard($id){
        Card::find($id)->delete();
        return redirect()->route('card')->with('deleted','Հաջողությամբ ջնջվել է');
    }

    public function updateCard($id){
        Card::find($id)->update([
            'status'=>'active'
        ]);
        return redirect()->route('card');
    }

    public function createCardPayment($payment_card, $payment_idram, $adress, $sum, $end_of_term){
        if (!empty($payment_card) && !empty($payment_idram) && !empty($adress) && !empty($sum) && !empty($end_of_term)){
            $card = new Card();
            $card->payment_card = $payment_card;
            $card->payment_idram = $payment_idram;
            $card->number_adress = $adress;
            $card->sum = $sum;
            $card->end_of_term = $end_of_term;
            if ($card->save()){
                return json_encode([$card->id]);
            }
        }
        return 'error';
    }
}
