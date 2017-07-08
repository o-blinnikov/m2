<?php
namespace Training\HideForGuest\Plugin;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\App\Http\Context as HttpContext;
use Magento\Customer\Model\Context as CustomerContext;

class AddProductToCart
{
    /**
     * @var HttpContext
     */
    protected $httpContext;

    /**
     * @var \Magento\Quote\Model\Quote
     */
    protected $quote;

    /**
     * Plugin constructor.
     *
     * @param \Magento\Checkout\Model\Session $checkoutSession
     * @param HttpContext $httpContext
     */
    public function __construct(
        \Magento\Checkout\Model\Session $checkoutSession,
        HttpContext $httpContext
    ) {
        $this->quote = $checkoutSession->getQuote();
        $this->httpContext = $httpContext;
    }

    /**
     * beforeAddProduct
     *
     * @param      $subject
     * @param      $productInfo
     * @param null $requestInfo
     *
     * @return array
     * @throws LocalizedException
     */
    public function beforeAddProduct($subject, $productInfo, $requestInfo = null)
    {
        if (!$this->httpContext->getValue(CustomerContext::CONTEXT_AUTH)) {
            throw new LocalizedException(__('Please Log In in order to add product to cart'));
        }

        return [$productInfo, $requestInfo];
    }
}