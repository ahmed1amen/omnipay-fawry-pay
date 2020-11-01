<?php

use Omnipay\FawryPay\Gateway;
use Omnipay\Omnipay;
use Omnipay\Tests\GatewayTestCase;
use PHPUnit\Framework\TestCase;

class GatewayTest extends GatewayTestCase
{


    public function setUp()
    {
        parent::setUp();

        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());
        $this->gateway->setMerchantCode('jmJFL6bO/qd4bUB2rA698Q==');
        $this->gateway->setMerchant_sec_key('b85079197e21454bbefef761fc06c368');
        $this->gateway->setPayment_method('PAYATFAWRY');
        $this->gateway->setTestMode(true);


    }

    public function testPurchase()
    {


        $response = $this->gateway->purchase([
            "customerName" => 'asdasdasd',
            "customerMobile" => '01127677496',
            "customerEmail" => 'ahmed1amen.g@gmail.com',
            "amount" => '580.5',
            "chargeItems" => [
                [
                "itemId" => "12",
                "description" => "Item Description",
                "price" => "580.55",
                "quantity" => "1"
                ]
            ],

        ])->send();


        $this->assertTrue($response->isSuccessful());
        $this->assertNull($response->getTransactionReference());
    }

    public function testaaa (){


        $merchantCode    = 'jmJFL6bO/qd4bUB2rA698Q==';
        $merchantRefNumber  = '977864976';
        $merchant_sec_key =  'b85079197e21454bbefef761fc06c368'; // For the sake of demonstration
        $signature = hash('sha256' , $merchantCode . $merchantRefNumber . $merchant_sec_key);
        $httpClient = new \GuzzleHttp\Client(); // guzzle 6.3
        $response = $httpClient->request('GET', 'https://atfawry.fawrystaging.com/ECommerceWeb/Fawry/payments/status', [
            'query' => [
                'merchantCode' => $merchantCode,
                'merchantRefNumber' => $merchantRefNumber,
                'signature' => $signature
            ]
        ]);
        $response = json_decode($response->getBody()->getContents(), true);
        $paymentStatus = $response['payment_status']; // get response values


        $gateway = Omnipay::create('FawryPay');
        $gateway->setMerchantCode('jmJFL6bO/qd4bUB2rA698Q==');
        $gateway->setMerchant_sec_key('b85079197e21454bbefef761fc06c368');
        $gateway->setPayment_method('PAYATFAWRY');
        $gateway->setTestMode(false);

        /**
         * @var  $response \Omnipay\FawryPay\Message\MakePaymentWithReferenceNumberRequest
         */
        $response = $gateway->fetchTransaction()->setTransactionReference('977864976')->send();



        if ($response->isSuccessful())
            return response()->json($response->getdata(),200);
        else
            return response()->json($response->getdata(),400);


    }
}
