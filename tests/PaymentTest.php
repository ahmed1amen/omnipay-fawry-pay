<?php

namespace Omnipay\FawryPay;

use GuzzleHttp\Client;
use JMS\Serializer\SerializerInterface;
use Omnipay\FawryPay\Message\GetMerchantInfoRequest;
use Omnipay\Tests\GatewayTestCase;

class GatewayTest extends GatewayTestCase
{
    public function testSupportsEnrollment()
    {
        $merchantCode    = 'jmJFL6bO/qd4bUB2rA698Q==';  // required	The merchant code provided by FawryPay team during the account setup.
        $merchantRefNum  = '950543509';   // required Unique Order ID
        $merchant_cust_prof_id  = '';     //  optional	The unique customer profile ID in merchant system. This can be the user ID.
        $payment_method = 'PAYATFAWRY';
        $merchant_sec_key =  'b85079197e21454bbefef761fc06c368';
        $amount = '580.55';
        $signature = hash('sha256' , $merchantCode . $merchantRefNum . $merchant_cust_prof_id . $payment_method . $amount . $merchant_sec_key);

        dd($signature);



    }


}
