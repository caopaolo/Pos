<?php

namespace Bkademy\Webpos\Block;

class AbstractBlock extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Checkout\Model\CompositeConfigProvider
     */
    protected $configProvider;

    /**
     * AbstractBlock constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Bkademy\Webpos\Model\WebposConfigProvider\CompositeConfigProvider $configProvider,
        array $data = []
    ) {
        $this->configProvider = $configProvider;
        parent::__construct($context, $data);
    }

    /**
     * Retrieve checkout configuration
     *
     * @return array
     * @codeCoverageIgnore
     */
    public function getWebposConfig()
    {
        return $this->configProvider->getConfig();
    }
    public function getLogoUrl(){
        return $this->getViewFileUrl('Bkademy_Webpos::images/logo.png');
    }

}
