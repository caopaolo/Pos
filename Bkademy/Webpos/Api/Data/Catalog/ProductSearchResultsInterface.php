<?php

/**
 *  Copyright © 2016 Bkademy. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */
namespace Bkademy\Webpos\Api\Data\Catalog;

/**
 * @api
 */
interface ProductSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get attributes list.
     *
     * @return \Bkademy\Webpos\Api\Data\Catalog\ProductInterface[]
     */
    public function getItems();

    /**
     * Set attributes list.
     *
     * @param \Bkademy\Webpos\Api\Data\Catalog\ProductInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
