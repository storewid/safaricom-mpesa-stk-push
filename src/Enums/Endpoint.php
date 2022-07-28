<?php

namespace Storewid\SafaricomMpesa\Enums;


class Endpoint
{

    public const SANDBOX_BASE_ENDPOINT = "https://sandbox.safaricom.co.ke";


    public const STK_PUSH_ENDPOINT = "/mpesa/stkpush/v1/processrequest";

    public  const AUTH_ENDPOINT = "/oauth/v1/generate?grant_type=client_credentials";
}
