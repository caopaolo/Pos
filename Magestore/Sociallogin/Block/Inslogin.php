<?php

/**
 * Copyright © 2016 Magestore. All rights reserved.
 * See COPYING.txt for license details.
 *
 */
namespace Magestore\Sociallogin\Block;

class Inslogin extends Sociallogin
{
    /**
     * @var \Magestore\Sociallogin\Model\InstagramloginFactory
     */
    protected $instagramLoginFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magestore\Sociallogin\Helper\Data $dataHelper,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Customer\Model\Session $customerSession,
        \Magestore\Sociallogin\Model\InstagramloginFactory $instagramLoginFactory,
        array $data = array()
    )
    {
        $this->instagramLoginFactory = $instagramLoginFactory;
        parent::__construct($context, $dataHelper, $objectManager, $customerSession, $data);
    }
    public function getInstagramLoginUrl()
    {
        return $this->instagramLoginFactory->create()->getInstagramLoginUrl();
    }

    public function getDirectLoginUrl()
    {
        return $this->_dataHelper->getDirectLoginUrl();
    }

    protected function _beforeToHtml()
    {

        return parent::_beforeToHtml();
    }
}