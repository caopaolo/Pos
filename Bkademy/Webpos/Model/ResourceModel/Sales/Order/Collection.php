<?php

/**
 *  Copyright © 2016 Bkademy. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */
namespace Bkademy\Webpos\Model\ResourceModel\Sales\Order;

use Bkademy\Webpos\Api\Data\Sales\OrderSearchResultInterface;

class Collection extends \Magento\Sales\Model\ResourceModel\Order\Collection implements OrderSearchResultInterface
{
    /**
     * Model initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Bkademy\Webpos\Model\Sales\Order', 'Magento\Sales\Model\ResourceModel\Order');
        $this->addFilterToMap(
            'entity_id',
            'main_table.entity_id'
        )->addFilterToMap(
            'customer_id',
            'main_table.customer_id'
        )->addFilterToMap(
            'quote_address_id',
            'main_table.quote_address_id'
        );
    }
}
