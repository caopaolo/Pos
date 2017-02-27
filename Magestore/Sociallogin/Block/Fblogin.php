<?php

/**
 * Copyright © 2016 Magestore. All rights reserved.
 * See COPYING.txt for license details.
 *
 */
namespace Magestore\Sociallogin\Block;

class Fblogin extends Sociallogin
{
    /**
     * @var \Magestore\Sociallogin\Model\FbloginFactory
     */
    protected $_fbLoginFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magestore\Sociallogin\Helper\Data $dataHelper,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Customer\Model\Session $customerSession,
        \Magestore\Sociallogin\Model\FbloginFactory $fbLoginFactory,
        array $data = array()
    )
    {
        $this->_fbLoginFactory = $fbLoginFactory;
        parent::__construct($context, $dataHelper, $objectManager, $customerSession, $data);
    }

    public function getFbmodel()
    {
        return $this->_fbLoginFactory->create();
    }

    public function getFbUser()
    {
        return $this->getFbmodel()->getFbUser();
    }

    public function getFbLoginUrl()
    {
        return $this->getFbmodel()->getFbLoginUrl();
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