<?php

class Sales_Model_Quote extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Quote';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Quote';
    }
    public function initQuote()
    {
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        if (!$quoteId) {
            $quote = Mage::getModel('sales/quote')
                ->setData(['tax_percent' => 8, 'grand_total' => 0])
                ->save();
            Mage::getSingleton('core/session')
                ->set('quote_id', $quote->getId());
            $quoteId = $quote->getId();
            $this->load($quoteId);
        } else {
            $this->load($quoteId);
        }
        return $this;
    }
    public function getItemCollection()
    {
        return Mage::getModel('sales/quote_item')
            ->getCollection()
            ->addFieldToFilter('quote_id', $this->getId());
    }
    protected function _beforeSave()
    {
        $grandTotal = 0;
        foreach ($this->getItemCollection()->getData() as $item) {
            $grandTotal += $item->getRowTotal();
        }
        if ($this->getTaxPercent()) {
            $tax = round($grandTotal / $this->getTaxPercent(), 2);
            $grandTotal += $tax;
        }
        $this->addData('grand_total', $grandTotal);
    }
    public function addProduct($quoteData)
    {
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel('sales/quote_item')
                ->addItem(
                    $this,
                    $quoteData['product_id'],
                    $quoteData['qty'],
                    isset($quoteData['item_id'])
                    ? $quoteData['item_id']
                    : null
                );
        }
        $this->save();
    }
    public function deleteProduct($itemId)
    {
        $quoteId = Mage::getSingleton('core/session')
            ->get('quote_id');
        $this->load($quoteId);

        if ($this->getId()) {
            Mage::getModel('sales/quote_item')->deleteItem($this, $itemId);
        }
        $this->save();
    }
    public function addAddress($address)
    {
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel("sales/quote_customer")->addCustomer($this, $address);
        }
        return $this;
    }
    public function addPayment($payment)
    {
        $quotePayment = Mage::getModel("sales/quote_payment");
        if ($this->getId()) {
            $quotePayment->addPayment($this, $payment);
        }
        $this->addData("payment_id", $quotePayment->getId());
        $this->save();
    }
    public function addShipping($shipping)
    {
        $quoteShipping = Mage::getModel("sales/quote_shipping");
        if ($this->getId()) {
            $quoteShipping->addShipping($this, $shipping);
        }
        $this->addData("shipping_id", $quoteShipping->getId());
        $this->save();
    }
    public function getCustomer()
    {
        $this->initQuote();
        return Mage::getModel("sales/quote_customer")
            ->getCollection()
            ->addFieldToFilter("quote_id", $this->getId())
            ->addFieldToFilter("customer_id", Mage::getModel("core/session")->get("logged_in_customer_id"))
            ->getFirstItem();
    }
    public function convert($request)
    {
        $address = $request["checkoutAddress"];
        $payment = $request["checkoutPayment"];
        $shipping = $request["checkoutShipping"];
        $this->initQuote();
        if ($this->getId()) {
            $this->addAddress($address);
            $this->addPayment($payment);
            $this->addShipping($shipping);
            $order = Mage::getModel('sales/order')->addOrder($this);
            Mage::getModel('sales/order_customer')->addCustomer($this->getCustomer(), $order->getId());
            foreach ($this->getItemCollection()->getData() as $_item) {
                Mage::getModel("sales/order_item")->addItem($_item, $order->getId());
            }
            $this->addData("order_id", $order->getId())->save();
        }
    }
}