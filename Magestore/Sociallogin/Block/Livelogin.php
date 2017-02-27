<?php

/**
 * Copyright © 2016 Magestore. All rights reserved.
 * See COPYING.txt for license details.
 *
 */
namespace Magestore\Sociallogin\Block;

class Livelogin extends Sociallogin
{
    /**
     * @var \Magestore\Sociallogin\Model\FqloginFactory
     */
    protected $fqLoginFactory;
    /**
     * @var \Magestore\Sociallogin\Model\Livelogin
     */
    protected $liveLoginFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magestore\Sociallogin\Helper\Data $dataHelper,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Customer\Model\Session $customerSession,
        \Magestore\Sociallogin\Model\Fqlogin $fqLoginFactory,
        \Magestore\Sociallogin\Model\Livelogin $liveLoginFactory,
        array $data = array()
    )
    {
        $this->fqLoginFactory = $fqLoginFactory;
        $this->liveLoginFactory = $liveLoginFactory;
        parent::__construct($context, $dataHelper, $objectManager, $customerSession, $data);
    }
    public function getLoginUrl()
    {
        return $this->getUrl('sociallogin/sociallogin/fqlogin');
    }

    public function getFqUser()
    {
        return $this->fqLoginFactory->create()->getFqUser();
    }

    public function getUrlAuthorCode()
    {
        return $this->liveLoginFactory->create()->getUrlAuthorCode();
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