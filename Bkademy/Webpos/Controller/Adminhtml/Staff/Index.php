<?php
namespace Bkademy\Webpos\Controller\Adminhtml\Staff;
use  Magento\Backend\App\Action\Context;
class Index extends \Bkademy\Webpos\Controller\Adminhtml\Staff
{
    public function execute()
    {
        $resultPage = $this->_initAction();
        $resultPage->getConfig()->getTitle()->prepend(__('Staff Management'));
        return $resultPage;
    }


}
