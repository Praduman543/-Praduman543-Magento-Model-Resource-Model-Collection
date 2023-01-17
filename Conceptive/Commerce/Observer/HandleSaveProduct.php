<?php

namespace Conceptive\Commerce\Observer;

use Magento\Framework\Event\ObserverInterface;
class HandleSaveProduct implements ObserverInterface
{
    protected $request;
    /**
     * HandleSaveProduct constructor.
     * @param \Magento\Framework\App\RequestInterface $request
     */
    public function __construct(\Magento\Framework\App\RequestInterface $request)
    {
        $this->request = $request;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $params = $this->request->getParams();
        $customFieldData = $params['PublisherImages'];
        // echo "<pre>";
        // print_r($observer->getData());exit;

        $product = $observer->getProduct();
        $product->setImage($customFieldData['image'][0]['name']);
        $sku = $product->getSku();
        $id = $product->getId();
        $name = $product->getName();
    }
}
