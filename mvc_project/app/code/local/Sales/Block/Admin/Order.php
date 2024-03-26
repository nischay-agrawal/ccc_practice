<?php

class Sales_Block_Admin_Order extends Core_Block_Template
{
    protected $_orderStatus;
    public function __construct()
    {
        $this->setTemplate("sales/admin/order.phtml");
    }

    public function getOrders()
    {
        $orders = Mage::getModel("sales/order")
            ->getCollection()
            ->getData();
        return $orders;
    }
    public function getOrderStatusName($id)
    {
        if (!isset ($this->_orderStatus)) {
            $this->_orderStatus = Mage::getModel("sales/order")->getOrderStatusArr();
        }
        if (array_key_exists($id, $this->_orderStatus)) {
            return $this->_orderStatus[$id];
        }

    }
}