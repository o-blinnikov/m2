<?php
namespace Training\Render\Block;

/**
 * Path block
 */
class Path extends \Magento\Framework\View\Element\Template
{
    protected $_request;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\App\Request\Http $request,
        array $data = []
    )
    {
        $this->_request = $request;
        parent::__construct($context, $data);
    }

    public function getFullActionName()
    {
        return $this->_request->getFullActionName();
    }
}