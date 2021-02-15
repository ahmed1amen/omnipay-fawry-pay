<?php

namespace Omnipay\FawryPay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Common\Message\RequestInterface;

class Response extends AbstractResponse implements RedirectResponseInterface
{
    /**
     * @var array
     */
    protected $headers = [];

    public function __construct(RequestInterface $request, $data, $headers = [])
    {
        $this->request = $request;
        $this->data = json_decode($data, true);
        $this->headers = $headers;
    }


    /**
     * Is the Request successful ?
     *
     * @return Response | false
     */
    public function isSuccessful()
    {
        return ($this->data['statusCode'] != 200) ? $this :false ;
    }

}