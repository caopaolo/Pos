<?php
/**
 * Created by PhpStorm.
 * User: anhnc
 * Date: 23/01/2017
 * Time: 08:56
 */

namespace Bkademy\Webpos\Controller\Index;


class Index extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory
        $resultPageFactory
    ){
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $resultLayout = $this->_resultPageFactory->create();
        $resultLayout->getLayout()->getUpdate()->removeHandle('default');
        return $resultLayout;
    }
}