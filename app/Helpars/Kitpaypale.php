<?php

namespace App\Helpars;

use Omnipay\Omnipay;

/**
 * Class Kitpaypale
 * @package App
 */
class Kitpaypale
{
    /**
     * @return mixed
     */
    public function gateway()
    {
        $gateway = Omnipay::create('PayPal_Express');

        $gateway->setUsername(config('services.paypal.username'));
        $gateway->setPassword(config('services.paypal.password'));
        $gateway->setSignature(config('services.paypal.signature'));
        $gateway->setTestMode(config('services.paypal.sandbox'));

        return $gateway;
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function purchase(array $parameters)
    {
        $response = $this->gateway()
            ->purchase($parameters)
            ->send();

        return $response;
    }

    /**
     * @param array $parameters
     */
    public function complete(array $parameters)
    {
        $response = $this->gateway()
            ->completePurchase($parameters)
            ->send();

        return $response;
    }

    /**
     * @param $amount
     */
    public function formatAmount($amount)
    {
        return number_format($amount, 2, '.', '');
    }

    /**
     * @param $order
     */
    public function getCancelUrl($order)
    {
        return route('paypal.checkout.cancelled', $order);
    }

    /**
     * @param $order
     */
    public function getReturnUrl($order)
    {
        return route('paypal.checkout.completed', $order);
    }

    /**
     * @param $order
     */
    public function getNotifyUrl($order)
    {
        $env = config('services.paypal.sandbox') ? "sandbox" : "live";

        return route('webhook.paypal.ipn', [$order, $env]);
    }
}