<?php

require_once 'vendor/autoload.php';
use Omnipay\Omnipay;

$gateway = Omnipay::create('FawryPay');

$gateway->setMerchantCode('jmJFL6bO/qd4bUB2rA698Q==');
$gateway->setMerchant_sec_key('b85079197e21454bbefef761fc06c368');
$gateway->setPayment_method('PAYATFAWRY');
$gateway->setTestMode(true);

$response = $gateway->makePaymentWithReferenceNumber([

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

dd($response->isSuccessful());

