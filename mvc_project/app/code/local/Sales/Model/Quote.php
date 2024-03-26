<?php

class Sales_Model_Quote extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = "Sales_Model_Resource_Quote";
        $this->_collectionClass = "Sales_Model_Resource_Collection_Quote";
        $this->_modelClass = "sales/quote";
    }

    public function getCustomerQuote()
    {
        $customer = $this->getCollection()
            ->addFieldToFilter("customer_id", Mage::getSingleton("core/session")->get("logged_in_customer_id"))
            ->addFieldToFilter("order_id", ["is" => "NULL"])
            ->getFirstItem();
        return $customer;
    }
    public function mergeQuote($quoteId, $customerQuoteId)
    {
        $items = Mage::getModel("sales/quote")->setId($quoteId)->getItemCollection();
        $customerQuoteItems = Mage::getModel("sales/quote")->setId($customerQuoteId)->getItemCollection();
        foreach ($items as $_item) {
            $_item->addData("quote_id", $customerQuoteId)->save();
            foreach ($customerQuoteItems as $_customerItem) {
                if ($_item->getProductId() == $_customerItem->getProductId()) {
                    $totalQty = $_customerItem->getQty() + $_item->getQty();
                    $_customerItem->addData("qty", $totalQty)->save();
                    $_item->delete();
                }
            }
        }
        Mage::getModel("sales/quote")->setId($quoteId)->delete();
        Mage::getSingleton("core/session")->set("quote_id", $customerQuoteId);
    }
    public function initQuote()
    {
        $quoteId = Mage::getSingleton('core/session')->get("quote_id");
        if ($quoteId != '')
            $this->load($quoteId);
        if (!$this->getId()) {
            $quote = Mage::getModel("sales/quote");
            $quote->addData("grand_total", 0);
            $quote->addData("tax_percent", 8);
            if (Mage::getSingleton("core/session")->get("logged_in_customer_id") != '') {
                $customerQuote = $this->getCustomerQuote();
                $quote->addData("customer_id", Mage::getSingleton("core/session")->get("logged_in_customer_id"));
                if (!is_null($customerQuote))
                    $quote->addData("quote_id", $customerQuote->getQuoteId());
            }
            $quote->save();
            Mage::getSingleton("core/session")->set("quote_id", $quote->getId());
            $quoteId = $quote->getId();
            $this->load($quoteId);
        }
    }
    // sales_quote_item add, remove and update actions
    public function addProduct($request)
    {
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel("sales/quote_item")
                ->addItem($this, $request['product_id'], $request['qty']);
        }
        $this->save();
    }
    public function removeProduct($request)
    {
        $item = Mage::getSingleton('sales/quote_item')->load($request['item_id']);
        $this->setId($request['quote_id']);
        if ($this->getQuoteId() == $item->getQuoteId())
            $item->delete();
        $this->save();
    }
    public function editProduct($request)
    {
        $item = Mage::getSingleton('sales/quote_item')->load($request['item_id']);
        $this->load($request['quote_id']);
        if ($this->getQuoteId() == $item->getQuoteId()) {
            $item->addData('qty', $request['qty']);
            $item->save();
        }
        $this->save();
    }
    // get quote items and customer
    public function getItemCollection()
    {
        if ($this->getId()) {
            return Mage::getModel('sales/quote_item')->getCollection()
                ->addFieldToFilter('quote_id', $this->getId())
                ->getData();
        }
    }

    public function getAddress()
    {
        $this->initQuote();
        return Mage::getModel("sales/quote_customer")
            ->getCollection()
            ->addFieldToFilter("quote_id", $this->getId())
            ->addFieldToFilter("customer_id", Mage::getModel("core/session")->get("logged_in_customer_id"))
            ->getFirstItem();
    }
    public function getPaymentMethod()
    {
        $this->initQuote();
        return Mage::getModel("sales/quote_payment")
            ->getCollection()
            ->addFieldToFilter("quote_id", $this->getId())
            ->getFirstItem();
    }
    public function getShippingMethod()
    {
        $this->initQuote();
        return Mage::getModel("sales/quote_shipping")
            ->getCollection()
            ->addFieldToFilter("quote_id", $this->getId())
            ->getFirstItem();
    }

    protected function _beforeSave()
    {
        $grandTotal = 0;
        foreach ($this->getItemCollection() as $_item) {
            $grandTotal += $_item->getRowTotal();
        }
        if ($this->getTaxPercent()) {
            $tax = round($grandTotal / $this->getTaxPercent(), 2);
            $grandTotal = $grandTotal + $tax;
        }
        $this->addData('grand_total', $grandTotal);
    }
    // quote address - payment - shipping insertion
    public function addAddress($request)
    {
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel("sales/quote_customer")->addCustomer($this, $request);
        }
        return $this;
    }

    public function addPaymentMethod($request)
    {
        $this->initQuote();
        $quotePayment = Mage::getModel("sales/quote_payment");
        if ($this->getId()) {
            $quotePayment->addPaymentMethod($this, $request);
        }
        $this->addData("payment_id", $quotePayment->getId());
        $this->save();
    }
    public function addShippingMethod($request)
    {
        $this->initQuote();
        $quoteShipping = Mage::getModel("sales/quote_shipping");
        if ($this->getId()) {
            $quoteShipping->addShippingMethod($this, $request);
        }
        $this->addData("shipping_id", $quoteShipping->getId());
        $this->save();
    }

    public function convert()
    {
        $this->initQuote();
        if ($this->getId()) {
            $order = Mage::getModel('sales/order')
                ->addOrder($this);
            Mage::getModel('sales/order_customer')
                ->addAddress($this->getAddress(), $order->getId());
            Mage::getModel('sales/order_payment')
                ->addPaymentMethod($this->getPaymentMethod(), $order->getId());
            Mage::getModel('sales/order_shipping')
                ->addShippingMethod($this->getShippingMethod(), $order->getId());
            foreach ($this->getItemCollection() as $_item) {
                Mage::getModel("sales/order_item")
                    ->addItem($_item, $order->getId());
            }
            $this->addData("order_id", $order->getId())->save();
        }
    }
}