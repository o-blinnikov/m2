<?php
namespace Training\Test\Block\Product\View;

class Description extends \Magento\Framework\View\Element\Template {

    public function beforeToHtml(\Magento\Catalog\Block\Product\View\Description $originalBlock) {
        $originalBlock->setTemplate('Training_Test::description.phtml');
    }
}