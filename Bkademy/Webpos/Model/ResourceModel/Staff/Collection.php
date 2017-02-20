<?php

namespace Bkademy\Webpos\Model\ResourceModel\Staff;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'staff_id';

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Bkademy\Webpos\Model\Staff', 'Bkademy\Webpos\Model\ResourceModel\Staff');
    }

}
