<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Training\HideForGuest\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context as HelperContext;
use Magento\Framework\App\Http\Context as HttpContext;
use Magento\Customer\Model\Context as CustomerContext;

/**
 * Authorize.net Data Helper
 */
class Data extends AbstractHelper
{
    /**
     * @var HttpContext
     */
    protected $httpContext;


    /**
     * Data constructor.
     * @param HelperContext $context
     * @param HttpContext $httpContext
     */
    public function __construct(
        HelperContext $context,
        HttpContext $httpContext
    ) {
        $this->httpContext = $httpContext;
        parent::__construct($context);
    }

    /**
     * @return mixed|null
     */
    public function getIsUserLoggedIn()
    {
        return $this->httpContext->getValue(CustomerContext::CONTEXT_AUTH);
    }
}
