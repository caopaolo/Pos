<?php
/**
 * Created by PhpStorm.
 * User: anhnc
 * Date: 24/01/2017
 * Time: 09:29
 */

namespace Bkademy\Webpos\Controller\Adminhtml\Staff;
use Magento\Framework\Controller\ResultFactory;

class NewAction extends \Bkademy\Webpos\Controller\Adminhtml\Staff
{
    public function execute()
    {
        $resultForward = $this->resultFactory->create(ResultFactory::TYPE_FORWARD);
        return $resultForward->forward('edit');
    }

}