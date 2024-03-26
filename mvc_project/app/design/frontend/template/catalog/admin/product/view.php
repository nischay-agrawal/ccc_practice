<?php

$id = Mage::getModel('core/request')->getParams('id');
$product = Mage::getModel('admin/catalog_product')->load($id);

return "
    <p>".$product->getName().";
";