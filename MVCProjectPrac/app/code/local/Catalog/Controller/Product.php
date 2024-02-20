<pre><?php
class Catalog_Controller_Product extends Core_Controller_Front_Action
{
    public function newAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('catalog/admin_product');
        $child->addChild('form', $productForm);
        $layout->toHtml();
    }
    public function saveAction()
    {
        echo "<pre";
        $data = $this->getRequest()->getParams();
        $product = Mage::getModel('catalog/product')
        ->setData($data);
        // print_r($product);
        // die;
        $product->save();
        print_r($data);
    }
}