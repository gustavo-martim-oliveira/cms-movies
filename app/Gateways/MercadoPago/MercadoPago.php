<?php

namespace App\Gateways\MercadoPago;

use MercadoPago\SDK;
use MercadoPago\Payer;
use App\Models\Gateway;
use MercadoPago\Payment;

class MercadoPago {

    protected string $public_key;
    protected string $access_token;

    public function __construct()
    {

        $mp = Gateway::where('class', MercadoPago::class)->first();

        if(!$mp) return abort(501, 'Configuration gateway not find, please, run migrations and make the configurations');

        $this->public_key = $mp->data['public_key'];
        $this->access_token = $mp->data['access_token'];

        if(empty($this->access_token) or empty($this->public_key) ) return abort(501, 'MercadoPago public key and access token cannot be empty');

        SDK::setAccessToken($this->access_token);

    }

    /**
     * Start a PIX module transaction
     *
     * @param array $data
     * @param array $costumer
     * @return object
     */
    public function pix(array $data, array $costumer) : object{

        $payment = new Payment();

        $payment->transaction_amount = $data['value'];
        $payment->description = $data['description'];
        $payment->payment_method_id = 'pix';
        $payment->payer = $costumer;

        if($payment->save()){

            return $payment->point_of_interaction->transaction_data;

        }else{

            return $payment->Error();

        }
    }

    public function card(array $data, array $costumer){
        $payment = new Payment();
        $payment->transaction_amount = (float)$data['transactionAmount'];
        $payment->token = $data['token'];
        $payment->description = $data['description'];
        $payment->installments = (int) $data['installments'];
        $payment->payment_method_id = $data['paymentMethodId'];
        $payment->issuer_id = (int) $_POST['issuer'];

        $payer = new Payer();
        $payer->email = $costumer['email'];
        $payer->identification = array(
            "type" => $costumer['docType'],
            "number" => $costumer['docNumber']
        );

        $payment->payer = $payer;

        if($payment->save()){
            return $payment;
        }

        return $payment->Error();
    }

}
