<?php
/**
 *  Copyright © 2016 Bkademy. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */

namespace Bkademy\Webpos\Api\Data\Sales;

interface OrderSearchResultInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get items.
     *
     * @return \Bkademy\Webpos\Api\Data\Sales\OrderInterface[] Array of collection items.
     */
    public function getItems();

    /**
     * Set items.
     *
     * @param \Bkademy\Webpos\Api\Data\Sales\OrderInterface[] $items
     * @return $this
     */
    public function setItems(array $items = null);
}
