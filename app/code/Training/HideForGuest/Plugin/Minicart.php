<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Training\HideForGuest\Plugin;

use Magento\Framework\App\Http\Context as HttpContext;
use Magento\Customer\Model\Context as CustomerContext;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Checkout\Block\Cart\Sidebar;

/**
 * Class Minicart
 * @package Training\HideForGuest\Plugin
 */
class Minicart
{
    /**
     * Enabled from config
     */
    const XML_PATH_ENABLED  = 'guest_customer/general/enabled';
    /**
     * @var HttpContext
     */
    protected $httpContext;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * Minicart constructor.
     * @param StoreManagerInterface $storeManager
     * @param ScopeConfigInterface $scopeConfig
     * @param HttpContext $httpContext
     */
    public function __construct(
        StoreManagerInterface $storeManager,
        ScopeConfigInterface $scopeConfig,
        HttpContext $httpContext
    ) {
        $this->httpContext = $httpContext;
        $this->storeManager = $storeManager;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Check if functionality enabled according to store
     *
     * @param $storeId
     * @return mixed
     */
    public function isEnabled($storeId)
    {
        return $this->getConfigValue(self::XML_PATH_ENABLED, $storeId);
    }

    /**
     * Return store configuration value
     *
     * @param string $path
     * @param int $storeId
     * @return mixed
     */
    protected function getConfigValue($path, $storeId)
    {
        return $this->scopeConfig->getValue(
            $path,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * Get store identifier
     *
     * @return  int
     */
    public function getStoreId()
    {
        return $this->storeManager->getStore()->getId();
    }

    /**
     * @param \Magento\Checkout\Block\Cart\Sidebar $subject
     * @return null
     */
    public function beforeToHtml(Sidebar $subject)
    {
        if ($this->httpContext->getValue(CustomerContext::CONTEXT_AUTH) && $this->isEnabled($this->getStoreId()) == 1) {
            return null;
        } else {
            $subject->setTemplate('');
        }
    }
}
