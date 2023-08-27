<?php

namespace Robusta\Cart\Observer;

class CheckoutSubmitAllAfterObserver implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @param \Magento\Framework\Event\Observer $observer
     * @return $this
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $quote = $observer->getEvent()->getQuote();
        if (empty($order) || empty($quote)) {
            return $this;
        }

        $shippingAddress = $quote->getShippingAddress();
        if ($shippingAddress->getCustomerComment()) {
            $orderShippingAddress = $order->getShippingAddress();
            $orderShippingAddress->setCustomerComment(
                $shippingAddress->getCustomerComment()
            )->save();
        }

        return $this;
    }
}