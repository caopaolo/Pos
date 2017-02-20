<?php
/**
 *  Copyright © 2016 Magestore. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */
namespace Bkademy\Webpos\Model\WebposConfigProvider;
interface ConfigProviderInterface
{
    /**
     * Retrieve assoc array of checkout configuration
     *
     * @return array
     */
    public function getConfig();
}