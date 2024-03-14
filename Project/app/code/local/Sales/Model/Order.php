<?php
class Sales_Model_Order extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = "Sales_Model_Resource_Order";
        $this->_collectionClass = "Sales_Model_Resource_Collection_Order";
        $this->_modelClass = "sales/order";
    }
    public function addOrder(Sales_Model_Quote $quote)
    {
        $quote->removeData('order_id')->removeData('quote_id');
        $this->setData($quote->getData())->save();
        return $this;
    }
    public function getItemCollection()
    {
        return Mage::getModel('sales/order_item')->getCollection()
            ->addFieldToFilter('quote_id', $this->getId());
    }
    public function _beforeSave()
    {
        $paymentMethod = Mage::getModel("sales/quote_payment")->load($this->getPaymentId())->getPaymentMethod();
        $shippingMethod = Mage::getModel("sales/quote_shipping")->load($this->getShippingId())->getShippingMethod();
        $this->removeData("payment_id")->addData("payment_method", $paymentMethod);
        $this->removeData("shipping_id")->addData("shipping_method", $shippingMethod);
        $prefix = '#ABC00';
        $sequentialNumber = sizeof(Mage::getModel('sales/order')->getCollection()->getData()) + 1;
        $this->addData('order_number', $prefix . $sequentialNumber);
    }
}