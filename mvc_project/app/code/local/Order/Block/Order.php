<?php

class Order_Block_Order extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate("cart/order.phtml");
    }

    public function getOrders(){
        $customerId = Mage::getModel("core/session")->get("logged_in_customer_id");
        $orders = [];
        $orderId = [];
        foreach(Mage::getModel("sales/order_customer")->getCollection()->addOrderBy("order_id", "DESC")->addFieldToFilter("customer_id", $customerId)->getData() as $customer){
            $orderId[] = $customer->getOrderId();
        }
        if ($customerId != '') {
            foreach($orderId as $_oid){
                $items = [];
                $order = Mage::getModel("sales/order")->load($_oid);
                $orderItem = Mage::getModel("sales/order_item")->getCollection()->addFieldToFilter("order_id", $_oid)->getData();
                foreach($orderItem as $_item){
                    $product = Mage::getModel("catalog/product")->load($_item->getProductId());
                    $_item->addData("product_description", $product->getDescription());
                    $_item->addData("image_link", $product->getImageLink());
                    $items[] = $_item;
                }
                $order->addData("items", $items);
                $orders[] = $order;
            }
        }
        return $orders;
    }
}