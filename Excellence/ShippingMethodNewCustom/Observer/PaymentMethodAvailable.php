<?php

namespace Excellence\ShippingMethodNewCustom\Observer;

use Magento\Framework\Event\ObserverInterface;
use \Magento\Checkout\Model\Cart;


class PaymentMethodAvailable implements ObserverInterface
{
    protected $cart;

    public function __construct(
        Cart $cart ){
        $this->cart = $cart;
    }
    /**
     * payment_method_is_active event handler.
     *
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        // you can replace "checkmo" with your required payment method code
        $shippingMethod = $this->cart->getQuote()->getShippingAddress()->getShippingMethod();
        $paymentMethod = $observer->getEvent()->getMethodInstance()->getCode();

        if ($shippingMethod == 'carrier_carrier') {
            if($paymentMethod == "authnetcim")
            {
            $checkResult = $observer->getEvent()->getResult();
            $checkResult->setData('is_available', True);
            }
            // return true;    
        }
else {
    if ($shippingMethod != 'carrier_carrier') {
        if($paymentMethod == "authnetcim")
        {
            $checkResult = $observer->getEvent()->getResult();
            $checkResult->setData('is_available', False); //this is disabling the payment method at checkout page
        }
        }
    }
}
}