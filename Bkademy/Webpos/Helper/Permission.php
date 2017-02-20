<?php
namespace Bkademy\Webpos\Helper;
class Permission extends Data
{
    /**
     * @var \Bkademy\Webpos\Model\StaffFactory
     */
    protected $staffFactory;

    /**
     * @param Context $context
     */
    public function __construct(
        \Bkademy\Webpos\Model\StaffFactory $staffFactory,
        \Bkademy\Webpos\Model\Session $session,
        \Magento\Framework\App\Helper\Context $context
    )
    {
        parent::__construct($context);
        $this->staffFactory = $staffFactory;
        $this->session = $session;

    }
    public function isLogin(){
        if($this->session->getWebposId())
            return true;
        return false;
    }
    /**
     *
     * @param string $username
     * @param string $password
     * @return int|boolean
     */
    public function login($username, $password) {
        $staff = $this->staffFactory->create();
        if ($staff->authenticate($username, $password)) {
            return $staff->getId();
        }
        return null;
    }
}
