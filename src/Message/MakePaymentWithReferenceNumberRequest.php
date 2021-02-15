<?php

namespace Omnipay\FawryPay\Message;

use Omnipay\Common\Http\ClientInterface;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

class MakePaymentWithReferenceNumberRequest extends AbstractRequest
{
    public function getData()
    {

        $merchantCode = $this->getMerchantCode();  // required	The merchant code provided by FawryPay team during the account setup.
        $merchantRefNum = $this->getTransactionReference();   // required Unique Order ID
        $merchant_cust_prof_id = '';     //  optional	The unique customer profile ID in merchant system. This can be the user ID.
        $payment_method = $this->getPaymentMethod();
        $merchant_sec_key = $this->getMerchantSecKey();
        $data = [
            "merchantCode" => $merchantCode,
            "customerName" => $this->getCustomerName(),
            "customerMobile" => $this->getCustomerMobile(),
            "customerEmail" => $this->getCustomerEmail(),
            "customerProfileId" => "",
            "merchantRefNum" => $merchantRefNum,
            "amount" => $this->getAmount(),
            "paymentExpiry" => $this->getPaymentExpiry(),
            "currencyCode" => "EGP",
            "language" => $this->getLanguage(),
            "chargeItems" => $this->getChargeItems(),
            "signature" => "",
            "paymentMethod" => $payment_method,
            "description" => "Example Description"
        ];
        $data['signature'] = hash('sha256', $merchantCode . $merchantRefNum . $merchant_cust_prof_id . $payment_method . $this->getAmount() . $merchant_sec_key);



        return $data;
    }


    public function getPaymentExpiry()
    {
        return $this->getParameter('paymentExpiry');
    }

    public function setPaymentExpiry($value)
    {
        return $this->setParameter('paymentExpiry', $value);
    }

    public function getChargeItems()
    {
        return $this->getParameter('chargeItems');
    }

    public function setChargeItems($value)
    {
        return $this->setParameter('chargeItems', $value);
    }

    public function getAmount()
    {
        return $this->getParameter('amount');
    }

    public function setAmount($value)
    {
        return $this->setParameter('amount', $value);
    }

    public function getCustomerEmail()
    {
        return $this->getParameter('customerEmail');
    }

    public function setCustomerEmail($value)
    {
        return $this->setParameter('customerEmail', $value);
    }

    public function getCustomerMobile()
    {
        return $this->getParameter('customerMobile');
    }

    public function setCustomerMobile($value)
    {
        return $this->setParameter('customerMobile', $value);
    }

    public function getCustomerName()
    {
        return $this->getParameter('customerName');
    }

    public function setCustomerName($value)
    {
        return $this->setParameter('customerName', $value);
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {

        return $this->getBaseEndpoint() . '/ECommerceWeb/Fawry/payments/charge';
    }

}