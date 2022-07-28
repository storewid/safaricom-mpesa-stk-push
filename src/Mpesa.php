<?php

namespace Storewid\SafaricomMpesa;

use DateTime;
use Storewid\SafaricomMpesa\Enums\Endpoint;

class Mpesa
{


    private $key;
    private $secret;
    private $token;
    private $environment; // sanbox or live
    public function __construct($key, $secret, $environment = "sandbox")
    {
        $this->key = $key;
        $this->secret = $secret;
        $this->environment = $environment;
    }

    public function getAccessToken()
    {
        if ($this->environment == 'sandbox')
            $base_url = Endpoint::SANDBOX_BASE_ENDPOINT;

        $ch = curl_init($base_url . "" . Endpoint::AUTH_ENDPOINT);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . base64_encode($this->key . "" . $this->secret)]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        $this->token = json_decode($response)->access_token;

        return json_decode($response)->access_token;
    }

    public function stk_push($business_shortcode, $amount, $customer_msisdn, $callbackurl, $account_reference, $transaction_type = "CustomerPayBillOnline", $transaction_description = "Making Payments")
    {

        if ($this->environment == 'sandbox')
            $base_url = Endpoint::SANDBOX_BASE_ENDPOINT;

        $token = $this->getAccessToken();
        $now = new DateTime();
        $Timestamp = $now->format('YmdHis');
        $params = [

            "BusinessShortCode" => $business_shortcode,
            "Password" => base64_encode($business_shortcode . "" . $this->key . "" . $Timestamp),
            "Timestamp" => $transaction_type,
            "TransactionType" => "",
            "Amount" => $amount,
            "PartyA" => $customer_msisdn,
            "PartyB" => $business_shortcode,
            "PhoneNumber" => $customer_msisdn,
            "CallBackURL" => $callbackurl,
            "AccountReference" => $account_reference,
            "TransactionDesc" => $transaction_description
        ];


        $ch = curl_init($base_url . "" . Endpoint::STK_PUSH_ENDPOINT);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response     = curl_exec($ch);
        curl_close($ch);


        return $response;
    }
}
