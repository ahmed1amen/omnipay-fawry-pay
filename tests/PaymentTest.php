<?php

namespace Omnipay\FawryPay;

use GuzzleHttp\Client;
use JMS\Serializer\SerializerInterface;
use Omnipay\FawryPay\Message\GetMerchantInfoRequest;
use Omnipay\Omnipay;
use Omnipay\Tests\GatewayTestCase;

class GatewayTest extends GatewayTestCase
{
    public function testPurchase()
                {
                    $gateway = Omnipay::create('FawryPay');
                    $gateway->setMerchantCode('jmJFL6bO/qd4bUB2rA698Q==');
                    $gateway->setMerchant_sec_key('b85079197e21454bbefef761fc06c368');
                    $gateway->setPayment_method('PAYATFAWRY');
                    $gateway->setTestMode(false);

            //        $response = $gateway->purchase([
            //            "customerName" => 'ahmed amen',
            //            "customerMobile" => '01066104107',
            //            "customerEmail" => 'ahmed1amen.g@gmail.com',
            //            "amount" => '580.50',
            //            "chargeItems" => [
            //                [
            //                    "itemId" => "12",
            //                    "description" => "Item Description",
            //                    "price" => "580.55",
            //                    "quantity" => "1"
            //                ]
            //            ],
            //
            //        ])->send();

                    /**
                     * @var  $response2 \Omnipay\FawryPay\Message\FetchTransactionRequest
                     */

                 $response2= $gateway->fetchTransaction()->setTransactionReference('1681993203358962')-> send();


                    dd($response2->getData());


                }


}
