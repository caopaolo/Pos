<?php

namespace Bkademy\Webpos\Model\Repository\Staff;

/**
 * Class StaffRepository
 * @package Bkademy\Webpos\Model\Staff
 */
class StaffRepository implements \Bkademy\Webpos\Api\Staff\StaffRepositoryInterface
{
    /**
     * @var \Bkademy\Webpos\Model\Session
     */
    protected $session;

    /**
     * @var \Magento\Framework\App\RequestInterface
     */
    protected $request;

    /**
     * @var Permission
     */
    protected $permissionHelper;


    /**
     * StaffManagement constructor.
     * @param \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone
     * @param \Magestore\Webpos\Model\WebPosSession $webPosSession
     * @param \Magestore\Webpos\Model\Staff $staff
     */
    public function __construct(
        \Bkademy\Webpos\Model\Session $session,
        \Bkademy\Webpos\Helper\Permission $permission,
        \Magento\Framework\App\RequestInterface $request
    )
    {
        $this->session = $session;
        $this->permissionHelper = $permission;
        $this->request = $request;
    }

    /**
     * @param string $username
     * @param string $password
     * @return bool|string
     */
    public function login($username, $password)
    {
        if ($username && $password) {
            try {
                $staffId = $this->permissionHelper->login($username, $password);
                if ($staffId) {
                    $this->session->setWebposId($staffId);
                    return true;
                } else {
                    return false;
                }
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        return false;
    }

    /**
     *
     * @return boolean
     */
    public function logout()
    {
        $this->session->setWebposId(null);
        return true;
    }
}
