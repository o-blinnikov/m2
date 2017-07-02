<?php
namespace Training\WebsiteSwitcher\Block\Website;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\View\Element\Template;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\UrlInterface;

/**
 * Switcher block
 */
class Switcher extends Template
{

    /**
     * @var \Magento\Framework\Registry
     */
    protected $storeManager;

    /**
     * ShippingBanner constructor.
     * @param Context $context
     * @param StoreManagerInterface $storeManager
     * @param array $data
     */
    public function __construct (
        Context $context,
        StoreManagerInterface $storeManager,
        array $data = []
    ) {
        $this->storeManager = $storeManager;
        parent::__construct($context, $data);
    }

    /**
     * @return int
     */
    public function resolveCurrentWebsiteId()
    {
        $store = $this->storeManager->getStore();
        $websiteId = $store->getWebsiteId();

        return $websiteId;
    }


    public function getWebsites()
    {
        $_websites = $this->storeManager->getWebsites();
        $_websiteData = array();
        foreach($_websites as $website){
            foreach($website->getStores() as $store) {
                $wedsiteId = $website->getId();
                $storeObj = $this->_storeManager->getStore($store);
                $name = $website->getName();
                $url = $storeObj->getBaseUrl(UrlInterface::URL_TYPE_WEB);
                array_push($_websiteData, array('name' => $name,'url' => $url));
            }
        }

        return $_websites;
    }
}