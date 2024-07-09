<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Models\Chrgily\ChargilyPay;

class ChargilyPayController extends Controller
{
    //
    public function redirect()
    {
        $success_page=route('chargilypay.payments.success'); 
        $operation_id=Str::random(20).'OPR'.time();
        // return dd($operation_id);     
        $curl = curl_init();

        curl_setopt_array($curl, [
        CURLOPT_URL => "https://pay.chargily.net/test/api/v2/checkouts",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\n  \"amount\": 1000,\n  \"currency\": \"dzd\",\n  \"success_url\": \"$success_page?operation_id=$operation_id\"\n}",
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer test_sk_gpdoJktjYvibE4ydPsWQs6tf062lu6Rj5N4hQCo3",
            "Content-Type: application/json"
        ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        /* chechout response
        {"livemode":false,"id":"01j29k7r9kqrrwy58z53nrhpqz","entity":"checkout","amount":1000,"currency":"dzd","fees":0,"fees_on_merchant":0,"fees_on_customer":0,"pass_fees_to_customer":null,"chargily_pay_fees_allocation":"customer","status":"pending","deposit_transaction_id":null,"locale":"ar","description":null,"metadata":null,"success_url":"https:\/\/your-cool-website.com\/payments\/success","failure_url":null,"webhook_endpoint":null,"payment_method":null,"invoice_id":null,"customer_id":null,"payment_link_id":null,"created_at":1720456569,"updated_at":1720456569,"shipping_address":null,"collect_shipping_address":0,"discount":null,"amount_without_discount":0,"checkout_url":"https:\/\/pay.chargily.dz\/test\/checkouts\/01j29k7r9kqrrwy58z53nrhpqz\/pay"}
        */

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        $checkout_data=json_decode($response);
        //dd($checkout_data);
        //insert this data to checkout table
        $chrgily_pay=new ChargilyPay();
        $chrgily_pay->operation_id=$operation_id;
        $chrgily_pay->user_id='1';
        $chrgily_pay->user_guard='supplier';
        $chrgily_pay->livemode="$checkout_data->livemode";
        $chrgily_pay->checkout_id="$checkout_data->id";
        $chrgily_pay->entity="$checkout_data->entity";
        $chrgily_pay->amount="$checkout_data->amount";
        $chrgily_pay->currency="$checkout_data->currency";
        $chrgily_pay->fees="$checkout_data->fees";
        $chrgily_pay->fees_on_merchant="$checkout_data->fees_on_merchant";
        $chrgily_pay->fees_on_customer="$checkout_data->fees_on_customer";
        $chrgily_pay->pass_fees_to_customer="$checkout_data->pass_fees_to_customer";
        $chrgily_pay->chargily_pay_fees_allocation="$checkout_data->chargily_pay_fees_allocation";
        $chrgily_pay->status="$checkout_data->status";
        $chrgily_pay->deposit_transaction_id="$checkout_data->deposit_transaction_id";    
        $chrgily_pay->locale="$checkout_data->locale";
        $chrgily_pay->description="$checkout_data->description";    
        $chrgily_pay->metadata="$checkout_data->metadata"; 
        $chrgily_pay->success_url="$checkout_data->success_url";
        $chrgily_pay->failure_url="$checkout_data->failure_url";
        $chrgily_pay->webhook_endpoint="$checkout_data->webhook_endpoint";     
        $chrgily_pay->payment_method="$checkout_data->payment_method";
        $chrgily_pay->invoice_id="$checkout_data->invoice_id";
        $chrgily_pay->customer_id="$checkout_data->customer_id";
        $chrgily_pay->payment_link_id="$checkout_data->payment_link_id";
        $chrgily_pay->shipping_address="$checkout_data->shipping_address"; 
        $chrgily_pay->collect_shipping_address="$checkout_data->collect_shipping_address";
        $chrgily_pay->discount="$checkout_data->discount"; 
        $chrgily_pay->amount_without_discount="$checkout_data->amount_without_discount";
        $chrgily_pay->checkout_url="$checkout_data->checkout_url";
        $chrgily_pay->save();
        if($chrgily_pay)
            {
                return  redirect($checkout_data->checkout_url);
            }
        }

    }
    //success
    public function success(Request $request)
    {
        $url=$request->fullurl();
        $param=explode('?',$url);
        // dd($param);
        $key2=explode('=',$param[1]);
        $operation=explode('&',$key2[1]);
        $opration_value=$key2[2];
        $operation2=explode('&',$operation[1]);
        $opration_key=$operation2[0];
        $template='defaulte';
        $paiment=ChargilyPay::where('operation_id',$opration_value)->first();
        if($opration_key=='operation_id' && $paiment->operation_id==$opration_value)
        {
            return view('LandingPage.success',compact('template','paiment'));
        }else
        {
            return 'error';
        }
    }
    //webhook
    public function webhook()
    {

        // Your Chargily Pay Secret key, will be used to calculate the Signature
        $apiSecretKey = 'test_sk_gpdoJktjYvibE4ydPsWQs6tf062lu6Rj5N4hQCo3';

        // Extracting the 'signature' header from the HTTP request
        $signature = isset($_SERVER['HTTP_SIGNATURE']) ? $_SERVER['HTTP_SIGNATURE'] : null;

        // Getting the raw payload from the request body
        $payload = file_get_contents('php://input');

        // If there is no signature, exit the script (we will never send requests without a signature - a request without a signature is always a fake request so just ignore it)
        if (!$signature) {
            exit;
        }

        // Calculate the signature
        $computedSignature = hash_hmac('sha256', $payload, $apiSecretKey);

        // If the calculated signature doesn't match the received signature, exit the script (a request with a wrong signature means that the request has been tampered with so just ignore it)
        if (!hash_equals($signature, $computedSignature)) {
            exit();
        } else {
            // If the signatures match, proceed to decode the JSON payload
            $event = json_decode($payload);

            // Switch based on the event type
            switch ($event->type) {
                case 'checkout.paid':
                    $checkout = $event->data;
                    // Handle the successful payment.
                    //get user payment information
                    $paiment=ChargilyPay::where('checkout_id', $checkout->id)->first();
                    $paiment->status=$checkout->status;
                    $paiment->update();
                    break;
                case 'checkout.canceled':
                    $checkout = $event->data;
                    // Handle the canceled payment.
                    //get user payment information
                    $paiment=ChargilyPay::where('checkout_id', $checkout->id)->first();
                    $paiment->status=$checkout->status;
                    $paiment->update();
                    break;
                case 'checkout.failed':
                    $checkout = $event->data;
                    // Handle the failed payment.
                    //get user payment information
                    $paiment=ChargilyPay::where('checkout_id', $checkout->id)->first();
                    $paiment->status=$checkout->status;
                    $paiment->update();
                    break;
            }
        }

        // Respond with a 200 OK status code to let us know that you've received the webhook
        http_response_code(200);

    }
}
