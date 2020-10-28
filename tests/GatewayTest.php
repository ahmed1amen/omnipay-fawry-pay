<?php

use Omnipay\FawryPay\Gateway;
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
        $response = $this->gateway->makePaymentWithReferenceNumber([

            "customerName" => 'asdasdasd',
            "customerMobile" => '01127677496',
            "customerEmail" => 'ahmed1amen.g@gmail.com',
            "amount" => '580.55',
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
}
