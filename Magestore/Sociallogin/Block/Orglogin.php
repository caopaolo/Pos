<?php

/**
 * Copyright © 2016 Magestore. All rights reserved.
 * See COPYING.txt for license details.
 *
 */
namespace Magestore\Sociallogin\Block;

class Orglogin extends Sociallogin
{
    /**
     * @var \Magestore\Sociallogin\Model\OrgloginFactory
     */
    protected $orgLoginFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magestore\Sociallogin\Helper\Data $dataHelper,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Customer\Model\Session $customerSession,
        \Magestore\Sociallogin\Model\OrgloginFactory $orgLoginFactory,
        array $data = array()
    )
    {
        $this->orgLoginFactory = $orgLoginFactory;
        parent::__construct($context, $dataHelper, $objectManager, $customerSession, $data);
    }
    public function getLoginUrl()
    {
        return $this->getUrl('sociallogin/sociallogin/orglogin');
    }

    public function getAlLoginUrl()
    {
        return $this->orgLoginFactory->create()->getOrgLoginUrl();
    }
}