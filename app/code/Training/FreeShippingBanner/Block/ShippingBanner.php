<?php
namespace Training\FreeShippingBanner\Block;

use Magento\Catalog\Helper\Data;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\Registry;

/**
 * ShippingBanner block
 */
class ShippingBanner extends Template
{
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;


    /**
     * @var \Magento\Framework\Registry
     */
    protected $_registry;

    /**
     * ShippingBanner constructor.
     * @param Context $context
     * @param ScopeConfigInterface $scopeConfig
     * @param Registry $registry
     * @param array $data
     */
    public function __construct (
        Context $context,
        ScopeConfigInterface $scopeConfig,
        Registry $registry,
        array $data = []
    ) {
        $this->_registry = $registry;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    /**
     * @return mixed
     */
    public function getCurrentCategory()
    {
        return $this->_registry->registry('current_category');
    }

    /**
     * @return mixed
     */
    public function getCurrentProduct()
    {
        return $this->_registry->registry('current_product');
    }

    /**
     * @return mixed
     */
    public function getFreeShippingSubtotal()
    {
        return $this->scopeConfig->getValue('carriers/freeshipping/free_shipping_subtotal', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}