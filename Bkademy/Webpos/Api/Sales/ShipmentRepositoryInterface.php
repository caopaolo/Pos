<?php
/**
 *  Copyright © 2016 Bkademy. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */

namespace Bkademy\Webpos\Api\Sales;

interface ShipmentRepositoryInterface extends \Magento\Sales\Api\ShipmentRepositoryInterface
{
    /**
     * Performs persist operations for a specified shipment.
     *
     * @param \Magento\Sales\Api\Data\ShipmentInterface $entity The shipment.
     * @return \Bkademy\Webpos\Api\Data\Sales\OrderInterface Order interface.
     */
    public function saveShipment(\Magento\Sales\Api\Data\ShipmentInterface $entity);

}
