<?php
namespace Omnipay\FawryPay;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\NotificationInterface;
use Omnipay\Common\Message\RequestInterface;

/**
 * @method \Omnipay\Common\Message\NotificationInterface acceptNotification(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface authorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface capture(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface completePurchase(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface refund(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface void(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface createCard(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = array())
 */
class Gateway extends AbstractGateway
{

    public function getName()
    {
        return 'FawryPay';
    }

    /**
     * Get the gateway parameters.
     *
     * @return array
     */
    public function getDefaultParameters()
    {
        return array(
            'merchantCode' => '',
            'merchantSecKey' => '',
            'paymentMethod' => '',
            'language' => 'en-gb',
            'testMode' => false,
        );
    }

    public function getPaymentMethod()
    {
        return $this->getParameter('paymentMethod');
    }


    public function setPaymentMethod($value)
    {
        return $this->setParameter('paymentMethod', $value);
    }
    public function getMerchantSecKey()
    {
        return $this->getParameter('merchantSecKey');
    }

    public function setMerchantSecKey($value)
    {
        return $this->setParameter('merchantSecKey', $value);
    }

    public function getMerchantCode()
    {
        return $this->getParameter('merchantCode');
    }

    public function setMerchantCode($value)
    {
        return $this->setParameter('merchantCode', $value);
    }

    public function getLanguage()
    {
        return $this->getParameter('language');
    }

    public function setLanguage($value)
    {
        return $this->setParameter('language', $value);
    }


    /**
     * Create Payment Requests Using FawryPay Reference Number
     * @link https://developer.fawrystaging.com/docs/server-apis/create-payment-refno-apis
     * @param array $parameters
     */
    public function purchase(array $parameters = array())
    {
        $createRequest = $this->createRequest('\Omnipay\FawryPay\Message\MakePaymentWithReferenceNumberRequest', $parameters);
        return $createRequest;

    }

    /**
     * Get Payment Status
     * @link https://developer.fawrystaging.com/docs/server-apis/payment-notifications/get-payment-status
     * @param array $parameters
     */
    public function fetchTransaction(array $parameters = array())
    {
        $createRequest = $this->createRequest('\Omnipay\FawryPay\Message\FetchTransactionRequest', $parameters);
        $createRequest->configuration= $this->getParameters();
        return $createRequest;

    }









}
