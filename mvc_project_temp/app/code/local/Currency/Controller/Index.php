<?php


class Currency_Controller_Index extends Core_Controller_Front_Action
{

    public function getCss()
    {
        $layout = $this->getLayout();

        $layout->getChild('head')->addCss('1columnMain.css');

    }

    public function indexAction()
    {
     
        $layout = $this->getLayout();
        $this->getCss();
        $currency = $layout->createBlock('currency/content');
        $content = $layout->getChild('content')
            ->addChild('currency', $currency);
        
        $currencyResult = $layout->createBlock('currency/list');
        $content->addChild('currencyResult', $currencyResult);

        Mage::getSingleton('core/session')->set('session_id',10);
        
        $layout->toHtml();
    }

    public function saveAction(){
        $data =$this->getRequest()->getParams('currency_converter');
        $UserCurrencyModel = Mage::getModel('currency/usercurrency');
        $convertedValue = $UserCurrencyModel->convertCurrency($data);
        $sessionId = Mage::getSingleton('core/session')->get('session_id');
        $UserCurrencyModel->setData($data);
        $UserCurrencyModel->addData('result', $convertedValue);
        $UserCurrencyModel->addData('session_id', $sessionId);
        $UserCurrencyModel->save();


        $this->redirect('currency/index/result?id='.$UserCurrencyModel->getId());

    }

    public function resultAction(){
        $layout = $this->getLayout();
        $this->getCss();
        $currencyResult = $layout->createBlock('currency/result');
        $content = $layout->getChild('content')
            ->addChild('currencyResult', $currencyResult);
        $layout->toHtml();
    }

    public function listAction(){
        $layout = $this->getLayout();
        $this->getCss();
        $currencyResult = $layout->createBlock('currency/list');
        $content = $layout->getChild('content')
            ->addChild('currencyResult', $currencyResult);
        $layout->toHtml();
    }

}
