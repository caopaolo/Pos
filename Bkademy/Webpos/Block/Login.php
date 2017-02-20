<?php

namespace Bkademy\Webpos\Block;

class Login extends \Bkademy\Webpos\Block\AbstractBlock
{
    /**
     * Produce and return block's html output
     *
     * This method should not be overridden. You can override _toHtml() method in descendants if needed.
     *
     * @return string
     */
    public function toHtml()
    {
        $isLogin = \Magento\Framework\App\ObjectManager::getInstance()->create('Bkademy\Webpos\Helper\Permission')
            ->isLogin();
        if(!$isLogin)
            return parent::toHtml();
        return '';
    }
}
