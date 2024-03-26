<?php

class Sales_Model_Order extends Core_Model_Abstract
{
    protected $_orderStatusArr;
    public function init()
    {
        $this->_resourceClass = "Sales_Model_Resource_Order";
        $this->_collectionClass = "Sales_Model_Resource_Collection_Order";
        $this->_modelClass = "sales/order";
    }
    public function addOrder(Sales_Model_Quote $quote)
    {
        $quote->removeData('order_id')->removeData('quote_id')->removeData('customer_id');
        $this->setData($quote->getData());
        $prefix = 'ORD-';
        $sequentialNumber = sizeof(Mage::getModel('sales/order')->getCollection()->getData()) + 1;
        $suffix = '-001';
        $this->addData('order_number', $prefix . $sequentialNumber . $suffix)->save();
        $this->removeData("payment_id")
            ->removeData("shipping_id");
        return $this;
    }
    public function getItemCollection()
    {
        if ($this->getId() != '') {
            return Mage::getModel('sales/order_item')->getCollection()
                ->addFieldToFilter('order_id', $this->getId())->getData();
        }
    }
    public function getAddress()
    {
        if ($this->getId() != '') {
            return Mage::getModel("sales/order_customer")
                ->getCollection()
                ->addFieldToFilter("order_id", $this->getId())
                ->getFirstItem();
        }
    }
    public function getOrderStatusArr()
    {
        $data = Mage::getModel("order/status")->getCollection()->getData();
        $statusArr = [];
        foreach ($data as $_row) {
            $statusArr[$_row->getId()] = $_row->getStatus();
        }
        return $statusArr;
    }
    public function getOrderStatusName($id)
    {
        if (!isset ($this->_orderStatusArr)) {
            $this->_orderStatusArr = $this->getOrderStatusArr();
        }
        if (array_key_exists($id, $this->_orderStatusArr)) {
            return $this->_orderStatusArr[$id];
        }
    }
    public function _beforeSave()
    {

    }
}