<?php
/**
 *  Copyright © 2016 Bkademy. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */

namespace Bkademy\Webpos\Model\ResourceModel\Catalog\Category;

/**
 * Category resource collection
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Collection extends \Magento\Catalog\Model\ResourceModel\Category\Collection
{

     /**
     * Init collection and determine table names
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Bkademy\Webpos\Model\Catalog\Category', 'Magento\Catalog\Model\ResourceModel\Category');
    }
}
