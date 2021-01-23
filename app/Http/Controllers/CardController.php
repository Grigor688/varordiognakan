<?php

namespace App\Http\Controllers;
use App\Models\Card;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CardController extends Controller
{
    private $userName_test = "webex_test";
    private $password_test = "webex_new";
    private $apiRegister_test = 'https://ipaytest.arca.am:8445/payment/rest/register.do';
    private $apiGetStatus_test = 'https://ipaytest.arca.am:8445/payment/rest/getOrderStatusExtended.do';

//    public $userName = $userName_test;
//    public $password = $password_test;

    public function index(){
        $card = Card::all()->sortKeysDesc();
        return view('card.card',['data'=>$card]);
    }

    public function deleteCard($id){
        Card::find($id)->delete();
        return redirect()->route('card')->with('deleted','Հաջողությամբ ջնջվել է');
    }
    public function updateCardEdit($id){
        $data = Card::find($id);
        return view('card.updateCard', ['data' => $data]);
    }
    public function updateCardEditForm($id, Request $req){
        $card = Card::find($id);
        $card->end_of_term = $req->input('end_of_term');
        $card->comment = $req->input('comment');
        $card->save();
        return redirect()->route('card',$id)->with('updated','Հաջողությամբ փոփոխվել է');
    }

    public function updateCard($id){
        Card::find($id)->update([
            'status'=>'active'
        ]);
        return redirect()->route('card');
    }

    public function createCardPayment(Request $request, $payment_card,$number_adress, $sum, $end_of_term){
//        051-haykakan dram
        $amount = $sum ?? 50000;
        $acba_amount = $amount * 100;
        $currency = $request->get('currency', '051');

        # making here
        $orderNumber = Str::random(32);
        $returnUrl = route('orderStatus') . "?orderNumber=$orderNumber";

        $queryString = "userName={$this->userName_test}&password={$this->password_test}";
        $queryString .= "&amount={$acba_amount}&currency={$currency}";
        $queryString .= "&orderNumber={$orderNumber}";
        $queryString .= "&returnUrl={$returnUrl}";

        // return response()->json(['all'=>[$request->all(),'queryString'=>$queryString ]]);
        $curl_options = array(
            CURLOPT_URL  => $this->apiRegister_test,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $queryString,
        );
        $ch = curl_init();
        curl_setopt_array($ch, $curl_options);
        $result = curl_exec($ch);
        if (curl_errno($ch) > 0) {
            return response()->json(['curl_error' => curl_error($ch)]);
        }

        $response = json_decode($result);
        //   dump($response);
        curl_close($ch);

        if ($response->errorCode !== "0") {
            // you have error.
            return response()->json(['errorMessage' => $response->errorMessage, 'response' => $response]);
        } else {
            // do what you wanted to do.
            // 1. save order to db.
            // 2. return formUrl
            $payment = new Card;
            $payment->sum = $amount;
            $payment->order_number = $orderNumber;
            $payment->number_adress = $number_adress;
            $payment->end_of_term = $end_of_term;
            $payment->payment_card = $payment_card;
            $payment->save();


            return response()->json(['formUrl' => $response->formUrl]);
        }

        if (!empty($payment_card) && !empty($number_adress) && !empty($sum) && !empty($end_of_term)){
            $card = new Card();
            $card->payment_card = $payment_card;
            $card->number_adress = $number_adress;
            $card->sum = $sum;
            $card->end_of_term = $end_of_term;
            if ($card->save()){
                return json_encode([$card->id]);
            }
        }
        return 'error';
    }

    public function orderStatus(Request $request)
    {
        #for testing: /api/orderStatus?clientId=1&orderNumber=owXlOY0LSJuEd4yyhHZxWCccPTJBtWtX
        // $orderId = $request->orderId; // Գալիսա բայց պետք չի ինձ ստուգման համար
        $orderNumber = $request->get('orderNumber', null);

        $payment = Card::where('order_number', $orderNumber)->first();

        if ($payment->order_number === $orderNumber) {

            $queryStr = "userName={$this->userName_test}&password={$this->password_test}";
            $queryStr .= "&orderNumber=$orderNumber";


            $curlOptions = array(
                CURLOPT_URL  => $this->apiGetStatus_test,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $queryStr,
            );

            $ch = curl_init();
            curl_setopt_array($ch, $curlOptions);
            $result = curl_exec($ch);
            $response = json_decode($result);

//             dump($response);die;
            if (gettype($response) === "NULL") {
                return 'Lost internet connection, please refresh the page.';
            }
            if ($response->errorCode > 0) {
                /* maybie log response+user_id for us */
                abort(404);
            }

            if ($response->errorCode === "0" && $response->actionCode === 0 && $response->orderStatus === 2) {

                # save status = 1 [===0 -> first visit]
                # preapre success
                if ($payment->status === 0) {
                    $payment->status = 1;
                    $payment->save();
                }


                $card_header = __('payment.card_header_success');
                $card_message = __('payment.card_message_success');
                $style_class = "success";
            } else {

                # save status = -1 [===0 -> first visit]
                # prepare error
                if ($payment->status === 0) {
                    $payment->status = -1;
                    $payment->save();
                }

                $card_header = __('payment.card_header_error');
                $card_message = __('payment.card_message_error');
                $style_class = "danger";
            }
            return view('payment.card', [
                "doc_title" => "Payment Status",
                "card_header" => $card_header,
                "date" => date('d-m-Y', $response->date / 1000),
                "orderNumber" => $orderNumber,
                "amount" => ($response->amount / 100),
                "currency" => $this->getCurrencyByNbr($response->currency),
                "card_holder" => $response->cardAuthInfo->cardholderName,
                "card_message" => $card_message,
                "style_class" => $style_class,
                "link_to_home" => "/",//config('app.front_url')
            ]);
        } else {
            abort(404);
        }
    }

    public function getCurrencyByNbr($nbr = '051')
    {
        $currencies = [
            '051' => 'AMD',
            '978' => 'EUR',
            '840' => 'USD',
            '643' => 'RUB'
        ];

        return $currencies[$nbr];
    }
}
