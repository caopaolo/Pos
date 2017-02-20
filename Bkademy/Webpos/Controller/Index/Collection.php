<?php
/**
 * Created by PhpStorm.
 * User: anhnc
 * Date: 23/01/2017
 * Time: 15:41
 */

namespace Bkademy\Webpos\Controller\Index;


class Collection extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {

        $productCollection = $this->_objectManager
            ->create('Magento\Catalog\Model\ResourceModel\Product\Collection')
            ->addAttributeToSelect(['name', 'price', 'image'])
            ->addAttributeToFilter( 'entity_id', array( 'in' => array(11,12,13) ) )
            ->setPageSize(10,1);
        $output = '';
        $productCollection->setDataToAll('price', 20);
        foreach ($productCollection as $product) {
            $output .= \Zend_Debug::dump($product->debug(), null, false);
        }
        $this->getResponse()->setBody($output);

        // TODO: Implement execute() method.
    }
}