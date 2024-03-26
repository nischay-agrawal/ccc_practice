<?php

class Cart_Block_Cart extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('sales/cart.phtml');
    }
    public function getItems()
    {
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        if ($quoteId != '') {
            $items = Mage::getModel('sales/quote')->load($quoteId)->getItemCollection();
            if (!is_null($items)) {
                foreach ($items as $item) {
                    $item->addData('product', Mage::getModel('catalog/product')->load($item->getProductId()));
                }
                return $items;
            }
        }

    }

    public function getQuote()
    {
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        return Mage::getSingleton('sales/quote')->load($quoteId);
    }
}