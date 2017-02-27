<?php

/**
 * Copyright © 2016 Magestore. All rights reserved.
 * See COPYING.txt for license details.
 *
 */
namespace Magestore\Sociallogin\Block;

class Fqlogin extends Sociallogin
{
    /**
     * @var \Magestore\Sociallogin\Model\FqloginFactory
     */
    protected $fqLoginFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magestore\Sociallogin\Helper\Data $dataHelper,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Customer\Model\Session $customerSession,
        \Magestore\Sociallogin\Model\FqloginFactory $fqLoginFactory,
        array $data = array()
    )
    {
        $this->fqLoginFactory = $fqLoginFactory;
        parent::__construct($context, $dataHelper, $objectManager, $customerSession, $data);
    }
    public function getLoginUrl()
    {
        return $this->getUrl('sociallogin/sociallogin/fqlogin');
    }

    public function getFqModel()
    {
        return $this->fqLoginFactory->create();
    }

    public function getFqUser()
    {
        return $this->getFqModel()->getFqUser();
    }

    public function getFqLoginUrl()
    {
        return $this->getFqModel()->getFqLoginUrl();
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